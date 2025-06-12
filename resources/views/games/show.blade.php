@extends('layouts.app')

@section('content')
    <div style="padding: 1rem; max-width: 600px; margin: 0 auto; color: white;">
        <h2 style="font-size: 1.5rem; margin-bottom: 1rem;">{{ $game->name }}</h2>

        @if($game->image)
            <img src="{{ asset('storage/' . $game->image) }}" alt="Game Image" style="width: 100%; max-width: 300px; border-radius: 6px; margin-bottom: 1rem;">
        @endif

        <p><strong>Category:</strong> {{ $game->category->name ?? '—' }}</p>
        <p><strong>Players:</strong> {{ $game->players }}</p>
        <p><strong>Date Played:</strong> {{ $game->played_at }}</p>
        <p><strong>Note:</strong> {{ $game->notes->first()->note ?? 'No note' }}</p>
        <a href="{{ route('games.edit', $game) }}" 
                           style="background-color: #eeee02; color: black; padding: 6px 10px; margin-right: 8px; border-radius: 6px; text-decoration: none; font-weight: bold;">
                           Edit
                        </a>

        <a href="{{ route('games.index') }}" style="display: inline-block; margin-top: 1rem; padding: 8px 12px; background-color: #4b5563; color: white; border-radius: 4px; text-decoration: none;">Back</a>
    </div>
@endsection
