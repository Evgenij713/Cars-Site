<?php

namespace App\Http\Controllers;

use App\Models\Tag;
use App\Http\Requests\Tags\Save as SaveRequest;
use Illuminate\Support\Facades\Gate;

class Tags extends Controller
{
    private string $modelTag = Tag::class;
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        Gate::authorize('viewAny', $this->modelTag);

        $tags = Tag::orderBy('title')->get();
        return view('tags.index', ['tags' => $tags, 'modelTag' => $this->modelTag]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        Gate::authorize('create', $this->modelTag);

        return view('tags.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(SaveRequest $request)
    {
        Gate::authorize('create', $this->modelTag);

        return $this->handleValidation(function() use ($request) {
            $tag = Tag::create($request->validated());
            session()->flash('message-info', trans('notifications.tags.added'));

            return response()->json([
                'success' => true,
                'redirect' => route('tags.show', [$tag->id])
            ]);
        });
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        Gate::authorize('view', $this->modelTag);

        $tag = Tag::with([
            'cars', // Загружаем автомобили бренда
        ])->findOrFail($id);
        return view('tags.show', compact('tag'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $tag = Tag::findOrFail($id);
        Gate::authorize('update', $tag);

        return view('tags.edit', compact('tag'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(SaveRequest $request, string $id)
    {
        return $this->handleValidation(function() use ($request, $id) {
            $tag = Tag::findOrFail($id);
            Gate::authorize('update', $tag);

            $tag->update($request->validated());
            session()->flash('message-info', trans('notifications.tags.updated'));

            return response()->json([
                'success' => true,
                'redirect' => route('tags.show', [$tag->id])
            ]);
        });
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        return $this->handleValidation(function() use ($id) {
            $tag = Tag::findOrFail($id);
            Gate::authorize('delete', $tag);

            $tag->delete();
            session()->flash('message-info', trans('notifications.tags.deleted'));

            return response()->json([
                'success' => true
            ]);
        });
    }
}
