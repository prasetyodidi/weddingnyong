@extends('dashboard.main')

@section('content')
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
                                <textarea name="address" id="address" cols="30" rows="10">{{ old('address', $user->address)  }}</textarea>
                                <x-validation-message name="address"/>
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