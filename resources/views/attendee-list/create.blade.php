<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="/css/app.css">

    <title>Attendee List</title>
</head>
<body>
    <div class="w-full h-screen flex justify-center items-center">
        <form action="{{ route('attendee-list.store') }}" method="POST"
        class="block mx-2 bg-white rounded-lg border-2 px-7 py-5">
            @csrf
            <h1 class="text-2xl">Daftar Hadir</h1>
            <div class="my-10">
                <input type="hidden" name="invitation_slug" value="{{ app('request')->input('nikahan') }}">
                <input type="text" name="name" placeholder="nama" class="block mb-3 rounded-md" value="{{ old('name') }}">
                <x-validation-message name="name"/>
                <textarea name="address" id="address" cols="30" rows="10" class="rounded-md">alamat</textarea>
            </div>
            <button type="submit" class="block px-5 py-2 rounded-md text-white bg-primary hover:bg-opacity-80">Kirim</button>
        </form>
    </div>
</body>
</html>