<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold text-gray-800 dark:text-gray-200">Record Details</h2>
    </x-slot>

    <div class="py-6 px-4">
        <p><strong>Game:</strong> {{ $record->game->name }}</p>
        <p><strong>Notes:</strong> {{ $record->notes }}</p>
        <a href="{{ route('records.index') }}" class="mt-4 inline-block text-blue-500 hover:underline">← Back</a>
    </div>
</x-app-layout>
