@extends('dashboard.main')

@section('content')
    <div class="w-full h-full p-3 overflow-hidden">
        <h1 class="text-2xl">Invitations</h1>
        <div class="w-3/4 mt-9">
            <table class="table-auto w-full">
                <thead>
                    <tr class="bg-primary h-12 text-white">
                        <th class="border-2 w-9">No</th>
                        <th>Slug</th>
                        <th class="border-2">Created</th>
                        <th class="border-2">Package</th>
                        <th class="border-2">Status</th>
                        <th class="border-2">Invitation</th>
                        <th class="border-2">Attendee List</th>
                        <th class="border-2">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @for ($i = 0; $i < count($invitations); $i++)
                        <tr class="hover:bg-yellow-100 h-12">
                            <td class="w-9 text-center">{{ $i+1 }}</td>
                            <td>{{ $invitations[$i]['slug'] }}</td>
                            <td>{{ $invitations[$i]['created_at'] }}</td>
                            <td>{{ $invitations[$i]->price->name }}</td>
                            <td>{{ $invitations[$i]['active'] ? 'active' : 'non-active' }}</td>
                            <td class="relative group">
                                <img class="mx-auto w-5 h-5" src="/img/invitation/qr-invitation/77QR.webp" alt="invitation QR">
                                <div class="hidden absolute -top-16 -left-16 w-48 h-48 border-2 z-20 bg-primary duration-300 ease-out group-hover:ease-in group-hover:flex rounded-md bg-opacity-40 backdrop-filter backdrop-blur-lg justify-center items-center">
                                    <img class="mx-auto w-28 h-28" src="/img/invitation/qr-invitation/test-qr.webp" alt="invitation QR">
                                </div>
                            </td>
                            <td class="">
                                <img class="w-5 h-5 mx-auto" src="/img/invitation/qr-invitation/test-qr.webp" alt="Attendee List QR">
                            </td>
                            <td class="flex items-center h-12 justify-evenly">
                                <a href="{{ route('invitation.show', $invitations[$i]->slug) }}">
                                    <i class="fas fa-eye text-blue-500"></i>
                                </a>
                                <a href="{{ route('invitation.edit', ['invitation' => $invitations[$i]]) }}">
                                    <i class="fas fa-edit text-yellow-500"></i>
                                </a>
                                <a href="#">
                                    <i class="fas fa-times text-red-500"></i>
                                </a>
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