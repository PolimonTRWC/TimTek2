<div>
    <label for="name">Name:</label><br>
    <input type="text" name="name" id="name" value="{{ old('name', $game->name ?? '') }}" required>
    @error('name')
        <div>{{ $message }}</div>
    @enderror
</div>

<div>
    <label for="description">Description:</label><br>
    <textarea name="description" id="description">{{ old('description', $game->description ?? '') }}</textarea>
    @error('description')
        <div>{{ $message }}</div>
    @enderror
</div>
