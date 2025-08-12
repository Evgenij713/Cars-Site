<!-- Секция комментариев -->
@props([
    'commentable' => collect(), // По умолчанию пустая коллекция
    'modelComment' => 'App\Models\Comment'
])

<div class="comments-section">
    <h3 class="section-title">Комментарии</h3>

    @if($commentable->comments->count() > 0)
        <div class="comments-list">
            @foreach($commentable->comments as $comment)
                <div class="comment">
                    <div class="comment-header">
                        <span class="comment-author">{{ $comment->user->name }}</span>
                        <span class="comment-date">{{ $comment->created_at->format('d.m.Y H:i') }}</span>
                    </div>
                    <div class="comment-body">{{ $comment->body }}</div>
                </div>
            @endforeach
        </div>
    @else
        <p class="no-comments">Пока нет комментариев. Будьте первым!</p>
    @endif

    @can('create', $modelComment)
        <!-- Форма добавления комментария -->
        <div class="comment-form">
            <h4 class="form-title">Добавить комментарий</h4>
            <form id="commentForm">
                @csrf
                <div class="form-group">
                    <textarea id ="body" name="body" class="form-control" rows="3" placeholder="Ваш комментарий..."></textarea>
                    <div id="body-error" class="error-message"></div>
                </div>
                <div class="form-group">
                    <input type="hidden" name="commentable_id" value="{{ $commentable->id }}"/>
                    <div id="commentable_id-error" class="error-message"></div>
                </div>
                <div class="form-group">
                    <input type="hidden" name="commentable_type" value="{{ $commentable->getTable() }}"/>
                    <div id="commentable_type-error" class="error-message"></div>
                </div>
                <button type="submit" class="button submit-button">Отправить</button>
            </form>
        </div>
    @endcan
</div>
