@extends('layouts.app')

@section('content')
    <h1>Edit Game</h1>

    <form action="{{ route('games.update', $game) }}" method="POST">
        @csrf
        @method('PUT')

        @include('games._form')

        <button type="submit">Update</button>
    </form>
@endsection
