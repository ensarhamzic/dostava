@extends('layouts.app')

@section('content')
    <div class="container">
        <form action="{{ route('menu.store') }}" method="POST">
            @csrf
            <label for="name">Ime kategorije:</label><br>
            <div class="row">
                <div class="col-8">
                    <input type="text" class="form-control" name="name" id="name">
                </div>
                <div class="col-4">
                    <input type="submit" class="btn btn-success" value="Napravi">
                </div>
            </div>
            </form>
    </div>
@endsection