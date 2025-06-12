<form action="{{ route('games.store') }}" method="POST" enctype="multipart/form-data">
    @csrf
    @include('games._form')
    <button type="submit">Save</button>
</form>
