@extends('layouts.app')
@section('content')
    <div style="padding: 2rem 1rem; max-width: 600px; margin: 0 auto; background-color:rgba(249, 250, 251, 0.17); border-radius: 8px; box-shadow: 0 2px 8px rgba(0,0,0,0.1);">

        <div style="margin-bottom: 24px;">
            <a href="{{ route('dashboard') }}"
               style="background-color: #2563eb; color: white; padding: 8px 12px; margin: 5px 5px; border-radius: 4px; text-decoration: none;">
               {{ __('Back to Dashboard') }}
            </a>
        </div>

        {{-- Update Name & Email --}}
        <section style="margin-bottom: 40px;">
            <header style="margin-bottom: 20px;">
                <h3 style="font-size: 1.25rem; font-weight: 600; color:rgba(254, 254, 254, 0.74); margin-bottom: 6px;">
                    {{ __('Profile Information') }}
                </h3>
                <p style="font-size: 0.875rem; color:rgb(255, 255, 255);">
                    {{ __("Update your name and email address.") }}
                </p>
            </header>

            <form method="post" action="{{ route('profile.update') }}" style="display: flex; flex-direction: column; gap: 16px;">
                @csrf
                @method('patch')

                <div style="display: flex; flex-direction: column;">
                    <label for="name" style="font-weight: 600; margin-bottom: 6px;">{{ __('Name') }}</label>
                    <input id="name" name="name" type="text" required autofocus autocomplete="name"
                        value="{{ old('name', auth()->user()->name) }}"
                        style="padding: 10px; background-color:rgba(240, 240, 240, 0.39); color: rgba(228, 219, 219, 0.74); border: 1px solid #d1d5db; border-radius: 6px; font-size: 1rem; outline: none;">
                    <x-input-error class="mt-2" :messages="$errors->get('name')" />
                </div>

                <div style="display: flex; flex-direction: column;">
                    <label for="email" style="font-weight: 600; margin-bottom: 6px;">{{ __('Email') }}</label>
                    <input id="email" name="email" type="email" required autocomplete="username"
                        value="{{ old('email', auth()->user()->email) }}"
                        style="padding: 10px; background-color:rgba(240, 240, 240, 0.39); color: rgba(228, 219, 219, 0.74);border: 1px solid #d1d5db; border-radius: 6px; font-size: 1rem; outline: none;">
                    <x-input-error class="mt-2" :messages="$errors->get('email')" />
                </div>

                <div style="margin-top: 16px;">
                    <button type="submit" 
                        style="padding: 10px 20px; background-color: #2563eb; color: white; border: none; border-radius: 6px; font-weight: 600; cursor: pointer;">
                        {{ __('Save') }}
                    </button>

                    @if (session('status') === 'profile-updated')
                        <p style="color: #16a34a; margin-top: 8px; font-size: 0.875rem;">{{ __('Saved.') }}</p>
                    @endif
                </div>
            </form>
        </section>

        {{-- Update Password --}}
        <section>
            <header style="margin-bottom: 20px;">
                <h3 style="font-size: 1.25rem; font-weight: 600; color:rgb(255, 255, 255); margin-bottom: 6px;">
                    {{ __('Update Password') }}
                </h3>
            </header>

            <form method="post" action="{{ route('password.update') }}" style="display: flex; flex-direction: column; gap: 16px;">
                @csrf
                @method('put')

                <div style="display: flex; flex-direction: column;">
                    <label for="current_password" style="font-weight: 600; margin-bottom: 6px;">{{ __('Current Password') }}</label>
                    <input id="current_password" name="current_password" type="password" autocomplete="current-password"
                        style= "padding: 10px; background-color:rgba(240, 240, 240, 0.39); color: rgba(228, 219, 219, 0.74); border: 1px solid #d1d5db; border-radius: 6px; font-size: 1rem; outline: none;">
                    <x-input-error class="mt-2" :messages="$errors->get('current_password')" />
                </div>

                <div style="display: flex; flex-direction: column;">
                    <label for="password" style="font-weight: 600; margin-bottom: 6px;">{{ __('New Password') }}</label>
                    <input id="password" name="password" type="password" autocomplete="new-password"
                        style="padding: 10px; background-color:rgba(240, 240, 240, 0.39); color: rgba(228, 219, 219, 0.74);border: 1px solid #d1d5db; border-radius: 6px; font-size: 1rem; outline: none;">
                    <x-input-error class="mt-2" :messages="$errors->get('password')" />
                </div>

                <div style="display: flex; flex-direction: column;">
                    <label for="password_confirmation" style="font-weight: 600; margin-bottom: 6px;">{{ __('Confirm Password') }}</label>
                    <input id="password_confirmation" name="password_confirmation" type="password" autocomplete="new-password"
                        style="padding: 10px; background-color:rgba(240, 240, 240, 0.39); color: rgba(228, 219, 219, 0.74);border: 1px solid #d1d5db; border-radius: 6px; font-size: 1rem; outline: none;">
                    <x-input-error class="mt-2" :messages="$errors->get('password_confirmation')" />
                </div>

                <div style="margin-top: 16px;">
                    <button type="submit" 
                        style="padding: 10px 20px; background-color: #2563eb; color: white; border: none; border-radius: 6px; font-weight: 600; cursor: pointer;">
                        {{ __('Save') }}
                    </button>

                    @if (session('status') === 'password-updated')
                        <p style="color: #16a34a; margin-top: 8px; font-size: 0.875rem;">{{ __('Password updated.') }}</p>
                    @endif
                </div>
            </form>
    </div>
@endsection
