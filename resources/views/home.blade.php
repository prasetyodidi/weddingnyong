<!DOCTYPE html>
<html lang="en" class="scroll-smooth">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{mix ('css/app.css')}}">
    <script type="text/javascript"> window.$crisp=[];window.CRISP_WEBSITE_ID="a3981fba-4383-42c2-b26c-b8b37008aec7";(function(){ d=document;s=d.createElement("script"); s.src="https://client.crisp.chat/l.js"; s.async=1;d.getElementsByTagName("head")[0].appendChild(s);})(); </script>

    <title>Landing page</title>
</head>
<body>
    <div class="container relative min-h-screen mx-auto overflow-hidden">       
        <x-header></x-header>
        
        <div class="w-full min-h-screen lg:min-h-screen">
            <div class="flex flex-col lg:flex-row h-full">
                <div class="w-full flex justify-center mt-12 lg:w-4/12 lg:h-full lg:mt-0 lg:justify-end lg:items-center">
                    <img src="/img/web/drew-coffman-llWjwo200fo-unsplash_compress12.jpg" alt="wedding" class="w-3/4 rounded-md lg:w-auto lg:h-44 lg:-mb-32 lg:mt-96">
                </div>
                <div class="flex flex-col items-center w-3/4 h-auto mt-12 m-auto text-center lg:w-5/12 lg:mx-0 lg:mb-0 lg:mt-44">
                    <p class="text-2xl lg:text-4xl">Sekarang Zamannya Undangan Pernikahan Website</p>
                    <p class="text-base lg:text-lg">Bagikan momen spesialmu dengan cara yang spesial bersama kami, nikmati diskon 50%</p>
        
                    <div class="w-40 h-10 bg-primary rounded-2xl text-white mt-12 shadow-lg hover:shadow-primary/50">
                        <a href="/invitation/create" class="text-center text-lg leading-10">Buat Sekarang</a>
                    </div>
                </div>
                <div class="hidden w-4/12 lg:block lg:overflow-hidden">
                    <img src="/img/web/blake-cheek-R7sKX3PXZ1A-unsplash_compress11.jpg" alt="wedding" class="lg:w-auto mt-44 lg:h-2/3 lg:ml-12">
                </div>
            </div>
        </div>

        {{-- fitur --}}
        <div id="feature" class="min-h-screen mb-5">
            <h1 class="text-center md:text-3xl">Fitur Undangan</h1>
            <div class="flex flex-col items-center justify-center mt-14 md:grid md:grid-cols-2 md:gap-4 md:justify-items-center lg:grid-cols-3 lg:gap-4 lg:justify-items-stretch">
                @for ($i = 0; $i < 10; $i++)
                    <div class="flex justify-between border-2 border-primary w-64 h-32 mt-3 lg:mt-0 lg:justify-self-center">
                        <div class="flex items-center">
                            <div class="flex items-center justify-center w-14 h-14 rounded-full bg-primary -ml-7">
                                <i class="fas fa-map-marked-alt text-2xl text-white"></i>
                            </div>
                        </div>
                        <div class="flex flex-col w-10/12 mt-1 mb-1">
                            <h1 class=" mb-2">Navigasi Lokasi</h1>
                            <p class="text-sm">Tampilkan peta lokasi yang lebih baik dan akurat melalui google maps</p>
                        </div>
                    </div>
                @endfor
            </div>
        </div>

        {{-- harga --}}
        <div id="price" class="min-h-screen flex flex-col mb-7 items-center">
            <h1 class="text-3xl text-center">Harga Paket Undangan Pernikahan</h1>
            <p class="px-3 text-center text-gray-500 md:block md:w-3/4 md:mx-auto">Weddingnyong dibuat berdasarkan pengalaman, sehingga harga untuk fitur penuh tidak akan membuat budget pernikahan kamu membengkak.</p>

            <div class="flex flex-col items-center w-full lg:flex-row shrink-0 lg:items-start lg:justify-evenly mt-3">
                <div class="w-3/4 shadow-lg hover:shadow-2xl rounded-md px-4 pt-5 pb-7 lg:mt-10 lg:w-1/4">
                    <h1 class="text-2xl">Gratis</h1>
                    <p class="text-sm">Paket Bronze</p>
    
                    <div class="mt-6">
                        @for ($i = 0; $i < 6; $i++)
                            <p>
                                <i class="fas fa-check text-green-400"></i>
                                Background musik
                            </p>
                        @endfor
                        <div class="h-10 w-28 rounded-md bg-primary mt-3 hover:cursor-pointer">
                            <p class="leading-10 text-center text-lg text-white">Pilih Paket</p>
                        </div>
                    </div>
                </div>
                
                <div class="w-3/4 shadow-lg hover:shadow-2xl rounded-md px-4 pt-5 pb-7 mt-10 lg:w-1/4">
                    <h1 class="text-2xl">Rp. 79.000</h1>
                    <p class="text-sm">Paket Silver</p>
    
                    <div class="mt-6">
                        @for ($i = 0; $i < 10; $i++)
                            <p>
                                <i class="fas fa-check text-green-400"></i>
                                Background musik
                            </p>
                        @endfor
                        <div class="h-10 w-28 rounded-md bg-primary mt-3 hover:cursor-pointer">
                            <p class="leading-10 text-center text-lg text-white">Pilih Paket</p>
                        </div>
                    </div>
                </div>
                
                <div class="w-3/4 shadow-lg hover:shadow-2xl rounded-md px-4 pt-5 pb-7 mt-10 bg-primary lg:w-1/4">
                    <h1 class="text-2xl text-white">Rp. 99.000</h1>
                    <p class="text-sm text-white">Paket Gold</p>
    
                    <div class="mt-6">
                        @for ($i = 0; $i < 15; $i++)
                            <p class="text-white">
                                <i class="fas fa-check text-green-400"></i>
                                Background musik
                            </p>
                        @endfor
                        <div class="h-10 w-28 rounded-md bg-white mt-3 hover:cursor-pointer">
                            <p class="leading-10 text-center text-lg text-black">Pilih Paket</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        {{-- Tema / Design --}}
        <div class="flex flex-col min-h-screen px-4 mb-20">
            <h1 class="text-center text-3xl">Pilihan Desain</h1>
            <p class="text-center">Pilih dan gunakan tema undangan pernikahan yang menarik serta unik</p>
            <div class="grid grid-cols-1 md:grid-cols-2 md:gap-5 lg:grid-cols-3 lg:gap-7">
                @foreach ($designs as $item)
                    <div class="flex flex-col border-2 rounded-md hover:cursor-pointer overflow-hidden">
                        <div class="relative group overflow-hidden">
                            <img class="w-full group-hover:rotate-12 group-hover:scale-110 ease-in duration-200" src="{{ $item->thumb }}" alt="thumb design">
                            <div class="absolute hidden group-hover:block duration-700 left-0 top-0 right-0 bottom-0 bg-slate-300 opacity-60"></div>
                        </div>
                        <div class="h-14 pl-5">
                            <p class="leading-14">{{ $item->name }}</p>
                        </div>
                    </div>
                @endforeach
            </div>
            <a href="{{ route('design.index') }}" class="block no-underline h-9 w-48 bg-primary rounded-2xl mt-7 mx-auto text-white text-center leading-9 hover:shadow-lg shadow-primary/50">Lihat Desain Lainnya</a>
        </div>

        {{-- Testimoni --}}
        <div id="testimoni" class="flex flex-col items-center lg:flex-row">
            <div class="w-3/4 bg-primary rounded-2xl text-white pl-7 py-7 pr-3 lg:w-1/3 lg:rounded-r-2xl lg:rounded-l-none lg:pr-20 lg:relative lg:z-10">
                <h1 class="text-2xl">Apa kata mereka?</h1>
                <br>
                <p>weddingnyong berkomitmen memberikan pelayanan dan kualitas terbaik.</p>
                <br>
                <p>Kami sangat senang menjadi bagian dari hari bahagia kamu.</p>
                <br>
                <p>Terima kasih kami ucapkan telah memberikan kepercayaan kepada Weddingnyong</p>
            </div>

            <div class="w-3/4 overflow-scroll mt-7 -ml-6 bg-transparent lg:w-2/3 lg:mt-0 lg:-translate-x-16 lg:relative lg:z-20 xl:-translate-x-20">
                <div id="my-slider" class="flex justify-start ease-in duration-300 lg:my-7">
                    @for ($i = 0; $i < 5; $i++)
                        <div class="my-slides flex flex-col shrink-0 justify-between w-full h-64 shadow-md rounded-md bg-white border-2 mx-6 md:shadow-xl p-5 lg:w-96">
                            <i class="fas fa-quote-right text-2xl"></i>
                            <p>{{ $i }}Terima kasih weddingnyong 
                                sudah memberikan pelayanan terbaik. 
                                Kualitas undangannya juga saya pikir yang terbaik saat ini. 
                                Fitur-fitur pendukung lain juga sangat membantu kami.  
                            </p>
                            <p>- Ucup -</p>
                        </div>
                    @endfor
                </div>
            </div>


            <div class="mt-7">
                <i class="far fa-arrow-alt-circle-left text-3xl" id="pref-testi" onclick="plusDivs(-1)"></i>
                <i class="far fa-arrow-alt-circle-right text-3xl" id="next-testi" onclick="plusDivs(1)"></i>
            </div>
        </div>

        {{-- Footer --}}
        <x-footer></x-footer>
    </div>
    <script src="js/home/script.js"></script>
</body>
</html>