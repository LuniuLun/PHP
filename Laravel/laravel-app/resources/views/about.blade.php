@extends('layouts.app')
@section('content')
    <h1>This is about page</h1>
    {{ $x = 10 }}
    @if ($x > 2 ) 
        <h3>x is greater than 2</h3>
    
    @elseif($x < 10) 
        <h3>x is less than 10</h3>
    @else 
        <h3>All conditions are not match</h3>   
    @endif
@endsection
