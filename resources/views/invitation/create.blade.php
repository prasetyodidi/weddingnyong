<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{mix ('css/app.css')}}">
    <title>Membuat Undangan</title>
</head>
<body>
    <div class="container relative min-h-screen mx-auto overflow-hidden">
        <x-header></x-header>
        <div class="w-full mt-16 lg:mt-20">
            <h1 class="text-3xl">Halaman membuat undangan</h1>
            <p>isi data diri kamu dengan pasangan di sini</p>
        </div>
        <form action="/invitation" method="post" enctype="multipart/form-data" class="container Smt-3">
            @csrf
            <input type="hidden" name="design_slug" value="summer">
            <div class="flex flex-col mb-3">
                <label for="cover_image" class="md:text-lg lg:text-2xl">Foto sampul</label>
                <input type="file" name="cover_image" id="cover-image" onchange="previewCoverImage()" value="{{ old('cover_image', '/img/web/jonathan-borba-vPW1soDETIg-unsplash_compress63.jpg') }}">
                <x-validation-message name="cover_image"/>
                <img id="cover-image-preview" src="{{ old('cover_image', '/img/web/jonathan-borba-vPW1soDETIg-unsplash_compress63.jpg') }} " alt="cover image">
            </div>
            <div class="flex flex-col">
                <p class="text-center md:text-lg lg:text-2xl">Foto mempelai</p>
                <div class="flex flex-col items-center mb-3 md:flex-row md:items-start md:justify-around md:w-full">
                    <div class="flex flex-col w-5/12">
                        <input type="file" name="bride_image" id="bride-image" onchange="previewBrideImage()">
                        <x-validation-message name="bride_image"/>
                        <img id="bride-image-preview" src="/img/web/nathan-dumlao-H_cZqryUuok-unsplash_compress9.jpg" alt="bride image">
                    </div>
                    <div class="flex flex-col w-5/12">
                        <input type="file" name="groom_image" id="groom-image" onchange="previewGroomImage()">
                        <x-validation-message name="groom_image"/>
                        <img id="groom-image-preview" src="/img/web/blake-cheek-R7sKX3PXZ1A-unsplash_compress11.jpg" alt="groom image">
                    </div>
                </div>
            </div>
            <div class="flex flex-col md:flex-row md:justify-around">
                <div class="md:w-5/12">
                    <p class="md:text-center md:text-lg lg:text-2xl">Nama mempelai</p>
                    <div class="flex flex-col justify-between mb-3">
                        <input type="text" name="bride_name" placeholder="wanita" value="{{ old('bride_name') }}">
                        <x-validation-message name="bride_name"/>
                        <input type="text" name="groom_name" placeholder="pria" class="mt-3" value="{{ old('groom_name') }}">
                        <x-validation-message name="groom_name"/>
                    </div>
                </div>
                <div class="md:w-5/12">
                    <p class="md:text-center md:text-lg lg:text-2xl">Nama lengkap mempelai</p>
                    <div class="flex flex-col justify-between mb-3">
                        <input type="text" name="bride_fullname" placeholder="wanita" value="{{ old('bride_fullname') }}">
                        <x-validation-message name="bride_fullname"/>
                        <input type="text" name="groom_fullname" placeholder="pria" class="mt-3" value="{{ old('groom_fullname') }}">
                        <x-validation-message name="groom_fullname"/>
                    </div>
                </div>
            </div>
            <div>
                <p class="text-center md:text-lg lg:text-2xl">Info mempelai</p>
                <div class="flex flex-col justify-between mb-3 lg:flex-row">
                    <div class="flex flex-col lg:w-5/12 mb-3">
                        <textarea name="bride_info" id="bride-info" cols="10" rows="3">{{ old('bride_info', 'putri ke ... dari bapak ... dan ibu ...') }}</textarea>
                        <x-validation-message name="bride_info"/>
                    </div>
                    <div class="flex flex-col lg:w-5/12">
                        <textarea name="groom_info" id="groom-info" cols="10" rows="3">{{ old('groom_info', 'putra ke ... dari bapak ... dan ibu ...') }}</textarea>
                        <x-validation-message name="groom_info"/>
                    </div>
                </div>
            </div>
            <div class="flex flex-col md:flex-row md:justify-around">
                <div>
                    <p class="text-center md:text-lg lg:text-2xl">Tanggal dan waktu akad nikah</p>
                    <div class="flex flex-col justify-between items-center mb-3">
                        <div class="lg:w-5/12">
                            <p class="text-center">tanggal</p>
                            <input type="date" name="wedding_date" value="{{ old('wedding_date') }}">
                            <x-validation-message name="wedding_date"/>
                        </div>
                        <div class="flex justify-between lg:w-5/12">
                            <div>
                                <p class="text-center">dimulai</p>
                                <input type="time" name="wedding_time_start" value="{{ old('wedding_time_start') }}">
                                <x-validation-message name="wedding_time_start"/>
                            </div>
                            <div>
                                <p class="text-center">sampai</p>
                                <input type="time" name="wedding_time_end" value="{{ old('wedding_time_end') }}">
                                <x-validation-message name="wedding_time_end"/>
                            </div>
                        </div>
                    </div>
                </div>
                <div>
                    <p class="text-center md:text-lg lg:text-2xl">Tanggal dan waktu resepsi</p>
                    <div class="flex flex-col justify-between items-center mb-3">
                        <div class="lg:w-5/12">
                            <p class="text-center">tanggal</p>
                            <input type="date" name="reception_date" value="{{ old('reception_date') }}">
                            <x-validation-message name="reception_date"/>
                        </div>
                        <div class="flex justify-between lg:w-5/12">
                            <div>
                                <p class="text-center">dimulai</p>
                                <input type="time" name="reception_time_start" value="{{ old('reception_time_start') }}">
                                <x-validation-message name="reception_time_start"/>
                            </div>
                            <div>
                                <p class="text-center">sampai</p>
                                <input type="time" name="reception_time_end" value="{{ old('reception_time_end') }}">
                                <x-validation-message name="reception_time_end"/>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="flex flex-col mb-3 md:flex-row md:justify-around">
                <div>
                    <div>
                        <p class="md:text-lg lg:text-2xl">Alamat Akad Nikah</p>
                        <input type="text" name="wedding_address" placeholder="Jl. Jenderal Soedirman" value="{{ old('wedding_address') }}">
                        <x-validation-message name="wedding_address"/>
                    </div>
                    <div>
                        <p class="md:text-lg lg:text-2xl">Alamat Acara Resepsi</p>
                        <input type="text" name="reception_address" placeholder="Jl. Jenderal Soedirman" value="{{ old('reception_address') }}">
                        <x-validation-message name="reception_address"/>
                    </div>
                </div>
                <div>
                    <div>
                        <p class="md:text-lg lg:text-2xl">Tempat Akad Nikah</p>
                        <input type="text" name="wedding_venue" placeholder="Gelora Bung Karno" value="{{ old('wedding_venue') }}">
                        <x-validation-message name="wedding_venue"/>
                    </div>
                    <div>
                        <p class="md:text-lg lg:text-2xl">Tempat Acara Resepsi</p>
                        <input type="text" name="reception_venue" placeholder="Gelora Bung Karno" value="{{ old('reception_venue') }}">
                        <x-validation-message name="reception_venue"/>
                    </div>
                </div>
                
            </div class="flex flex-col mb-3 md:flex-row md:justify-around">
            <div class="flex flex-col items-center justify-evenly md:flex-row">
                <div class="mb-3">
                    <p class="md:text-lg lg:text-2xl">Embed maps</p>
                    <textarea name="embed_maps" id="embed-maps" cols="30" rows="3">{{ old('embed_maps') }}</textarea>
                    <x-validation-message name="embed_maps"/>
                </div>
                <div class="flex flex-col items-center">
                    <h1>Desain</h1>
                    @if (isset($design))
                        <input type="hidden" name="design_id" id="designId" value="{{ $design['id'] }}">
                        <p>{{ $design->name }}</p>
                        <img id="thumbDesign" src="/{{ $design['thumb'] }}" alt="{{ $design['name'] }}">
                    @else
                        <input type="hidden" name="design_id" id="designId" value="{{ $designs[0]['id'] }}">
                        <p>{{ $designs[0]->name }}</p>
                        <img id="thumbDesign" src="/{{ $designs[0]['thumb'] }}" alt="{{ $designs[0]['name'] }}">
                    @endif
                    <button type="button" onclick="toggleModal('chooseDesign', true)" class="h-7 w-32 rounded-md bg-yellow-300 text-white">Pilih Design</button>
                </div>
            </div>

            {{-- Modal  --}}
            <div id="chooseDesign" class="fixed hidden left-0 right-0 top-0 bottom-0 duration-300 ease-in">
            {{-- <div id="chooseDesign" class="fixed hidden left-0 right-0 top-0 bottom-0"> --}}
                <div class="flex relative justify-center w-screen h-screen bg-gray-500 bg-opacity-75 px-5">
                    <div class="flex flex-col h-3/4 w-96 overflow-x-hidden absolute rounded-lg bg-white shadow-md px-5 py-7 mt-7 mx-3 md:w-2/3">
                        <div class="flex justify-between">
                            <h1 class="text-2xl">Pilih Desain</h1>
                            <div onclick="toggleModal('chooseDesign', false)" class="flex justify-center items-center px-2 group hover:bg-slate-100 rounded-md hover:cursor-pointer">
                                <i class="fas fa-times text-2xl text-gray-500 group-hover:text-black"></i>
                            </div>
                        </div>
                        <hr>
                        <div id="my-slider" class=" h-5/6 w-auto grid grid-rows-1 grid-flow-col duration-300 ease-in">
                        {{-- <div class="overflow-y-auto bg-green-200 h-5/6 grid grid-rows-1 md:grid-cols-2 md:gap-5 lg:grid-cols-3 lg:gap-7"> --}}
                            @foreach ($designs as $item)
                                <div class="my-slides flex flex-col w-96 border-2 rounded-md hover:cursor-pointer overflow-hidden">
                                    <div class="relative group overflow-hidden">
                                        <img class="w-full group-hover:rotate-12 group-hover:scale-110 ease-in duration-200" src="/{{ $item->thumb }}" alt="thumb design">
                                        <div class="absolute hidden group-hover:block left-0 top-0 right-0 bottom-0 bg-slate-300 opacity-60"></div>
                                    </div>
                                    <div class="h-14 leading-14 flex justify-around items-center">
                                        <p class="border-2 leading-14">{{ $item->name }}</p>
                                        <button  onclick="chooseDesign('{{ $item->id }}', '/{{ $item->thumb }}')" type="button" class="block rounded-md bg-primary text-white w-16 h-7 md:w-24 md:h-8 md:text-lg lg:text-2xl">Pilih</button>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                        <div class="flex flex-row justify-between h-16 items-center">
                            <i class="fas fa-angle-double-left" onclick="plusDivs(-1)"></i>
                            {{-- <button>Pilih</button> --}}
                            <i class="fas fa-angle-double-right" onclick="plusDivs(1)"></i>
                        </div>
                    </div>
                </div>
            </div>

            <button type="submit" class="block rounded-md mx-auto bg-primary text-white w-16 md:w-24 md:h-8 md:text-lg lg:text-2xl">Create</button>
        </form>
    </div>

    {{-- footer --}}
    <x-footer></x-footer>
    <script src="/js/home/script.js"></script>
    <script>
        function chooseDesign(paramDesignId, paramDesignThumb) {
            console.log("design id " + paramDesignId);
            let designId = document.getElementById('designId')
            let thumbDesign = document.getElementById('thumbDesign')
            
            designId.value = paramDesignId
            console.log("designId " + designId.value);
            thumbDesign.src = paramDesignThumb

            toggleModal('chooseDesign', false)
        }

        function toggleModal(id, state) {
            if (state == true) {
                showModal(id)
            }else {
                hideModal(id)
            }
        }

        function showModal(id) {
            console.log(id);
            let element = document.getElementById(id)
            element.classList.remove('hidden')
            element.classList.add('block')
        }
        function hideModal(id) {
            console.log(id);
            let element = document.getElementById(id)
            element.classList.remove('block')
            element.classList.add('hidden')
        }

        document.getElementById("menu").addEventListener("click", function () {
            console.log("click");
            document.getElementById("mobile-nav").classList.remove("translate-x-full");
        })
            
        document.getElementById("close-menu").addEventListener("click", function () {
            document.getElementById("mobile-nav").classList.add("translate-x-full");
        })

        function previewCoverImage() {
            const image = document.getElementById('cover-image');
            const imgPreview = document.getElementById('cover-image-preview');

            const oFReader = new FileReader();
            oFReader.readAsDataURL(image.files[0]);

            oFReader.onload = function (oFREvent) {
                imgPreview.src = oFREvent.target.result;
            }
        }
        function previewBrideImage() {
            const image = document.getElementById('bride-image');
            const imgPreview = document.getElementById('bride-image-preview');

            const oFReader = new FileReader();
            oFReader.readAsDataURL(image.files[0]);

            oFReader.onload = function (oFREvent) {
                imgPreview.src = oFREvent.target.result;
            }
        }
        function previewGroomImage() {
            const image = document.getElementById('groom-image');
            const imgPreview = document.getElementById('groom-image-preview');

            const oFReader = new FileReader();
            oFReader.readAsDataURL(image.files[0]);

            oFReader.onload = function (oFREvent) {
                imgPreview.src = oFREvent.target.result;
            }
        }

    </script>
</body>
</html>