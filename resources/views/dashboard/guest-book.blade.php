@extends('dashboard.main')

@section('content')
<div class="w-full h-full p-3 overflow-hidden px-5">
    <h1 class="text-2xl">Buku Tamu</h1>
    <div class="w-full overflow-y-hidden overflow-x-scroll mt-7 bg-transparent lg:w-full lg:mt-0 lg:relative lg:z-20 ">
        <div id="my-slider" class="flex justify-start ease-in duration-300 lg:my-3">
            @foreach ($invitations as $item)
                @if ($item->slug == $invitation->slug)
                    <div class="my-slides group relative flex flex-col shrink-0 justify-between w-20 h-20 mx-5 rounded-md bg-primary opacity-60 text-black text-sm border-primary border-2 border-opacity-20">
                        <h1 href="#" class="h-2/3 text-center px-1">
                            {{ $item->slug }}
                        </h1>
                        <p class="h-1/3 text-center">
                            {{ count($item->guestBooks) }}
                            <form action="{{ route('dashboard.guest_book') }}" method="GET" class="absolute hidden left-0 top-0 right-0 bottom-0 group-hover:flex justify-center bg-gray-400/50">
                                <input type="hidden" name="invitation_slug" value="{{ $item->slug }}">
                                <button type="submit" class="hover:cursor-pointer">
                                    <i class="fas fa-chevron-right"></i>
                                </button>
                            </form>
                        </p>
                    </div>
                @else
                    <div class="my-slides group relative flex flex-col shrink-0 justify-between w-20 h-20 mx-5 rounded-md bg-white opacity-60 text-black text-sm border-primary border-2 border-opacity-20">
                        <h1 href="#" class="h-2/3 text-center px-1">
                            {{ $item->slug }}
                        </h1>
                        <p class="h-1/3 text-center">
                            {{ count($item->guestBooks) }}
                            <form action="{{ route('dashboard.guest_book') }}" method="GET" class="absolute hidden left-0 top-0 right-0 bottom-0 group-hover:flex justify-center bg-primary/50">
                                <input type="hidden" name="invitation_slug" value="{{ $item->slug }}">
                                <button type="submit" class="hover:cursor-pointer">
                                    <i class="fas fa-chevron-right"></i>
                                </button>
                            </form>
                        </p>
                    </div>
                @endif
            @endforeach
        </div>
    </div>
    <div class="w-11/12">
        <table class="text-left w-full">
            <thead class="bg-black flex text-white w-full">
                <tr class="flex w-full">
                    <th class="border-2 py-4 px-2 w-9">No</th>
                    <th class="border-2 p-4 w-1/5">Invitation</th>
                    <th class="border-2 p-4 w-1/5">Name</th>
                    <th class="border-2 p-4 w-2/6">Message</th>
                    <th class="border-2 p-4 w-1/6">Created</th>
                    <th class="border-2 p-4 w-1/6">Action</th>
                </tr>
            </thead>
            <tbody id="table-guest-book" class="bg-grey-light flex flex-col overflow-y-scroll w-full" style="height: 50vh;">
                @for ($j = 0; $j < count($guestBooks); $j++)
                    <tr class="hover:bg-yellow-100 h-12 flex w-full mb-4">
                        <td class="py-3 px-2 w-9 text-center">{{ $j+1 }}</td>
                        <td class="w-1/5 pl-2 flex items-center">{{ $invitation['slug'] }}</td>
                        <td class="w-1/5 flex items-center pl-5">{{ $guestBooks[$j]->name }}</td>
                        <td class="w-2/6">{{ $guestBooks[$j]->message }}</td>
                        <td class="w-1/6 flex items-center pl-5">{{ $guestBooks[$j]->created_at->diffForHumans() }}</td>
                        <td class="flex w-1/6 items-center h-12 justify-evenly">
                            <a href="/invitation/{{ $invitations[0]->slug }}" class="hover:cursor-pointer">
                                <i class="fas fa-eye text-blue-500"></i>
                            </a>
                            <a href="#" class="hover:cursor-pointer">
                                <i class="fas fa-edit text-yellow-500"></i>
                            </a>
                            <form action="{{ route('guest-book.destroy', $guestBooks[$j]) }}" method="POST">
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
            <div id="pagination" class="px-4">
                {{-- {{ $guestBooks->links('pagination::tailwind') }} --}}
            </div>
        </div>
    </div>
</div>
@endsection
