@extends('layouts.app')

@section('content')
    <div class="container">
        <form action="{{ route('food.store', $restaurant) }}" method="POST">
            @csrf
            <h3>Dodaj jelo:</h3>
            <h4>Restoran: {{ $restaurant->name }}</h4>
            <div class="row">
                <div class="col-6">
                    <label for="name">Naziv jela:</label>
                    <input type="text" class="form-control" name="name" id="name">
                </div>
                
                <div class="col-6">
                    <label for="cena">Cena jela:</label>
                    <input type="number" class="form-control" name="cena" id="cena">
                </div>
            </div>


            <label class="mt-3" for="kategorija">Kategorija jela:</label> <br>
            <div class="row">
                <div class="col-8">
                    
                    <select name="category" id="category" class="form-control">
                        @foreach ($menus as $menu)
                            <option value="{{ $menu->id }}">{{ $menu->category }}</option>
                        @endforeach
                    </select>
                </div>
                
                <div class="col-4">
                    <input type="submit" class="btn btn-success" value="Napravi">
                    <a href="{{ route('menu.create') }}" class="btn btn-success">Dodaj kategoriju hrane</a> <br>
                </div>
            </div>
            </form>

            @foreach ($food as $one)
                <h3>{{ $one->name }}</h3>
                <h3>{{ $one->cena }} din.</h3>
                <hr>
            @endforeach

    </div>
@endsection