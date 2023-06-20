@extends('layouts.app')
@section('content')
<form>
    <h1>Show deltail food</h1>
    <img src="{{ asset('img/' . $food->image_path) }}">
    <div class="mb-3">
        <label for="name" class="form-label">Name</label>
        <input class="form-control" value="{{ $food->name }}" id="name" aria-describedby="emailHelp" readonly>
    </div>
    <div class="mb-3">
        <label for="Count" class="form-label">Count</label>
        <input class="form-control" value="{{ $food->count }}" id="Count" aria-describedby="emailHelp" readonly>
    </div>
    <div class="mb-3">
        <label for="kind" class="form-label">Kind of food</label>
        <input class="form-control" value="{{ $food->category->name }}" id="kind" aria-describedby="emailHelp" readonly>
    </div>
    <div class="mb-3">
        <label for="Description" class="form-label">Description</label>
        <input class="form-control" value="{{ $food->category->description }}" id="Description" aria-describedby="emailHelp" readonly>
    </div>
    
</form>
@endsection