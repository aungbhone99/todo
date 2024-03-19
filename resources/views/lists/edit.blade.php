@extends("layouts.app")

@section("content")
    <div class="container">
        <form method="post">
            @csrf

            <small class="text-muted">
                <label for="">Last updated</label>
                {{ $list->created_at}}
            </small>
            <br>
            <div class="input-group mb-3">

                <input type="text" name="body" class="form-control" value="{{ $list->body}}">
                <button class="btn btn-outline-secondary" type="submit" value="Add List">Update</button>
            </div>
        </form>

    </div>
@endsection

