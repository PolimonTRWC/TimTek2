@extends('layouts.app')

@section('content')
    <div style="padding: 20px; max-width: 600px; margin: 0 auto; background-color: #2e2e2e; color: white;">
        <h2 style="margin-bottom: 1rem;">Create New Game</h2>

        <form method="POST" action="{{ route('games.store') }}" enctype="multipart/form-data">
            @csrf
            @include('games._form')

            <button style="background-color: #eeee02; color: black; padding: 6px 10px; margin-top: 12px; border-radius: 6px; text-decoration: none; font-weight: bold;" type="submit">
                Save
            </button>
        </form>
    </div>
@endsection
