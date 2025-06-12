
<style>
     body {
        margin: 0;
        padding: 0;
    }
</style>
<div style="background-color: #2e2e2e; color: white; min-height: 100vh; padding: 20px;">
    <h1 >Games</h1>
    {{-- Back to Dashboard Button --}}
        <a href="{{ route('dashboard') }}" 
           style="background-color: #2563eb; color: white; padding: 8px 12px; margin: 5px 5px; border-radius: 4px; text-decoration: none;">
        Back to Dashboard
        </a>

    {{-- Add New Game Button --}}
    <a href="{{ route('games.create') }}" 
           style="background-color: #2563eb; color: white; padding: 8px 12px; margin: 5px 5px; border-radius: 4px; text-decoration: none;">
        Add New Game
    </a>
    <br>
    <br>
    <br>
@if ($games->count())
    @foreach ($games as $game)
        <div style="display: flex; align-items: center; background-color: #222; color: white; padding: 10px; border-radius: 6px; margin-bottom: 1rem;">
            <div style="flex-shrink: 0; margin-right: 15px;">
                @if($game->image)
                    <img src="{{ asset('storage/' . $game->image) }}" alt="Game Image" style="height: 100px; width: auto; border-radius: 6px;">
                @else
                    <div style="height: 100px; width: 100px; background-color: #555; display: flex; align-items: center; justify-content: center; border-radius: 6px;">
                        <span>No Image</span>
                    </div>
                @endif
            </div>

            <div style="flex-grow: 1;">
                <h3 style="font-size: 1.5rem; font-weight: 700; margin: 0 0 5px 0;">{{ $game->name }}</h5>
                <p style="margin: 0 0 5px 0;"><strong>Category:</strong> {{ $game->category->name ?? '—' }}</p>
                <p style="margin: 0 0 10px 0;"><strong>Note:</strong> {{ $game->notes->first()->content ?? '—' }}</p>

                <div style="display: flex; justify-content: space-between; align-items: center;">
                    <div>
                        <p style="margin: 0;"><strong>Players:</strong> {{ $game->players }}</p>
                        <p style="margin: 0;"><strong>Played:</strong> {{ $game->played_at ?? '—' }}</p>
                    </div>

                    <div>
                        <a href="{{ route('games.show', $game) }}" 
                            style="background-color: #eeee02; color: black; padding: 6px 10px; margin-right: 8px; border-radius: 6px; text-decoration: none; font-weight: bold;">
                           View
                        </a>
                        <form action="{{ route('games.destroy', $game) }}" method="POST" class="d-inline" onsubmit="return confirm('Are you sure?')" style="display: inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" style="background-color: #d70606; color: white; padding: 6px 10px; border: none; border-radius: 6px; font-weight: bold; cursor: pointer;">
                                Delete
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    @endforeach
@else
    <p>No games found.</p>
@endif
</div>