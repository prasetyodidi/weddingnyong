@extends('dashboard.main')

@section('content')
    <div class="w-full h-full p-3 overflow-hidden">
        <h1 class="text-2xl">Invitations</h1>
        <div class="mt-9 w-11/12">
            @if (session('message'))
                <div class="w-1/2 m-auto flex items-center justify-center h-11 bg-green-400 bg-opacity-50 rounded-md ">
                    <p class="text-center text-black">Data has been deleted</p>
                </div>
            @endif
            <table class="table-auto w-full">
                <thead>
                    <tr class="bg-primary h-12 text-white">
                        <th class="border-2 w-9">No</th>
                        <th class="w-1/4">Slug</th>
                        <th class="border-2 w-1/6">Created</th>
                        <th class="border-2 w-1/12">Package</th>
                        <th class="border-2 w-1/12">Status</th>
                        <th class="border-2 w-1/12">Invitation</th>
                        <th class="border-2 w-1/12">Attendee List</th>
                        <th class="border-2 w-1/6">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @for ($i = 0; $i < count($invitations); $i++)
                        <tr class="hover:bg-yellow-100 h-12">
                            <td class="w-9 text-center">{{ $i+1 }}</td>
                            <td>{{ $invitations[$i]['slug'] }}</td>
                            <td class="text-center">{{ $invitations[$i]['created_at']->diffForHumans() }}</td>
                            <td class="text-center">{{ $invitations[$i]->price->name }}</td>
                            <td class="text-center">{{ $invitations[$i]['active'] ? 'active' : 'non-active' }}</td>
                            <td class="relative group">
                                <img class="mx-auto w-5 h-5" src="/img/invitation/qr-invitation/test-qr.webp" alt="invitation QR">
                                <div class="hidden absolute -top-16 -left-16 w-48 h-48 border-2 z-20 bg-primary duration-300 ease-out group-hover:ease-in group-hover:flex rounded-md bg-opacity-40 backdrop-filter backdrop-blur-lg justify-center items-center">
                                    <img class="mx-auto w-28 h-28" src="https://api.qrserver.com/v1/create-qr-code/?size=112x112&data={{ route('invitation.show', $invitations[$i]) }}" alt="invitation QR">
                                </div>
                            </td>
                            <td class="relative group">
                                <img class="w-5 h-5 mx-auto" src="/img/invitation/qr-invitation/test-qr.webp" alt="Attendee List QR">
                                <div class="hidden absolute -top-16 -left-16 w-48 h-48 border-2 z-20 bg-primary duration-300 ease-out group-hover:ease-in group-hover:flex rounded-md bg-opacity-40 backdrop-filter backdrop-blur-lg justify-center items-center">
                                    <img class="mx-auto w-28 h-28" src="https://api.qrserver.com/v1/create-qr-code/?size=112x112&data={{ route('attendee-list.create', ['nikahan' => base64_encode( $invitations[$i]['slug'] ) ]) }}" alt="invitation QR">
                                </div>
                            </td>
                            <td class="flex items-center h-12 justify-evenly">
                                <a href="{{ route('invitation.show', $invitations[$i]->slug) }}">
                                    <i class="fas fa-eye text-blue-500"></i>
                                </a>
                                <a href="{{ route('invitation.edit', ['invitation' => $invitations[$i]]) }}">
                                    <i class="fas fa-edit text-yellow-500"></i>
                                </a>
                                <form action="{{ route('invitation.destroy', $invitations[$i]) }}" method="POST">
                                    @method('delete')
                                    @csrf
                                    <button type="submit" onclick="return confirm('are you sure?')">
                                        <i class="fas fa-times text-red-500"></i>
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @endfor 
                </tbody>
            </table>
            <div class="flex flex-row-reverse w h-full">
                <div class="px-4">
                    {{ $invitations->links('pagination::tailwind') }}
                </div>
            </div>
        </div>
    </div>
@endsection