@if($errors->any())
    <div class="alert alert-danger">
        <ul class="list-group">
            @foreach($errors->all() as $error)
                    <div>{{ $error }}</div>
            @endforeach
        </ul>
    </div>
@endif
