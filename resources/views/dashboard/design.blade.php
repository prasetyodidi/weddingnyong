@extends('dashboard.main')

@section('content')
    <div class="w-full h-full p-3 overflow-hidden">
        <h1 class="text-2xl">Invitations</h1>
        <div class="w-3/4">
            <table class="table-auto w-full mt-9">
                <thead>
                    <tr class="bg-primary h-12 text-white">
                        <th class="border-2 w-9">No</th>
                        <th>Slug</th>
                        <th class="border-2">Created</th>
                        <th class="border-2">Name</th>
                        <th class="border-2 px-2">Thumb</th>
                        <th class="border-2 px-2">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @for ($i = 0; $i < count($designs); $i++)
                        <tr class="hover:bg-yellow-100 h-12">
                            <td class="w-9 text-center">{{ $i+1 }}</td>
                            <td class="px-2">{{ $designs[$i]['slug'] }}</td>
                            <td class="px-2">{{ $designs[$i]['created_at'] }}</td>
                            <td class="px-2">{{ $designs[$i]['name'] }}</td>
                            <td>
                                <img class="h-10" src="/{{ $designs[$i]['thumb'] }}" alt="{{ $designs[$i]['name'] }}">
                            </td>
                            <td class="flex items-center h-12 justify-evenly">
                                <a href="{{ route('invitation.show', $designs[$i]->slug) }}"><i class="fas fa-eye text-blue-500"></i></a>
                                <a href="{{ route('invitation.edit', ['invitation' => $designs[$i]]) }}">
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
                    {{ $designs->links('pagination::tailwind') }}
                </div>
            </div>
        </div>
    </div>
@endsection