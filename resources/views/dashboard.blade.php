@extends('layouts.app')

@section('content')
    <div style="text-align: center; color: white; max-width: 600px; margin: 2rem auto; font-family: Arial, sans-serif;">
        <h1 style="font-size: 2rem; margin-bottom: 0.3rem;">
            Welcome, {{ Auth::user()->name }}
            <small style="font-weight: normal; font-size: 1rem; color: #aaa;">
                ({{ Auth::user()->is_admin ? 'Admin' : 'User' }})
            </small>
        </h1>

        <form method="POST" action="{{ route('logout') }}" style="display: inline-block; margin-bottom: 1.5rem;">
            @csrf
            <button type="submit" 
                style="
                    background-color: #ef4444; 
                    color: white; 
                    padding: 8px 16px; 
                    border: none; 
                    border-radius: 5px; 
                    cursor: pointer;
                    font-weight: 600;
                    font-size: 1rem;
                ">
                Log out
            </button>
        </form>

        <p style="font-size: 1.1rem; margin-bottom: 2rem;">
            This is your dashboard. Use the buttons below to manage your games.
        </p>

        <div style="display: inline-block; text-align: center;">

            <a href="{{ route('games.create') }}" 
               style="
                   background-color: #2563eb; 
                   color: white; 
                   padding: 12px 24px; 
                   border-radius: 6px; 
                   text-decoration: none; 
                   font-weight: 600; 
                   display: block;
                   margin-bottom: 12px;
                   box-shadow: 0 4px 6px rgba(0,0,0,0.2);
                   transition: background-color 0.3s ease;
               "
               onmouseover="this.style.backgroundColor='#1e40af'"
               onmouseout="this.style.backgroundColor='#2563eb'">
               Create New Game
            </a>

            <a href="{{ route('games.index') }}" 
               style="
                   background-color: #16a34a; 
                   color: white; 
                   padding: 12px 24px; 
                   border-radius: 6px; 
                   text-decoration: none; 
                   font-weight: 600; 
                   display: block;
                   margin-bottom: 12px;
                   box-shadow: 0 4px 6px rgba(0,0,0,0.2);
                   transition: background-color 0.3s ease;
               "
               onmouseover="this.style.backgroundColor='#15803d'"
               onmouseout="this.style.backgroundColor='#16a34a'">
               View All Games
            </a>

            <a href="{{ route('profile.edit') }}" 
               style="
                   background-color: #4f46e5; 
                   color: white; 
                   padding: 12px 24px; 
                   border-radius: 6px; 
                   text-decoration: none; 
                   font-weight: 600; 
                   display: block;
                   box-shadow: 0 4px 6px rgba(0,0,0,0.2);
                   transition: background-color 0.3s ease;
               "
               onmouseover="this.style.backgroundColor='#4338ca'"
               onmouseout="this.style.backgroundColor='#4f46e5'">
               Manage Profile
            </a>

        </div>
    </div>
@endsection
