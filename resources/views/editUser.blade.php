<!DOCTYPE html>
<html>
<head>
    <title>Edit User</title>
</head>
<body>

    <h1>Edit User</h1>

    <form action="{{ route('user.update', $user->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div>
            <label>Name</label>
            <input
                type="text"
                name="name"
                value="{{ $user->name }}"
            >
        </div>

        <br>

        <div>
            <label>Email</label>
            <input
                type="email"
                name="email"
                value="{{ $user->email }}"
            >
        </div>

        <br>

        <button type="submit">
            Update User
        </button>
    </form>

</body>
</html>