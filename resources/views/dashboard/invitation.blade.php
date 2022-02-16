@extends('dashboard.main')

@section('content')
    <div class="w-full h-full p-3 overflow-hidden">
        <h1 class="text-2xl">Invitations</h1>
        <table class="table-auto w-3/4 mt-9">
            <thead>
                <tr class="bg-primary h-12 text-white">
                    <th class="border-2 w-9">No</th>
                    <th>Slug</th>
                    {{-- <th>Email</th> --}}
                    <th class="border-2">Created</th>
                    <th class="border-2">Package</th>
                    <th class="border-2">Status</th>
                    <th class="border-2">Action</th>
                </tr>
            </thead>
            <tbody>
                @for ($i = 0; $i < count($invitations); $i++)
                    <tr class="hover:bg-yellow-100 h-12">
                        <td class="w-9 text-center">{{ $i+1 }}</td>
                        <td>{{ $invitations[$i]['slug'] }}</td>
                        <td>{{ $invitations[$i]['created_at'] }}</td>
                        {{-- <td>ucupkernz@kelasterbuka.com</td> --}}
                        <td>{{ $invitations[$i]->price->name }}</td>
                        <td>{{ $invitations[$i]['active'] ? 'active' : 'non-active' }}</td>
                        <td class="flex items-center h-12 justify-evenly">
                            <a href="{{ route('invitation.show', $invitations[$i]->slug) }}"><i class="fas fa-eye text-blue-500"></i></a>
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
    </div>
@endsection