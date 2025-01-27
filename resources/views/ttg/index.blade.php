<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Index</title>
</head>
<body>
<h1>Index Page</h1>
<p>Welcome to the index page!</p>
    <div style="border: #2563eb 2px solid">
        <br>
<form method="post" action="{{route('ttg.store')}}">
    @csrf
    Name: <input type="text" name="name">
    <br>
    Players<input type="number" name="players"><br>
    description:<br>
    <textarea name="description"></textarea><br>
    <button type="submit">Add</button>
    <br>
</form>
</div>
<h2>All Items</h2>
<ul>

        <li>
            <strong>{{ $ttg->name }}</strong> - {{ $ttg->players }} players
            <p>{{ $ttg->description }}</p>
        </li>

</ul>

</body>
</html>

