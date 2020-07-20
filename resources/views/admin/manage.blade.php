@extends('layouts.app')

@section('content')
<div class="container">
    <form action="{{ route('admin.manage') }}" method="POST">
        @csrf
        <label for="email">Upisite E-mail osobe kojoj zelite da promenite funkciju</label>
        <div class="row">
            <div class="col-8">
                <input type="text" class="form-control" name="email">
            </div>
            <div class="col-4">
                <input type="submit" class="btn btn-success" value="Trazi">
            </div>
        </div>
    </form>

    @if ( $users ?? '' )
    @foreach ($users ?? '' as $user)
    <a href="{{ route('admin.manage.user', $user->id) }}">{{ $user->email }}</a>
    @endforeach
    @endif

    @if ( $oneUser ?? '' )
    <h3>Ime: {{ $oneUser->name }}</h3>
    <h3>Email: {{ $oneUser->email }}</h3>
    <form action="{{ route('admin.manage.roles', $oneUser->id) }}" method="POST">
        @csrf
        @foreach ($roles ?? '' as $role)

        <input type="checkbox" id="{{ $role->name }}" name="{{ $role->name }}"
            {{ $oneUser->roles->pluck('name')->contains($role->name) ? 'checked' : '' }} value="{{ $role->id }}">
        <label for="{{ $role->name }}">{{ $role->name }}</label> <br>
        @endforeach

        <input type="submit" class="btn btn-success" value="Izmeni">
    </form>
    @endif

</div>

@endsection