@extends('layouts.app')

@section('content')
    <div class="container">
        <a href="{{ route('restaurants.create') }}" class="btn btn-success">Dodaj novi restoran</a> <br>
        @foreach ($restaurants as $restaurant)
            <a href="{{ route('food.create', $restaurant) }}">{{ $restaurant->name }}</a> <br>
        @endforeach
    </div>
@endsection