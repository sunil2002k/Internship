<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <div style="max-width: 720px; margin: 2rem auto; font-family: Arial, sans-serif;">
        <h1>Registered Users</h1>
        @if ($users->isEmpty())
            <p>No users found.</p>
        @else
            <table border="1">
    <thead>
        <tr>
            <th>Name</th>
            <th>Email</th>
            <th>Details</th>
            <th>Edit</th>
            <th>Delete</th>
        </tr>
    </thead>

    <tbody>
        @foreach($users as $user)
        <tr>
            <td>{{ $user->name }}</td>
            <td>{{ $user->email }}</td>

            <td>
                <a href="{{ route('user.show', $user->id) }}">
                    View Details
                </a>
            </td>

            <td>
                <a href="{{ route('user.edit', $user->id) }}">
                    Edit
                </a>
            </td>

            <td>
                <form action="{{ route('user.delete', $user->id) }}" method="POST">
                    @csrf
                    @method('DELETE')

                    <button type="submit">
                        Delete
                    </button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
        @endif
    </div>
</body>
</html>