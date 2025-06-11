@extends('layouts.app')

@section('content')
    <h1>Games</h1>

    <a href="{{ route('games.create') }}" class="btn btn-primary">Add New Game</a>

    @if ($games->count())
        <table>
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Description</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($games as $game)
                <tr>
                    <td>{{ $game->name }}</td>
                    <td>{{ $game->description }}</td>
                    <td>
                        <a href="{{ route('games.edit', $game) }}">Edit</a>
                        <form action="{{ route('games.destroy', $game) }}" method="POST" style="display:inline-block;">
                            @csrf
                            @method('DELETE')
                            <button onclick="return confirm('Delete this game?')" type="submit">Delete</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    @else
        <p>No games found.</p>
    @endif
@endsection
