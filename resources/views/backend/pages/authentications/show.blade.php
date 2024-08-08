<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <!-- resources/views/users/show.blade.php -->

<h1>Detail User</h1>

<p>ID: {{ $user->id }} <br><br> Nama: {{ $user->username }} <br> <br> Email: {{ $user->email }}</p>
<!-- Tambahkan kolom lainnya sesuai kebutuhan -->

</body>
</html>