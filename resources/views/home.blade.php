@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-4">
            <div class="card">
                <div class="card-header">Restorani</div>

                <div class="card-body">
                   @foreach ($restaurants as $restaurant)
                       <a href="{{ route('restorani', $restaurant) }}">{{ $restaurant->name }}</a> <br>
                   @endforeach
                </div>
            </div>
        </div>

        <div class="col-md-8">
            <div class="card">
                <div class="card-header">@if ( $restoran ?? '' ) {{ $restoran->name }} @else Birajte restoran @endif</div>

                <div class="card-body">
                    @if ( $restoran ?? '' ) 
                        @foreach ($categories as $category)
                            <h2>{{ $category->category }}</h2>
                            @foreach ($category->food as $hrana)
                                @if ($hrana->restaurant->id == $restoran->id)
                                    <h4>{{ $hrana->name }}, {{ $hrana->cena  }} din.</h4>
                                @endif
                            @endforeach
                        @endforeach
                    @else
                    Izaberite restoran
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
