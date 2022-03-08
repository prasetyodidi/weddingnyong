@extends('dashboard.main')

@section('content')
<style>
    .toggle-checkbox:checked {
    @apply: right-0 border-green-400;
    right: 0;
    border-color: #68D391;
    }
    .toggle-checkbox:checked + .toggle-label {
    @apply: bg-green-400;
    background-color: #68D391;
    }
    </style>
    <div class="w-full h-full p-3 overflow-hidden">
        <h1 class="text-2xl">Profile</h1>

        <div class="">
            <form action="{{ route('user.update', $user) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('put')
                <div class="">
                    <img id="profile-image-preview" class="w-16 h-16 rounded-full border-2" src="/{{ $user->profile_image }}" alt="profile image anda">
                    <input onchange="previewProfileImage()" type="file" name="profile_image" id="profile-image">
                    <x-validation-message name="profile_image"/>
                </div>
                <table>
                    <tbody>
                        <tr>
                            <td class="">Nama</td>
                            <td>
                                <input type="text" name="name" value="{{ old('name', $user->name) }}" placeholder="nama">
                                <x-validation-message name="name"/>
                            </td>
                        </tr>
                        <tr>
                            <td>Alamat</td>
                            <td>
                                <textarea name="address" id="address" cols="30" rows="3">{{ old('address', $user->address)  }}</textarea>
                                <x-validation-message name="address"/>
                            </td>
                        </tr>
                        <tr>
                            <td>Kirim konfirmasi RSVP ke email? </td>
                            <td>
                                @if ($user->rsvp_email)
                                    <div class="relative inline-block w-10 mr-2 align-middle select-none transition duration-200 ease-in">
                                        <input type="checkbox" name="toggle" id="toggle" class="toggle-checkbox absolute block w-6 h-6 rounded-full bg-white border-4 appearance-none cursor-pointer"/>
                                        <label for="toggle" class="toggle-label block overflow-hidden h-6 rounded-full bg-gray-300 cursor-pointer"></label>
                                    </div>
                                @else
                                    <div class="relative inline-block w-10 mr-2 align-middle select-none transition duration-200 ease-in">
                                        <input name="rsvp_email" checked type="checkbox" name="toggle" id="toggle" class="toggle-checkbox absolute block w-6 h-6 rounded-full bg-white border-4 appearance-none cursor-pointer"/>
                                        <label name="rsvp_email" for="toggle" class="toggle-label block overflow-hidden h-6 rounded-full bg-gray-300 cursor-pointer"></label>
                                    </div>
                                @endif
                                {{-- <label for="toggle" class="text-xs text-gray-700">Toggle me.</label> --}}
                            </td>
                        </tr>
                    </tbody>
                </table>
                <button type="submit" class="px-5 text-white mt-7 bg-blue-500 rounded-md hover:bg-blue-400 hover:shadow-md">Simpan</button>
            </form>
        </div>
    </div>

    <script>
        function previewProfileImage() {
            const image = document.getElementById('profile-image');
            const imgPreview = document.getElementById('profile-image-preview');

            const oFReader = new FileReader();
            oFReader.readAsDataURL(image.files[0]);

            oFReader.onload = function (oFREvent) {
                imgPreview.src = oFREvent.target.result;
            }
        }
    </script>
@endsection