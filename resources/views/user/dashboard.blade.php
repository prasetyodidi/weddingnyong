<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{mix ('css/app.css')}}">
    <title>Dashboard</title>
</head>
<body>
    <div class="bg-gray-primary overflow-hidden h-screen box-border">
        {{-- header --}}
        <div class="w-full h-14 bg-white flex justify-around items-center">
            <h1 class="text-xl">Weddingnyong</h1>
            {{-- nav link --}}
            <div class="flex w-1/2 justify-end items-center">
                <i class="fas fa-bell text-gray-primary text-xl"></i>
                <img class="inline object-cover w-10 h-10 rounded-full" src="/img/web/—Pngtree—profile glyph black icon_4008321.png" alt="Profile image"/>
                {{-- <img src="/img/web/—Pngtree—profile glyph black icon_4008321.png" alt="profil" class="w-8 h-8 rounded-full "> --}}
                <p>Hello, Didi</p>
            </div>
        </div>

        {{-- dashboard --}}
        <div class="h-5/6 w-full flex flex-row-reverse justify-around mt-5 md:flex-row">
            {{-- icon --}}
            <div class="flex flex-col items-center justify-between w-1/12 bg-white rounded-lg py-5">
                <div class="flex flex-col w-5/6 h-1/3 justify-around items-center md:items-start">
                    <a href="/dashboard" class="flex flex-row-reverse md:h-6 cursor-pointer hover:border-b-2 hover:border-b-primary">
                        <p class="hidden md:block md:leading-6">Home</p>&nbsp;
                        <i class="{{  request()->routeIs('/dashboard') ? 'text-primary' : 'text-gray-400' }} fas fa-home hover:text-primary md:leading-6" ></i>
                    </a>
                    <a href="/dashboard/invitation" class="flex flex-row-reverse md:h-6 cursor-pointer hover:border-b-2 hover:border-b-primary">
                        <p class="hidden md:block md:leading-6">Invitation</p>&nbsp;
                        <i class="fas fa-envelope text-gray-400 hover:text-primary md:leading-6"></i>
                    </a>
                    <a href="/dashboard/guest-book" class="flex flex-row-reverse md:h-6 cursor-pointer hover:border-b-2 hover:border-b-primary">&nbsp;
                        <p class="hidden md:block md:left-6">Guest book</p>
                        <i class="fas fa-comment text-gray-400 hover:text-primary md:leading-6"></i>
                    </a>
                </div>
                <div class="w-1/6 flex flex-row-reverse justify-center md:h-6 cursor-pointer hover:border-b-2 hover:border-b-primary">
                    <p class="hidden md:block">Logout</p>&nbsp;
                    <i class="fas fa-sign-out-alt block md:leading-6"></i>
                </div>
            </div>

            {{-- content --}}
            <div class="w-10/12 bg-white rounded-lg"></div>
        </div>

    </div>
</body>
</html>