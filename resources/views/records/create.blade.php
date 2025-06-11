<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold text-gray-800 dark:text-gray-200">Add New Record</h2>
    </x-slot>

    <div class="py-6 px-4">
        <form action="{{ route('records.store') }}" method="POST">
            @csrf
            @include('records._form')
            <button type="submit" class="mt-4 bg-green-500 text-white px-4 py-2 rounded">Save</button>
        </form>
    </div>
</x-app-layout>
