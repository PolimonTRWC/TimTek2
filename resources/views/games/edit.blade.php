@extends('layouts.app')

@section('content')
    <h1>Edit Game</h1>

    <form action="{{ route('games.update', $game) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        @include('games._form')
        <button type="submit" style="background-color: #eeee02; color: black; padding: 6px 10px; margin-right: 8px; border-radius: 6px; text-decoration: none; font-weight: bold;">Update</button>
    </form>

@endsection
