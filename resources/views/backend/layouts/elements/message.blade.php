@if (session('status'))
    <div class="alert alert-success">
        <span class="close" data-dismiss="alert">&times;</span>
        <strong>{{ session('status') }}.</strong>
    </div>
@endif
