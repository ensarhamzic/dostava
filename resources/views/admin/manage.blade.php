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
    
</div>
    
@endsection