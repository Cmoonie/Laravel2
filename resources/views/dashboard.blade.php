<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />


    <title>Dashboard</title>
</head>
<body>
<h1>Dashboard</h1>
<table border="1">
    <thead>
    <tr>
        <th>ID</th>
        <th>Name</th>
        <th>Players</th>
        <th>Description</th>
        <th>Actions</th>
    </tr>
    </thead>
    <tbody>
    @foreach ($ttgs as $ttg)
        <tr>
            <td>{{ $ttg->id }}</td>
            <td>{{ $ttg->name }}</td>
            <td>{{ $ttg->players }}</td>
            <td>{{ $ttg->description }}</td>
            <td>
                <a href="{{ route('ttg.show', $ttg->id) }}">View</a>
                <a href="{{ route('ttg.edit', $ttg->id) }}">Edit</a>
                <form action="{{ route('ttg.destroy', $ttg->id) }}" method="POST" style="display:inline;">
                    @csrf
                    @method('DELETE')
                    <button type="submit">Delete</button>
                </form>
            </td>
        </tr>
    @endforeach
    </tbody>
</table>
</body>
</html>
