<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use App\Http\Requests\Brands\Save as SaveRequest;
use App\Models\Country;
use Illuminate\Support\Facades\Gate;

class Brands extends Controller
{
    private string $modelBrand = Brand::class;
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        Gate::authorize('viewAny', $this->modelBrand);

        $brands = Brand::orderBy('title')->get();
        return view('brands.index', ['brands' => $brands, 'modelBrand' => $this->modelBrand]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        Gate::authorize('create', $this->modelBrand);

        $countries = Country::orderBy('title')->pluck('title', 'id');
        return view('brands.create', compact('countries'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(SaveRequest $request)
    {
        Gate::authorize('create', $this->modelBrand);

        return $this->handleValidation(function() use ($request) {
            $brand = Brand::create($request->validated());
            session()->flash('message-info', trans('notifications.brands.added'));

            return response()->json([
                'success' => true,
                'redirect' => route('brands.show', [$brand->id])
            ]);
        });
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        Gate::authorize('view', $this->modelBrand);

        $brand = Brand::with([
            'country', // Загружаем бренд и связанную страну
            'cars',         // Загружаем автомобили бренда
            'comments.user' // Загружаем комментарии и связанных пользователей
        ])->findOrFail($id);
        return view('brands.show', compact('brand'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $brand = Brand::findOrFail($id);
        Gate::authorize('update', $brand);

        $countries = Country::orderBy('title')->pluck('title', 'id');
        return view('brands.edit', compact('brand', 'countries'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(SaveRequest $request, string $id)
    {
        return $this->handleValidation(function() use ($request, $id) {
            $brand = Brand::findOrFail($id);
            Gate::authorize('update', $brand);

            $brand->update($request->validated());
            session()->flash('message-info', trans('notifications.brands.updated'));

            return response()->json([
                'success' => true,
                'redirect' => route('brands.show', [$brand->id])
            ]);
        });
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        return $this->handleValidation(function() use ($id) {
            $brand = Brand::findOrFail($id);
            Gate::authorize('delete', $brand);

            if($brand->cars->count() === 0) {
                $brand->delete();
                session()->flash('message-info', trans('notifications.brands.deleted'));
            }
            else {
                session()->flash('message-warning', trans('notifications.brands.cannotBeDeleted'));
            }


            return response()->json([
                'success' => true
            ]);
        });
    }
}
