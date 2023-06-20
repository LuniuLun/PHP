@extends('layouts.app')
@section('content')
    <h1>Create Food</h1>
    <form action="/foods" method="POST" style="margin-left: 50px" enctype="multipart/form-data">
        @csrf
        <div class="mb-3">
            <label for="image" class="form-label">Ảnh minh hoạ</label>
            <input type="file" class="form-control" name="image" id="image">
        </div>
        <div class="mb-3">
            <label for="name" class="form-label">Name</label>
            <input type="text" class="form-control" name="name" id="name" placeholder="name of food">
        </div>
        <select class="form-select" aria-label="Default select example" name="category_id">
            <option selected>Kind of food</option>
            @foreach ($categories as $item)                
                <option value="{{ $item->id }}">{{ $item->name }}</option>
            @endforeach
          </select>
        <div class="mb-3">
            <label for="count" class="form-label">Quantity</label>
            <input type="number" class="form-control" name="count" id="count">
        </div>
        <div class="mb-3">
            <label for="description" class="form-label">Description</label>
            <textarea class="form-control" name="description" id="description" rows="3"></textarea>
        </div>
        <input type="submit" class="btn btn-primary">
    </form>
    @if ($errors->any()) 
        <div>
            @foreach ($errors as $item)
                <p class="text-danger">{{ $item }}</p>
            @endforeach
        </div>
    @endif
@endsection