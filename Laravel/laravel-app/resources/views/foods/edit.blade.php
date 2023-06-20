@extends('layouts.app')
@section('content')
    <h1>Update a food</h1>
    <form action="/foods/{{ $food->id }}" method="POST" style="margin-left: 50px">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label for="name" class="form-label">Name</label>
            <input type="text" value="{{ $food->name }}" class="form-control" name="name" id="name" placeholder="name of food">
        </div>
        <div class="mb-3">
            <label for="count" class="form-label">Quantity</label>
            <input type="number" value="{{ $food->count }}" class="form-control" name="count" id="count">
        </div>
        <div class="mb-3">
            <label for="description" class="form-label">Description</label>
            <input class="form-control" value="{{ $food->description }}" name="description" id="description" rows="3"></input>
        </div>
        <input type="submit" class="btn btn-primary">
    </form>
@endsection