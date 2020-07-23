@extends('layouts.app')

@section('content')
    <div class="container">
        <form action="{{ route('food.update', $jelo) }}" method="POST">
            @csrf
            <h3>Izmeni jelo:</h3>
            <h4>Restoran: {{ $jelo->restaurant->name }}</h4>
            <div class="row">
                <div class="col-6">
                    <label for="name">Naziv jela:</label>
                    <input type="text" class="form-control" name="name" id="name" value="{{ $jelo->name }}">
                </div>
                
                <div class="col-6">
                    <label for="cena">Cena jela:</label>
                    <input type="number" class="form-control" name="cena" id="cena" value="{{ $jelo->cena }}">
                </div>
            </div>


            <label class="mt-3" for="kategorija">Kategorija jela:</label> <br>
            <div class="row">
                <div class="col-8">
                    
                    <select name="category" id="category" class="form-control">
                        @foreach ($menus as $menu)
                            <option value="{{ $menu->id }}" {{ $jelo->menu->id == $menu->id ? 'selected' : '' }}>{{ $menu->category }}</option>
                        @endforeach
                    </select>
                </div>
                
                <div class="col-4">
                    <input type="submit" class="btn btn-success" value="Izmeni">
                </div>
            </div>
            </form>

            <form action="{{ route('food.destroy', $jelo) }}" method="post" class="mt-3">
                @csrf
                @method('delete')
                <input type="submit" class="btn btn-danger" value="Izbrisi jelo">
            </form>

    </div>
@endsection