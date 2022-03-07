<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="/css/app.css">
    <title>{{ $invitation->slug }}</title>
</head>
    <style>
        .custom-shape-divider-bottom-1635423095 {
            /* position: absolute;
            bottom: 0;
            left: 0; */
            width: 100%;
            overflow: hidden;
            line-height: 0;
            transform: rotate(180deg);
        }

        .custom-shape-divider-bottom-1635423095 svg {
            /* position: relative; */
            display: block;
            width: calc(100% + 1.3px);
            height: 59px;
            transform: rotateY(180deg);
        }

        .custom-shape-divider-bottom-1635423095 .shape-fill {
            fill: rgb(255, 255, 255);
        }

    </style>
<body>
    <div class="min-h-screen relative mb-48">
        <div class="flex flex-col fixed bottom-0 w-full z-50">
            {{-- icon musik --}}
            <div onClick="togglePlay()" class="flex flex-row-reverse bottom-0 ring-0 mr-5 mb-5 hover:cursor-pointer">
                <audio id="audio" src="/audio/{{ $invitation->audio }}" preload="auto"></audio>
                <div class="w-11 h-11 bg-blue-400 flex justify-center items-center rounded-md">
                    <i id="audio-icon" class="far fa-stop-circle text-white text-3xl"></i>
                </div>
            </div>
            
            {{-- bottom nav bar --}}
            <div class="flex h-20 justify-evenly items-center border-t-gray-300 border-2 bg-white">
                <i class="far fa-clock text-gray-500 text-2xl hover:text-blue-400"></i>
                <i class="fas fa-map-marker-alt text-gray-500 text-2xl hover:text-blue-400"></i>
                <i class="far fa-comment-dots text-gray-500 text-2xl hover:text-blue-400"></i>
            </div>
        </div>

        {{-- beranda --}}
        <div class="flex flex-col h-screen">
            <div class="flex flex-col h-4/5 lg:flex-row">
                <img src="/{{ $invitation->cover_image }}" alt="wedding cover" class="lg:w-4/6">
                <div class="flex flex-col justify-between bg-blue-400 h-3/5 w-full md:h-3/6 lg:w-2/6 lg:h-full">
                    <div class="text-center pt-12 text-white">
                        <p class="text-xl">undangan pernikahan</p>
                        <p class="text-4xl py-3">{{ $invitation->slug }}</p>
                        <p class="text-xl">{{ $invitation->wedding_date }}</p>
                    </div>
                    <div class="custom-shape-divider-bottom-1635423095 lg:hidden">
                        <svg class="h-40 w-full text-black" data-name="Layer 1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1200 120" preserveAspectRatio="none">
                            <path d="M0,0V46.29c47.79,22.2,103.59,32.17,158,28,70.36-5.37,136.33-33.31,206.8-37.5C438.64,32.43,512.34,53.67,583,72.05c69.27,18,138.3,24.88,209.4,13.08,36.15-6,69.85-17.84,104.45-29.34C989.49,25,1113-14.29,1200,52.47V0Z" opacity=".25" class="shape-fill "></path>
                            <path d="M0,0V15.81C13,36.92,27.64,56.86,47.69,72.05,99.41,111.27,165,111,224.58,91.58c31.15-10.15,60.09-26.07,89.67-39.8,40.92-19,84.73-46,130.83-49.67,36.26-2.85,70.9,9.42,98.6,31.56,31.77,25.39,62.32,62,103.63,73,40.44,10.79,81.35-6.69,119.13-24.28s75.16-39,116.92-43.05c59.73-5.85,113.28,22.88,168.9,38.84,30.2,8.66,59,6.17,87.09-7.5,22.43-10.89,48-26.93,60.65-49.24V0Z" opacity=".5" class="shape-fill"></path>
                            <path d="M0,0V5.63C149.93,59,314.09,71.32,475.83,42.57c43-7.64,84.23-20.12,127.61-26.46,59-8.63,112.48,12.24,165.56,35.4C827.93,77.22,886,95.24,951.2,90c86.53-7,172.46-45.71,248.8-84.81V0Z" class="shape-fill"></path>
                        </svg>
                    </div>
                </div>
            </div>
            <div class="custom-shape-divider-bottom-1635423095 hidden lg:block -mt-14">
                <svg class="h-40 w-full text-black" data-name="Layer 1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1200 120" preserveAspectRatio="none">
                    <path d="M0,0V46.29c47.79,22.2,103.59,32.17,158,28,70.36-5.37,136.33-33.31,206.8-37.5C438.64,32.43,512.34,53.67,583,72.05c69.27,18,138.3,24.88,209.4,13.08,36.15-6,69.85-17.84,104.45-29.34C989.49,25,1113-14.29,1200,52.47V0Z" opacity=".25" class="shape-fill "></path>
                    <path d="M0,0V15.81C13,36.92,27.64,56.86,47.69,72.05,99.41,111.27,165,111,224.58,91.58c31.15-10.15,60.09-26.07,89.67-39.8,40.92-19,84.73-46,130.83-49.67,36.26-2.85,70.9,9.42,98.6,31.56,31.77,25.39,62.32,62,103.63,73,40.44,10.79,81.35-6.69,119.13-24.28s75.16-39,116.92-43.05c59.73-5.85,113.28,22.88,168.9,38.84,30.2,8.66,59,6.17,87.09-7.5,22.43-10.89,48-26.93,60.65-49.24V0Z" opacity=".5" class="shape-fill"></path>
                    <path d="M0,0V5.63C149.93,59,314.09,71.32,475.83,42.57c43-7.64,84.23-20.12,127.61-26.46,59-8.63,112.48,12.24,165.56,35.4C827.93,77.22,886,95.24,951.2,90c86.53-7,172.46-45.71,248.8-84.81V0Z" class="shape-fill"></path>
                </svg>
            </div>
        </div>
        
        {{-- couple --}}
        <div class="flex flex-col min-h-screen">
            <h1 class="text-center text-4xl mb-7">mempelai</h1>
            <div class="flex flex-col lg:flex-row lg:justify-around">
                <div class="flex flex-col mb-10">
                    <img class="rounded-full h-60 w-60 flex items-center justify-center border-4 border-blue-300 mx-auto" src="/{{ $invitation->groom_image }}" alt="groom">
                    <p class="text-center text-3xl">{{ $invitation->groom_fullname }}</p>
                    <p class="text-center text-xl">{{ $invitation->groom_info }}</p>
                </div>
                <div class="flex flex-col">
                    <img class="rounded-full h-60 w-60 flex items-center justify-center border-4 border-blue-300 mx-auto" src="/{{ $invitation->bride_image }}" alt="bride">
                    <p class="text-center text-3xl">{{ $invitation->bride_fullname }}</p>
                    <p class="text-center text-xl">{{ $invitation->bride_info }}</p>
                </div>

            </div>
        </div>

        {{-- countdown --}}
        <div class="h-screen md:h-auto md:mb-32">
            <p class="text-5xl mb-40 text-center md:mb-11">menghitung hari</p>
            <div class="w-full md:flex md:justify-around">
                <div class="flex justify-around mb-10 md:w-1/2">
                    <div class="md:inline">
                        <p id="days" class="text-5xl font-bold mb-4"></p>
                        <p class="text-center text-3xl">hari</p>
                    </div>
                    <div class="md:inline">
                        <p id="hours" class="text-5xl font-bold mb-4"></p>
                        <p class="text-center text-3xl">jam</p>
                    </div>
                </div>
                <div class="flex justify-around mb-10 md:w-1/2">
                    <div>
                        <p id="minutes" class="text-5xl font-bold mb-4"></p>
                        <p class="text-center text-3xl">menit</p>
                    </div>
                    <div>
                        <p id="seconds" class="text-5xl font-bold mb-4"></p>
                        <p class="text-center text-3xl">detik</p>
                    </div>
                </div>
            </div>
        </div>

        {{-- event --}}
        <div class="flex flex-col shadow-xl w-11/12 rounded-lg mx-auto border-2">
            {{-- akad --}}
            <div class="flex flex-col items-center mb-7">
                <i class="fas fa-calendar-week text-2xl"></i>
                <p class="text-2xl font-bold">Wedding</p>
                <p class="font-bold">{{ $invitation->wedding_date }}</p>
                <p>{{ $invitation->wedding_time_start }} - {{ $invitation->wedding_time_end }} WIB</p>
                <i class="fas fa-map-marker-alt text-2xl hover:text-blue-400"></i>
                <p class="font-bold">{{ $invitation->wedding_venue }}</p>
                <p class="block w-4/5 text-center text-xs">{{ $invitation->wedding_address }}</p>
            </div>
            
            {{-- reseption --}}
            <div class="flex flex-col items-center">
                <i class="fas fa-calendar-week text-2xl"></i>
                <p class="text-2xl font-bold">Reseption</p>
                <p class="font-bold">{{ $invitation->reception_date }}</p>
                <p>{{ $invitation->reception_time_start }} - {{ $invitation->reception_time_end }} WIB</p>
                <i class="fas fa-map-marker-alt text-2xl hover:text-blue-400"></i>
                <p class="font-bold">{{ $invitation->reception_venue }}</p>
                <p class="block w-4/5 text-center text-xs">{{ $invitation->reception_address }}</p>
            </div>

            {{-- maps --}}
            <div id="google-map" class="h-56 rounded-t-lg md:mt-24 md:h-72">
                <iframe src="{{ $invitation->embed_maps }}" width="100%" height="100%" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
            </div>
        </div>

        {{-- guest book --}}
        <div id="guest-book" class="h-screen p-5 md:mt-32">
            <p class="text-4xl font-bold text-center">Buku Tamu</p>
            <p class="mb-10 text-center">Yuk kirim ucapan, doa serta konfirmasi kehadiran</p>
            <div class="md:flex md:justify-center">
                <div class="w-full md:h-96 md:w-5/12 overflow-scroll mb-10">
                    <div class="flex flex-col">
                    {{-- <div class="flex flex-col-reverse w-full"> --}}
                        @foreach ($invitation->guestBooks as $item)
                            <div class="mb-4 p-4 pt-1 shadow-lg h-36 w-full" id="{{ $item->id }}">
                                <p class="font-bold text-blue-400">{{ $item->name }}</p>
                                <p class="mb-2">{{ $item->created_at->diffForHumans() }}</p>
                                <p>{{ $item->message }}</p>
                                <p>{{ $item->confirmation == 1 ? 'Hadir' : 'Maaf, ngga bisa hadir' }}</p>
                            </div>
                        @endforeach
                    </div>
                </div>
                <div class="md:w-5/12 w-full text-center">
                    <form action="{{ route('guest-book.store') }}" method="POST">
                        @csrf
                        <input type="hidden" name="invitation_id" value="{{ $invitation->id }}">
                        <div class="mb-7">
                            <label for="name" class="block">name</label>
                            <input type="text" name="name" id="name" class="@error('name') border-red-500 @enderror" value="{{ old('name') }}">
                        </div>
                        <div>
                            <label for="message" class="block">message</label>
                            <textarea name="message" id="message" cols="30" rows="5"></textarea>
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
                        <button type="submit" class="px-7 py-2 bg-blue-300 rounded-md text-white hover:bg-blue-500">Kirim</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script>
        let weddingDate = '<?= $invitation->wedding_date ?>'
        let weddingTime = '<?= $invitation->wedding_time_start ?>'
        var countDownDate = new Date(weddingDate + 'T' + weddingTime + 'Z').getTime();
        
        // Update the count down every 1 second
        var x = setInterval(function() {
        
          // Get today's date and time
          var now = new Date().getTime();
            
          // Find the distance between now and the count down date
          var distance = countDownDate - now;
            
          // Time calculations for days, hours, minutes and seconds
          var days = Math.floor(distance / (1000 * 60 * 60 * 24));
          var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
          var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
          var seconds = Math.floor((distance % (1000 * 60)) / 1000);
          
          document.getElementById("days").innerHTML = days;
          document.getElementById("hours").innerHTML = hours;
          document.getElementById("minutes").innerHTML = minutes;
          document.getElementById("seconds").innerHTML = seconds;
            
          // If the count down is over, write some text 
          if (distance < 0) {
            // clearInterval(x);
            document.getElementById("days").innerHTML = '000';
            document.getElementById("hours").innerHTML = '00';
            document.getElementById("minutes").innerHTML = '00';
            document.getElementById("seconds").innerHTML = '00';
          }
        }, 1000);

        var myAudio = document.getElementById("audio");
        var audioIcon = document.getElementById("audio-icon");
        myAudio.loop = true;

        function togglePlay() {
            return myAudio.paused ? audioPlay() : audioPause();
        };

        function audioPlay(){
            myAudio.play();
            audioIcon.classList.remove("fa-play-circle")
            audioIcon.classList.add("fa-stop-circle")
            // audioIcon.src = "/icon/play.svg";
        }

        function audioPause(){
            myAudio.pause();
            audioIcon.classList.add("fa-play-circle")
            audioIcon.classList.remove("fa-stop-circle")
            // audioIcon.src = "/icon/pause.svg";
        }

        // togglePlay();
        audioPause();
        // audioPlay();
    </script>
</body>
</html>