@extends('layouts.app')

@section('content')
    <h1>Create Game</h1>

    <form action="{{ route('games.store') }}" method="POST">
        @csrf
        @include('games._form')

        <button type="submit">Save</button>
    </form>
@endsection
