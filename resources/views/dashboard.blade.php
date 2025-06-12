@extends('layouts.app')

@section('content')
    <h1>Welcome, {{ Auth::user()->name }} 
        <small>({{ Auth::user()->is_admin ? 'Admin' : 'User' }})</small>
    </h1>

    <form method="POST" action="{{ route('logout') }}" style="display: inline;">
        @csrf
        <button type="submit">Log out</button>
    </form>

    <p>This is your dashboard. Use the buttons below to manage your games.</p>

    <p>
        <a href="{{ route('games.create') }}" 
           style="background-color: #2563eb; color: white; padding: 8px 12px; border-radius: 4px; text-decoration: none;">
           Create New Game
        </a>
    </p>

    <p>
        <a href="{{ route('games.index') }}" 
           style="background-color: #16a34a; color: white; padding: 8px 12px; border-radius: 4px; text-decoration: none;">
           View All Games
        </a>
    </p>

    <p>
        <a href="{{ route('profile.edit') }}" 
           style="background-color: #4f46e5; color: white; padding: 8px 12px; border-radius: 4px; text-decoration: none;">
           Profile
        </a>
    </p>
@endsection
