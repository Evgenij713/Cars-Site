@if(session('message-info'))
    <div class="flash-message flash-success">
        {{ session('message-info') }}
        <button class="flash-close-btn flash-close-btn--success">&times;</button>
    </div>
@endif
@if(session('message-warning'))
    <div class="flash-message flash-warning">
        {{ session('message-warning') }}
        <button class="flash-close-btn flash-close-btn--warning">&times;</button>
    </div>
@endif
