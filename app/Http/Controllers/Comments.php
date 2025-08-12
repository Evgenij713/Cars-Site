<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Http\Requests\Comments\Save as SaveRequest;
use Illuminate\Support\Facades\Gate;

class Comments extends Controller
{
    /**
     * Store a newly created resource in storage.
     */
    public function store(SaveRequest $request)
    {
        Gate::authorize('create', Comment::class);

        return $this->handleValidation(function() use ($request) {
            $data = $request->validated();
            $data['user_id'] = auth()->id(); // Добавляем ID текущего пользователя

            Comment::create($data);
            session()->flash('message-info', trans('notifications.comments.added'));

            return response()->json([
                'success' => true
            ]);
        });
    }
}
