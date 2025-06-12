
<style>
     body {
        margin: 0;
        padding: 0;
    }
</style>
<div style="background-color: #2e2e2e; color: white; min-height: 100vh; padding: 20px;">

<div style="margin-bottom: 16px;">
    <label for="name" style="display: block; margin-bottom: 6px; font-weight: 600;">Name:</label>
    <input 
        type="text" 
        name="name" 
        id="name" 
        value="{{ old('name', $game->name ?? '') }}" 
        required
        style="width: 100%; padding: 8px; border: 1px solid #ccc; border-radius: 5px; background-color:rgba(240, 240, 240, 0.39); color: rgba(228, 219, 219, 0.74);"
    >
</div>

<div style="margin-bottom: 16px;">
    <label for="image" style="display: block; margin-bottom: 6px; font-weight: 600;">Image:</label>
    <input 
        type="file" 
        name="image" 
        id="image" 
        style="width: 100%; padding: 6px; border: 1px solid #ccc; border-radius: 5px; background-color:rgba(240, 240, 240, 0.39); color: rgba(228, 219, 219, 0.74);"
    >
    @error('image')
        <div style="color: #dc2626; margin-top: 4px;">{{ $message }}</div>
    @enderror
    @if (!empty($game->image))
        <p style="margin-top: 8px;">
            Current image: 
            <img src="{{ asset('storage/' . $game->image) }}" alt="Game image" width="100" style="vertical-align: middle; border-radius: 6px; border: 1px solid #ccc;">
        </p>
    @endif
</div>

<div style="margin-bottom: 16px;">
    <label for="players" style="display: block; margin-bottom: 6px; font-weight: 600;">Number of players (1–20):</label>
    <input 
        type="number" 
        name="players" 
        id="players" 
        min="1" 
        max="20" 
        value="{{ old('players', $game->players ?? '') }}" 
        required
        style="width: 100%; padding: 8px; border: 1px solid #ccc; border-radius: 5px; background-color:rgba(240, 240, 240, 0.39); color: rgba(228, 219, 219, 0.74);"
    >
</div>

<div style="margin-bottom: 16px;">
    <label for="played_at" style="display: block; margin-bottom: 6px; font-weight: 600;">Date Played:</label>
    <input 
        type="date" 
        name="played_at" 
        id="played_at" 
        value="{{ old('played_at', isset($game->played_at) ? \Carbon\Carbon::parse($game->played_at)->format('Y-m-d') : '') }}"
        style="width: 100%; padding: 8px; border: 1px solid #ccc; border-radius: 5px; background-color:rgba(240, 240, 240, 0.39); color: rgba(228, 219, 219, 0.74);"
    >
</div>

<div style="margin-bottom: 16px;">
    <label for="category_id" style="display: block; margin-bottom: 6px; font-weight: 600;">Category:</label>
    <select 
        name="category_id" 
        id="category_id" 
        style="width: 100%; padding: 8px; border: 1px solid #ccc; border-radius: 5px; background-color:rgba(240, 240, 240, 0.39); color: rgba(228, 219, 219, 0.74);"
    >
        <option value="">-- Choose a category --</option>
        @foreach($categories as $category)
            <option value="{{ $category->id }}" 
                {{ old('category_id', $game->category_id ?? '') == $category->id ? 'selected' : '' }}>
                {{ $category->name }}
            </option>
        @endforeach
    </select>
</div>

<div style="margin-bottom: 16px;">
    <label for="note" style="display: block; margin-bottom: 6px; font-weight: 600;">Note:</label>
    <textarea 
        name="note" 
        id="note" 
        rows="4" 
        style="width: 100%; padding: 8px; border: 1px solid #ccc; border-radius: 5px; background-color:rgba(240, 240, 240, 0.39); color: rgba(228, 219, 219, 0.74);"
    >{{ old('note') }}</textarea>
</div>
