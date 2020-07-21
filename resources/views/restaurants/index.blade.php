@extends('layouts.app')

@section('content')
    <div class="container">
        <a href="{{ route('restaurants.create') }}" class="btn btn-success mt-3">Dodaj novi restoran</a>
        <a href="{{ route('menu.index') }}" class="btn btn-success mt-3">Pogledaj sve kategorije</a>
        <a href="{{ route('menu.create') }}" class="btn btn-success mt-3">Dodaj kategoriju hrane</a> <br>
        @foreach ($restaurants as $restaurant)
            <a href="{{ route('food.create', $restaurant) }}">{{ $restaurant->name }}</a> <br>
        @endforeach
    </div>
@endsection