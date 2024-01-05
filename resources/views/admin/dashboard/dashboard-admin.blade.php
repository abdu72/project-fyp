<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Admin</title>
</head>

<body>
    <p>Anda berhasil Login</p>

    <form action="{{ route('admin.logout') }}" method="POST">
        @csrf
        <button type="submit" onclick="return confirm('Are you sure want to logout?')">Logout</button>
    </form>
</body>

</html>