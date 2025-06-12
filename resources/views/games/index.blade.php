@extends('layouts.app')

@section('content')
    <h1>Games</h1>

    <a href="{{ route('games.create') }}" class="btn btn-primary">Add New Game</a>

    @if ($games->count())
        <table border="1" cellpadding="8" cellspacing="0" style="margin-top: 20px;">
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Description</th>
                    <th>Image</th>
                    <th>Players</th>
                    <th>Date Played</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($games as $game)
                    <tr>
                        <td>{{ $game->name }}</td>
                        <td>{{ $game->description }}</td>
                        <td>
                            @if ($game->image)
                                <img src="{{ asset('storage/' . $game->image) }}" alt="Game image" width="100">
                            @else
                                <span>No image</span>
                            @endif
                        </td>
                        <td>{{ $game->players }}</td>
                        <td>{{ $game->played_at ? \Carbon\Carbon::parse($game->played_at)->format('Y-m-d') : 'Not set' }}</td>
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
