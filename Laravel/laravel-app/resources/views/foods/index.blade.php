@extends('layouts.app')
@section('content')
    <h1>This is foods index page</h1>
    <a href="foods/create" class="btn btn-primary" role="button">Create a new food</a>
    <div class="list-group">
        @foreach ($foods as $item)
        <ul class="list-group px-2">
            <li class="list-group-item d-flex justify-content-between align-items-center">
                <a href="/foods/{{ $item->id }}">{{ $item->name }}</a>                          
                <p class="mb-1">{{ $item->description }}</p>
                <span class="badge bg-primary rounded-pill">{{ $item->count }}</span>
            </li>
        </ul>
        <a href="foods/{{ $item->id }}/edit">EDIT</a>
        <form action="/foods/{{ $item->id }}" method="post">
            @csrf
            @method('delete')
            <button type="submit" class="btn btn-danger">DELETE</button>
        </form>
        @endforeach
    </div>
@endsection