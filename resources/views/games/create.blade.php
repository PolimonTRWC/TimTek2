<!-- create.blade.php -->
<form method="POST" action="{{ route('games.store') }}" enctype="multipart/form-data">
    @csrf
    @include('games._form')
    <button type="submit">Save</button>
</form>
