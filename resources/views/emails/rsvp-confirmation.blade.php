<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ config('app.name') }}</title>
</head>
<body>
    <p>Nama: {{ $name }}</p>
    <p>Pesan: {{ $messageGuestBook }}</p>
    <p>Kehadiran: {{ $confirmation == true ? 'Ya! Saya akan datang' : 'Maaf ngga bisa dateng' }}</p>
</body>
</html>