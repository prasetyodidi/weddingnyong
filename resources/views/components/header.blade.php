<div id="mobile-nav" class="fixed w-1/2 top-0 right-0 bottom-0 bg-white border-2 shadow-lg translate-x-full ease-in duration-300 z-50">
    <i id="close-menu" class="fas fa-times absolute top-5 right-5 text-2xl"></i>
    <div class="flex flex-col w-full h-full items-center justify-evenly hover:cursor-pointer">
        <a href="#feature" class="hover:border-b-2 border-primary">Fitur</a>
        <a href="#price" class="hover:border-b-2 border-primary">Harga</a>
        <a href="#theme" class="hover:border-b-2 border-primary">Tema</a>
        <a href="#testimoni" class="hover:border-b-2 border-primary">Testimoni</a>
        @if (Route::has('login'))
            @auth
            <a href="/dashboard">Dashboard</a>
        @else
            <a href="{{ route('login') }}" class="hover:border-b-2 border-primary">Login</a>    
            @endauth
        @endif    
    </div>
</div>

<div class="flex flex-col fixed w-full">
    <div class="h-14 w-full box-border flex justify-between items-center pl-5 pr-5 bg-white lg:h-20">
        <h1 class="font-bold md:text-3xl">Weddingnyong</h1>
        <i class="fas fa-align-right text-2xl lg:hidden" id="menu"></i>
        <div class="hidden w-4/12 lg:flex justify-between mr-5 lg:text-xl hover:cursor-pointer">
            <a href="#feature" class="hover:border-b-2 border-primary">Fitur</a>
            <a href="#price" class="hover:border-b-2 border-primary">Harga</a>
            <a href="#theme" class="hover:border-b-2 border-primary">Tema</a>
            <a href="#testimoni" class="hover:border-b-2 border-primary">Testimoni</a>
            @if (Route::has('login'))
                @auth
                <a href="/dashboard">Dashboard</a>
            @else
                <a href="{{ route('login') }}" class="hover:border-b-2 border-primary">Login</a>
                @endauth
            @endif
        </div>
    </div>
    <hr id="header-hr" class="hidden">
</div>

<script src="js/header.js"></script>