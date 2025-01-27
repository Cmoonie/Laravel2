<h1>Create Item</h1>
<form method="POST" action="{{ route('ttg.store') }}">
    @csrf
    <input type="text" name="name" placeholder="Name">
    <input type="number" name="players" placeholder="Players">
    <textarea name="description" placeholder="Description"></textarea>
    <button type="submit">Save</button>
</form>
