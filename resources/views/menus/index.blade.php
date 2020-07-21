@extends('layouts.app')

@section('content')
    <div class="container">
        <a href="{{ route('menu.create') }}" class="btn btn-success">Dodaj kategoriju hrane</a> <br>
        @foreach ($menus as $menu)
            <h2>{{ $menu->category }}</h2>
        @endforeach
    </div>
    
@endsection