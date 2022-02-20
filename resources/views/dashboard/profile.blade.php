@extends('dashboard.main')

@section('content')
    <div class="w-full h-full p-3 overflow-hidden">
        <h1 class="text-2xl">Profile</h1>

        <div class="">
            <div class="">
                <img class="w-16 h-16 rounded-full border-2" src="{{ $user->profile_image }}" alt="profile image anda">
                <input type="file">
            </div>
            <div class="grid grid-rows-3 gap-4">
                <p>Nama</p>
                <p>Alamat</p>
                <input type="text" value="{{ $user->name }}">
                <input type="text" value="{{ $user->address }}" placeholder="alamat">
            </div>
        </div>
    </div>
@endsection