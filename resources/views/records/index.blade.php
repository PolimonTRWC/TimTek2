<tbody>
    @forelse($records as $record)
        <tr>
            <td class="border px-4 py-2">{{ $record->game?->name ?? 'No game' }}</td>
            <td class="border px-4 py-2">{{ $record->notes }}</td>
            <td class="border px-4 py-2">
                <a href="{{ route('records.show', $record) }}" class="text-blue-500 hover:underline">View</a> |
                <a href="{{ route('records.edit', $record) }}" class="text-green-500 hover:underline">Edit</a> |
                <form action="{{ route('records.destroy', $record) }}" method="POST" class="inline-block" onsubmit="return confirm('Delete this record?');">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="text-red-500 hover:underline">Delete</button>
                </form>
            </td>
        </tr>
    @empty
        <tr>
            <td colspan="3" class="border px-4 py-4 text-center text-gray-500">
                No game records found. <br>
                <a href="{{ route('records.create') }}" class="text-blue-500 hover:underline">Create your first game record</a>
            </td>
        </tr>
    @endforelse
</tbody>
