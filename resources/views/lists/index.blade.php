@extends("layouts.app")

@section("content")
    <div class="container">
        @if($errors->any())
            <div class="alert alert-warning">
                <ol>
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ol>
            </div>
        @endif
        <form method="post" action="{{route('lists')}}">
            @csrf
            <div class="input-group mb-3">
                <input type="text" name="body" class="form-control" placeholder="To do ">
                <input type="hidden" name="user_id" value="{{ $user}}">
                <button class="btn btn-outline-secondary" type="submit" value="Add List">Add</button>
              </div>
        </form>


        <div class="d-flex bd-highlight mb-3 bg-primary">

            <div class="p-2 bd-highlight"><span class="badge bg-danger rounded-pill">Tasks({{count($listtodos)}})</span></div>
        </div>


        @foreach ($listtodos as $listtodo)
        @if($listtodo->check_id == 0)
        <ul class="list-group">
            <li class="list-group-item list-group-item-action d-flex">
                <div class="p-2">
                    <a href="{{ url("/lists/$listtodo->id")}}" class="btn btn-sm btn-{{$listtodo->check_id ? 'secondary' : 'info'}}">{{ $listtodo->check_id ? 'Undone' : 'Done' }}</a>
                </div>
                <div class="p-2 flex-grow-1">{{ $listtodo->body}}</div>

                <div class="p-2">{{ $listtodo->created_at->diffForHumans() }}</div>
                <div class="p-2"><a href="{{ url("/lists/edit/$listtodo->id")}}" class="btn btn-warning ">Edit</a></div>
                <div class="p-2"><a href="{{ url("/lists/delete/$listtodo->id")}}" class="btn btn-danger">Delete</a></div>
            </li>

        </ul>
        @endif
        @endforeach
        <hr class="">
        @foreach ($listtodos as $listtodo)
        @if($listtodo->check_id == 1)
        <ul class="list-group">
            <li class="list-group-item list-group-item-action list-group-item-light text-muted d-flex">
                <div class="p-2">
                    <a href="{{ url("/lists/$listtodo->id")}}" class="btn btn-sm btn-{{$listtodo->check_id ? 'secondary' : 'info'}}">{{ $listtodo->check_id ? 'Undone' : 'Done' }}</a>
                </div>
                <div class="p-2 flex-grow-1">{{ $listtodo->body}}</div>

                <div class="p-2">{{ $listtodo->created_at->diffForHumans() }}</div>
                {{-- <div class="p-2"><a href="{{ url("/lists/edit/$listtodo->id")}}" class="btn btn-warning">Edit</a></div> --}}
                <div class="p-2"><a href="{{ url("/lists/delete/$listtodo->id")}}" class="btn btn-close"></a></div>

            </li>

        </ul>
        @endif
        @endforeach

    </div>
@endsection
