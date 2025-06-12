@extends('layouts.app')

@section('content')
    <h1>Games</h1>

    {{-- Back to Dashboard Button --}}
    <a href="{{ route('dashboard') }}" class="btn btn-secondary" style="margin-right: 10px;">← Back to Dashboard</a>

    {{-- Add New Game Button --}}
    <a href="{{ route('games.create') }}" class="btn btn-primary">Add New Game</a>

    @if ($games->count())
        <table border="1" cellpadding="8" cellspacing="0" style="margin-top: 20px;">
            <thead>
                <tr>
                    <th>Name</th>
                    {{-- No description as you said it should be removed --}}
                    <th>Category</th>
                    <th>Notes</th>
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
                        
                        {{-- Category --}}
                        <td>{{ $game->category ? $game->category->name : 'No category' }}</td>
                        
                        {{-- Notes --}}
                        <td>
                            @if ($game->notes->count() > 0)
                                <ul style="padding-left: 20px; margin: 0;">
                                    @foreach ($game->notes as $note)
                                        <li>{{ $note->content }}</li>
                                    @endforeach
                                </ul>
                            @else
                                <span>No notes</span>
                            @endif
                        </td>

                        {{-- Image --}}
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
                            <form action="{{ route('games.destroy', $game) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" onclick="return confirm('Are you sure?')">Delete</button>
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
