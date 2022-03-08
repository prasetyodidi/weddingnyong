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
        <div class="w-full h-14 bg-white flex justify-between px-16 items-center">
            <a href="/" class="text-xl">Weddingnyong</a>
            {{-- nav link --}}
            <div class="flex justify-end items-center">
                <i class="fas fa-bell text-gray-primary text-xl"></i>
                <div class="hover:cursor-pointer relative group">
                    <img class="inline object-cover w-10 h-10 rounded-full" src="/{{ auth()->user()->profile_image }}" alt="Profile image"/>
                    <div class="absolute z-20 hidden text-center top-0 -left-20 px-7 py-2 bg-white rounded-md border-2 shadow-md w-0 group-hover:w-auto group-hover:block group-hover:ease-in duration-700 ">
                        <img class="rounded-full w-11 h-11 mx-auto border-2" src="/{{ auth()->user()->profile_image }}" alt="profile">
                        <h2>{{ auth()->user()->name }}</h2>
                        <p class="text-sm text-gray-600">{{ auth()->user()->email }}</p>
                        <p class="text-sm">{{ auth()->user()->address ? auth()->user()->address : 'Anda belum menambahkan alamat' }}</p>
                        <a href="{{ route('dashboard.profile') }}" class="block w-auto rounded-lg hover:shadow-md border-2 px-2 mt-7">kelola Akun Anda</a>
                    </div>
                </div>
                <p>Hello, {{ auth()->user()->name }}</p>

                {{-- <div class="flex group flex-row items-center justify-between">
                    
                    <img class="inline object-cover w-10 h-10 rounded-full" src="/{{ auth()->user()->profile_image }}" alt="Profile image"/>
                    <p>Hello, {{ auth()->user()->name }}</p>
                    <div class="absolute z-20 hidden text-center top-0 px-7 py-2 bg-white rounded-md border-2 shadow-md w-0 group-hover:w-auto group-hover:block group-hover:ease-in duration-700 ">
                        <img class="rounded-full w-11 h-11 mx-auto border-2" src="/{{ auth()->user()->profile_image }}" alt="profile">
                        <h2>{{ auth()->user()->name }}</h2>
                        <p class="text-sm text-gray-600">{{ auth()->user()->email }}</p>
                        <p class="text-sm">{{ auth()->user()->address ? auth()->user()->address : 'Anda belum menambahkan alamat' }}</p>
                        <a href="{{ route('dashboard.profile') }}" class="block w-auto rounded-lg hover:shadow-md border-2 px-2 mt-7">kelola Akun Anda</a>
                    </div> --}}
                {{-- </div> --}}
            </div>
        </div>

        {{-- dashboard --}}
        <div class="h-5/6 w-full flex flex-row-reverse justify-around mt-5 lg:flex-row">
            {{-- icon --}}
            <div class="flex flex-col items-center justify-between w-1/12 bg-white rounded-lg py-5">
                <div class="flex flex-col w-5/6 h-2/3 justify-around items-center lg:items-start">
                    <a href="/dashboard" class="flex flex-row-reverse rounded-md md:h-auto cursor-pointer hover:border-b-2 hover:border-b-primary">
                        <p class="hidden lg:block lg:leading-6">Home</p>&nbsp;
                        <i class="{{ Request::is('dashboard') ? 'text-primary' : 'text-gray-400'}} fas fa-home hover:text-primary lg:leading-6"></i>
                    </a>
                    <a href="/dashboard/invitation" class="flex flex-row-reverse md:h-auto cursor-pointer hover:border-b-2 hover:border-b-primary">
                        <p class="hidden lg:block lg:leading-6">Invitation</p>&nbsp;
                        <i class="{{ Request::is('dashboard/invitation') ? 'text-primary' : 'text-gray-400' }} fas fa-envelope text-gray-400 hover:text-primary lg:leading-6"></i>
                    </a>
                    <a href="/dashboard/guest-book" class="flex flex-row-reverse md:h-autouto cursor-pointer hover:border-b-2 hover:border-b-primary">
                        <p class="hidden lg:block md:left-6">Guest book</p>&nbsp;
                        <i class="{{ Request::is('dashboard/guest-book') ? 'text-primary' : 'text-gray-400' }} fas fa-comment text-gray-400 hover:text-primary lg:leading-6"></i>
                    </a>
                    <a href="/dashboard/attendee-list" class="flex flex-row-reverse md:h-auto cursor-pointer hover:border-b-2 hover:border-b-primary">
                        <p class="hidden lg:block md:left-6">attendee list</p>
                        <i class="{{ Request::is('dashboard/attendee-list') ? 'text-primary' : 'text-gray-400' }} fas fa-handshake hover:text-primary lg:leading-6"></i>
                    </a>
                    @can('admin')
                        <a href="/dashboard/user" class="flex flex-row-reverse md:h-auto cursor-pointer hover:border-b-2 hover:border-b-primary">
                            <p class="hidden lg:block md:left-6">User</p>
                            <i class="{{ Request::is('dashboard/user') ? 'text-primary' : 'text-gray-400' }} fas fa-user hover:text-primary lg:leading-6"></i>
                        </a>
                        <a href="/dashboard/design" class="flex flex-row-reverse md:h-auto cursor-pointer hover:border-b-2 hover:border-b-primary">
                            <p class="hidden lg:block md:left-6">Design</p>
                            <i class="fas fa-palette {{ Request::is('dashboard/design') ? 'text-primary' : 'text-gray-400' }} hover:text-primary lg:leading-6"></i>
                        </a>
                    @endcan
                    <a href="/dashboard/profile" class="flex flex-row-reverse md:h-auto cursor-pointer hover:border-b-2 hover:border-b-primary">
                        <p class="hidden lg:block md:left-6">Profile</p>
                        <i class="{{ Request::is('dashboard/profile') ? 'text-primary' : 'text-gray-400' }} fas fa-user-circle hover:text-primary lg:leading-6"></i>
                    </a>
                </div>
                <form action="/logout" method="POST" class="flex justify-center h-1/12 w-5/6 lg:block">
                    @csrf
                    <button type="submit" onclick="return confirm('Are you sure?')" class="flex flex-row-reverse">
                        {{-- <div class="w-1/6 flex flex-row-reverse justify-center md:h-6 cursor-pointer hover:border-b-2 hover:border-b-primary"> --}}
                        <p class="hidden lg:block">Logout</p>&nbsp;
                        <i class="fas fa-sign-out-alt block lg:leading-6"></i>
                        {{-- </div> --}}
                    </button>
                </form>
            </div>

            {{-- content --}}
            <div class="w-10/12 bg-white rounded-lg">
                @yield('content')
            </div>
        </div>

    </div>
</body>
</html>