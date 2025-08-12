<?php

namespace App\Http\Controllers;

use App\Models\Country;
use App\Http\Requests\Countries\Save as SaveRequest;
use Illuminate\Support\Facades\Gate;

class Countries extends Controller
{
    private string $modelCountry = Country::class;
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        Gate::authorize('viewAny', $this->modelCountry);

        $countries = Country::orderBy('title')->get();
        return view('countries.index', ['countries' => $countries, 'modelCountry' => $this->modelCountry]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        Gate::authorize('create', $this->modelCountry);

        return view('countries.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(SaveRequest $request)
    {
        Gate::authorize('create', $this->modelCountry);

        return $this->handleValidation(function() use ($request) {
            $country = Country::create($request->validated());
            session()->flash('message-info', trans('notifications.countries.added'));

            return response()->json([
                'success' => true,
                'redirect' => route('countries.show', [$country->id])
            ]);
        });
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        Gate::authorize('view', $this->modelCountry);

        $country = Country::with([
            'brands', // Загружаем бренды страны
        ])->findOrFail($id);
        return view('countries.show', compact('country'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $country = Country::findOrFail($id);
        Gate::authorize('update', $country);

        return view('countries.edit', compact('country'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(SaveRequest $request, string $id)
    {
        return $this->handleValidation(function() use ($request, $id) {
            $country = Country::findOrFail($id);
            Gate::authorize('update', $country);

            $country->update($request->validated());
            session()->flash('message-info', trans('notifications.countries.updated'));

            return response()->json([
                'success' => true,
                'redirect' => route('countries.show', [$country->id])
            ]);
        });
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        return $this->handleValidation(function() use ($id) {
            $country = Country::findOrFail($id);
            Gate::authorize('delete', $country);

            if($country->brands->count() === 0) {
                $country->delete();
                session()->flash('message-info', trans('notifications.countries.deleted'));
            }
            else {
                session()->flash('message-warning', trans('notifications.countries.cannotBeDeleted'));
            }


            return response()->json([
                'success' => true
            ]);
        });
    }
}
