<?php

namespace App\Http\Controllers;

use App\Enums\Cars\Status;
use App\Models\Brand;
use App\Models\Car;
use App\Models\Tag;
use Illuminate\Http\Request;
use App\Http\Requests\Cars\Save as SaveRequest;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Gate;

class Cars extends Controller
{
    private string $modelCar = Car::class;
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        Gate::authorize('viewActive', $this->modelCar);

        $query = Car::with(['brand.country'])->orderBy('id', 'desc');

        if (Gate::denies('viewAll', $this->modelCar)) {
            $query->ofActive();
        }

        $cars = $query->get();

        return view('cars.index', ['cars' => $cars, 'modelCar' => $this->modelCar]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        Gate::authorize('create', $this->modelCar);

        $brands = Brand::orderBy('title')->pluck('title', 'id');
        $transmissions = config('app-cars.transmissions');
        $tags = Tag::orderBy('title')->pluck('title', 'id');
        return view('cars.create', compact('brands', 'transmissions', 'tags'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(SaveRequest $request)
    {
        Gate::authorize('create', $this->modelCar);

        return $this->handleValidation(function() use ($request) {
            $id = null;

            DB::transaction(function () use ($request, &$id) {
                $data = $request->validated();
                $data['user_id'] = auth()->id(); // Добавляем ID текущего пользователя

                $car = Car::create($data);

                // Прикрепляем выбранные теги
                if ($request->has('tags')) {
                    $car->tags()->attach($request->input('tags', []));
                }

                $id = $car->id;
            });

            session()->flash('message-info', trans('notifications.cars.added'));

            return response()->json([
                'success' => true,
                'redirect' => route('cars.show', [$id])
            ]);
        });
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        Gate::authorize('view', $this->modelCar);

        $car = Car::with([
            'brand.country', // Загружаем бренд и связанную страну
            'tags',         // Загружаем теги
            'comments.user' // Загружаем комментарии и связанных пользователей
        ])->findOrFail($id);
        $transmissions = config('app-cars.transmissions');

        return view('cars.show', compact('car', 'transmissions'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $car = Car::findOrFail($id);
        Gate::authorize('update', $car);

        // Добавляем статусы, если пользователь имеет право их изменять
        $statuses = [];
        if (Gate::allows('updateStatus', $car)) {
            $statuses = array_map(fn($case) => [
                'value' => $case->value,
                'text' => $case->text()
            ], Status::cases());
        }

        $brands = Brand::orderBy('title')->pluck('title', 'id');
        $transmissions = config('app-cars.transmissions');
        $tags = Tag::orderBy('title')->pluck('title', 'id');
        $selectedTags = $car->tags->pluck('id')->toArray();
        return view('cars.edit', compact('car', 'brands', 'transmissions', 'tags', 'selectedTags', 'statuses'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(SaveRequest $request, string $id)
    {
        return $this->handleValidation(function() use ($request, $id) {
            $car = Car::findOrFail($id);
            Gate::authorize('update', $car);

            // Проверяем право на изменение статуса
            if ($request->has('status')) {
                Gate::authorize('updateStatus', $car);
            }

            DB::transaction(function () use ($request, $car) {
                $car->update($request->validated());

                // Прикрепляем выбранные теги
                if ($request->has('tags')) {
                    $car->tags()->sync($request->input('tags', []));
                } // если поле tags вообще не пришло в запросе
                else {
                    $car->tags()->detach();
                }
            });

            session()->flash('message-info', trans('notifications.cars.updated'));

            return response()->json([
                'success' => true,
                'redirect' => route('cars.show', [$car->id])
            ]);
        });
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        return $this->handleValidation(function() use ($id) {
            $car = Car::findOrFail($id);
            Gate::authorize('delete', $car);

            $car->delete();
            session()->flash('message-info', trans('notifications.cars.deleted'));

            return response()->json([
                'success' => true,
                'redirect' => route('cars.index')
            ]);
        });
    }

    public function trash()
    {
        Gate::authorize('trash', $this->modelCar);

        $cars = Car::onlyTrashed()->orderBy('id', 'desc')->get();
        return view('cars.trash', ['cars' => $cars, 'modelCar' => $this->modelCar]);
    }

    public function restore(Request $request, string $id)
    {
        return $this->handleValidation(function() use ($request, $id) {
            $car = Car::onlyTrashed()->findOrFail($id);
            Gate::authorize('restore', $car);

            if (Car::where('vin', $car->vin)->exists())
            {
                session()->flash('message-warning', trans('notifications.cars.vin-exists', ['vin' => $car->vin]));

                return response()->json([
                    'success' => false
                ]);
            }
            else {
                $car->restore();
                session()->flash('message-info', trans('notifications.cars.restored'));

                return response()->json([
                    'success' => true
                ]);
            }
        });
    }

    public function forceDelete(string $id)
    {
        Gate::authorize('forceDelete', $this->modelCar);

        return $this->handleValidation(function() use ($id) {
            $car = Car::onlyTrashed()->findOrFail($id);
            $car->tags()->detach();
            $car->forceDelete();
            session()->flash('message-info', trans('notifications.cars.permanently-deleted'));

            return response()->json([
                'success' => true
            ]);
        });
    }
}
