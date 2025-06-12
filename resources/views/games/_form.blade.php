<!-- Name -->
<div class="mb-3">
    <label for="name">Name:</label>
    <input type="text" name="name" id="name" value="{{ old('name', $game->name ?? '') }}" required>
</div>

<!-- Image Field -->
<div class="mb-3">
    <label for="image">Image:</label>
    <input type="file" name="image" id="image" class="form-control"> <!-- Added class for better styling -->
    @error('image')
        <div class="text-danger">{{ $message }}</div> <!-- Added error display -->
    @enderror
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
<!-- Category -->
<div class="mb-3">
    <label for="category_id">Category:</label>
    <select name="category_id" id="category_id" class="form-control">
        <option value="">-- Choose a category --</option>
        @foreach($categories as $category)
            <option value="{{ $category->id }}" {{ old('category_id', $game->category_id ?? '') == $category->id ? 'selected' : '' }}>
                {{ $category->name }}
            </option>
        @endforeach
    </select>
</div>
<!-- Notes -->
<div class="mb-3">
    <label for="note">Note:</label>
    <textarea name="note" id="note">{{ old('note') }}</textarea>
</div>

