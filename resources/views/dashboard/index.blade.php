@extends('dashboard.main')

@section('content')
    <div class="w-full h-full flex flex-col items-center justify-evenly">
        <img class="w-4/5 h-auto rounded-md xl:w-2/5" src="img/web/jonathan-borba-vPW1soDETIg-unsplash_compress63.jpg" alt="">
        <p class="w-4/5 lg:text-2xl">Selamat datang di <a href="#" class="text-primary">weddingnyong</a>, yuk lengkapi data undangan pernikahan Kamu. Tenang data yang sudah tersimpan dapat dirubah kapanpun tanpa batas</p>
        <button class="h-14 w-60 flex items-center justify-evenly rounded-md bg-primary text-white">
            <p class="text-xl">Buat Undangan</p>
            <i class="fas fa-long-arrow-alt-right text-3xl"></i>
        </button>
    </div>
@endsection