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

            <div class="row mt-3">
                <div class="col-8">
                    <label for="kategorija">Kategorija jela:</label>
                    <select name="category" id="category" class="form-control">
                        @foreach ($menus as $menu)
                            <option value="{{ $menu->category }}">{{ $menu->category }}</option>
                        @endforeach
                    </select>
                </div>
                
                <div class="col-4">
                    <input type="submit" class="btn btn-success" value="Napravi">
                </div>
            </div>
            </form>
    </div>
@endsection