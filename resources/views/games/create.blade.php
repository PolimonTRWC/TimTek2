<!-- create.blade.php -->
<form method="POST" action="{{ route('games.store') }}" enctype="multipart/form-data">
    @csrf
    @include('games._form')
    <button style="background-color: #eeee02; color: black; padding: 6px 10px; margin-right: 8px; border-radius: 6px; text-decoration: none; font-weight: bold;" type="submit">Save</button>
</form>
