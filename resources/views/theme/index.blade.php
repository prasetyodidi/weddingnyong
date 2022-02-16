<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="/css/app.css">

    <title>Desain Undangan Weddingnyong</title>
</head>
<body>
    <x-header></x-header>

    <div class="container">
        <div class="flex flex-col min-h-screen px-4 mb-20">
            <h1 class="text-center text-3xl">Pilihan Desain</h1>
            <p class="text-center">Pilih dan gunakan tema undangan pernikahan yang menarik serta unik</p>
            <div class="grid grid-cols-1 md:grid-cols-2 md:gap-5 lg:grid-cols-3 lg:gap-7">
                @foreach ($designs as $item)
                    <div class="flex flex-col border-2 rounded-md hover:cursor-pointer overflow-hidden">
                        <div class="relative group overflow-hidden">
                            <img class="w-full group-hover:rotate-12 group-hover:scale-110 ease-in duration-200" src="{{ $item->thumb }}" alt="thumb design">
                            <div class="absolute hidden group-hover:block left-0 top-0 right-0 bottom-0 bg-slate-300 opacity-60"></div>
                        </div>
                        <hr>
                        <div class="h-14 leading-14 flex justify-evenly items-center">
                            <p class="leading-14">{{ $item->name }}</p>
                            <a href="{{ route('invitation.create', ['slug' => $item->slug]) }}" class="block no-underline px-3 h-7 bg-primary rounded-2xl text-white text-center leading-7">Buat Undangan</a>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>

    <x-footer></x-footer>
</body>
</html>