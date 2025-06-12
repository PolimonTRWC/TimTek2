<!-- Name -->
<div class="mb-3">
    <label for="name">Name:</label>
    <input type="text" name="name" id="name" value="{{ old('name', $game->name ?? '') }}" required>
</div>

<!-- Description -->
<div class="mb-3">
    <label for="description">Description:</label>
    <textarea name="description" id="description">{{ old('description', $game->description ?? '') }}</textarea>
</div>

<!-- Image -->
<div class="mb-3">
    <label for="image">Image:</label>
    <input type="file" name="image" id="image">
    @if (!empty($game->image))
        <p>Current image: <img src="{{ asset('storage/' . $game->image) }}" alt="Game image" width="100"></p>
    @endif
</div>

<!-- Players -->
<div class="mb-3">
    <label for="players">Number of players (1–20):</label>
    <input type="number" name="players" id="players" min="1" max="20" value="{{ old('players', $game->players ?? '') }}" required>
</div>

<!-- Date Played -->
<div class="mb-3">
    <label for="played_at">Date Played:</label>
    <input type="date" name="played_at" id="played_at" value="{{ old('played_at', isset($game->played_at) ? \Carbon\Carbon::parse($game->played_at)->format('Y-m-d') : '') }}">
</div>
