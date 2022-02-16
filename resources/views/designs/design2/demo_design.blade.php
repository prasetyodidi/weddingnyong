<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="/css/app.css">
    <title>Ucup & Putri</title>
    <style>
        html{
            scroll-behavior: smooth
        }
    </style>
</head>
<body>
    <div class="flex flex-col relative pb-20">
        {{-- navigation --}}
        <div class="flex justify-around items-center w-full fixed bottom-0 h-14 border-t-2 bg-white">
            <a href="#home">
                <i class="fas fa-home text-2xl"></i>
            </a>
            <a href="#couple">
                <i class="fas fa-info-circle text-2xl"></i>
            </a>
            <a href="#wedding">
                <i class="fas fa-calendar-week text-2xl"></i>
            </a>
            <a href="#guest-book">
                <i class="fas fa-comment-dots text-2xl"></i>
            </a>
        </div>

        {{-- beranda --}}
        <div id="home" class="flex flex-col md:h-screen">
            <div class="text-center h-screen pt-48 md:h-auto">
                <p class="text-xl">
                    We’re Getting Married
                    <br>
                    sunday, 30 October 2021
                </p>
                <h1 class="text-5xl">
                    Ucup & Marinka
                </h1>
            </div>
            <div class="flex flex-col items-center md:flex-row md:mt-20">
                <img class="rounded-full h-60 w-60 flex items-center justify-center border-4 border-pink-300 mx-auto" src="/img/web/wedding-g1665d32ca_1920.jpg" alt="groom">
                <i class="fas fa-heart text-6xl text-red-600"></i>
                <img class="rounded-full h-60 w-60 flex items-center justify-center border-4 border-pink-300 mx-auto" src="/img/web/wedding-g1665d32ca_1920.jpg" alt="groom">
            </div>
        </div>

        {{-- couple --}}
        <div id="couple" class="flex flex-col mt-14">
            <h1 class="text-4xl text-center">Tentang mempelai</h1>
            <div class="flex flex-col mt-6 items-center lg:flex-row lg:justify-center lg:h-64">
                <div class="text-center">
                    <h1 class="text-3xl">Ucup surucup</h1>
                    <p>Putr ke 3 dari Bapak Bambang dan Ibu Bambang</p>
                </div>
                <img class="w-52" src="/img/web/2496293.jpg" alt="ring">
                <div class="text-center">
                    <h1 class="text-3xl">Putri Wulandari</h1>
                    <p>Putr ke 3 dari Bapak Budi dan Ibu Budi</p>
                </div>
            </div>
        </div>

        {{-- acara --}}
        <div id="wedding" class="h-screen text-center mt-32 border-b-8 border-pink-300 lg:mt-36">
            <h1 class="text-4xl">acara</h1>
            <div class="flex flex-col items-center justify-evenly h-2/5 md:pt-16 lg:pt-0 md:flex-row">
                <div class="md:w-5/12">
                    <h1 class="text-3xl mb-3">akad nikah</h1>
                    <p>30 October 2021 @ 14:54</p>
                    <p>Gedung Kebhinekaan</p>
                    <p>Jalan Pramuka nomer 56</p>
                </div>
                <div class="md:w-5/12">
                    <h1 class="text-3xl mb-3">resepsi</h1>
                    <p>30 October 2021 @ 16:54</p>
                    <p>Gedung Kebhinekaan</p>
                    <p>Jalan Pramuka nomer 56</p>
                </div>
            </div>
        </div>

        {{-- guest book --}}
        <div id="guest-book" class="min-h-screen border-b-8 border-pink-300 pt-5 pb-32">
            <h1 class="text-center text-4xl mb-10">Buku Tamu</h1>

            <div class="flex flex-col justify-center md:flex-row">
                {{-- message --}}
                <div class="md:h-96 md:w-5/12 max-h-screen overflow-scroll p-5">
                    <div class="w-full mb-4 p-4 pt-1 shadow-lg">
                        <p>keysha</p>
                        <p class="mb-2">7 bulan yang lalu</p>
                        <p>Selamat yaaa semoga dilancarkan sampai hari H nyaa. aamiiin</p>
                        <p>Hadir</p>
                    </div>
                    <div class="mb-4 p-4 pt-1 shadow-lg">
                        <p>keysha</p>
                        <p class="mb-2">7 bulan yang lalu</p>
                        <p>Selamat yaaa semoga dilancarkan sampai hari H nyaa. aamiiin</p>
                        <p>Hadir</p>
                    </div>
                    <div class="mb-4 p-4 pt-1 shadow-lg">
                        <p>keysha</p>
                        <p class="mb-2">7 bulan yang lalu</p>
                        <p>Selamat yaaa semoga dilancarkan sampai hari H nyaa. aamiiin</p>
                        <p>Hadir</p>
                    </div>
                </div>
                {{-- end message --}}

                {{-- form --}}
                <div class="md:w-5/12 flex flex-col items-center">
                    <input type="hidden" name="invitation_id" value="">
                    <div>
                        <label for="name" class="block">name</label>
                        <input type="text" name="name" id="name" class="@error('name') border-red-500 @enderror" value="{{ old('name') }}">
                    </div>
                    <div>
                        <label for="message" class="block">message</label>
                        <input type="text" name="message" id="message" class="@error('message') border-red-500 @enderror" value="{{ old('message') }}" required>
                    </div>
                    <div class="mb-7">
                        <input type="radio" name="confirmation" id="present" class="@error('confirmation') border-red-500 @enderror" value="1">
                        <label for="present">Ya, saya akan hadir</label>
                        <input type="radio" name="confirmation" id="not-present" class="@error('confirmation') border-red-500 @enderror" value="0">
                        <label for="not-present">Maaf saya tidak bisa hadir</label>
                        @error('confirmation')
                            <p class="text-red-500">{{ $message }}</p>
                        @enderror
                    </div>
                    <button type="button" class="px-7 py-2 bg-pink-300 rounded-md text-white hover:bg-pink-500">Kirim</button>
                </div>
                {{-- end form --}}
            </div>
        </div>
    </div>
</body>
</html>