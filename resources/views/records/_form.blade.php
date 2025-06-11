<div class="mt-4">
    <label class="block font-medium text-sm text-gray-700 dark:text-gray-300">Game</label>
    <select name="game_id" class="w-full mt-1 border-gray-300 rounded-md shadow-sm">
        @foreach($games as $game)
            <option value="{{ $game->id }}"
                {{ old('game_id', $record->game_id ?? '') == $game->id ? 'selected' : '' }}>
                {{ $game->name }}
            </option>
        @endforeach
    </select>
</div>

<div class="mt-4">
    <label class="block font-medium text-sm text-gray-700 dark:text-gray-300">Notes</label>
    <textarea name="notes" class="w-full mt-1 border-gray-300 rounded-md shadow-sm">{{ old('notes', $record->notes ?? '') }}</textarea>
</div>
