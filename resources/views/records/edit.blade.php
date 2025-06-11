<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold text-gray-800 dark:text-gray-200">Edit Record</h2>
    </x-slot>

    <div class="py-6 px-4">
        <form action="{{ route('records.update', $record) }}" method="POST">
            @csrf
            @method('PUT')
            @include('records._form')
            <button type="submit" class="mt-4 bg-blue-500 text-white px-4 py-2 rounded">Update</button>
        </form>
    </div>
</x-app-layout>
