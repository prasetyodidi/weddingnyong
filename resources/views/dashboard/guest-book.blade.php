@extends('dashboard.main')

@section('content')
<div class="w-full h-full p-3 overflow-hidden">
    <h1 class="text-2xl">Buku Tamu</h1>
    <div class="w-full h-24 flex items-center justify-around rounded-md mt-3">
        @foreach ($invitations as $invitation)
        @if ($loop->iteration == 1)
            <div onclick="invitation('{{ $loop->iteration - 1 }}')" class="invitation flex flex-col  w-20 h-20 rounded-md bg-primary opacity-60 text-black text-sm border-primary border-2 border-opacity-20 cursor-pointer">
                <h1 href="#" class="h-2/3 text-center px-1">
                    {{ $invitation->slug }}
                </h1>
                <p class="h-1/3 text-center">
                    Active
                    <i class="fas fa-chevron-right"></i>
                </p>
            </div>
        @else
            <div onclick="invitation('{{ $loop->iteration - 1 }}')" class="invitation flex flex-col  w-20 h-20 rounded-md bg-white opacity-60 text-black text-sm border-primary border-2 border-opacity-20 cursor-pointer">
                <h1 href="#" class="h-2/3 text-center px-1">
                    {{ $invitation->slug }}
                </h1>
                <p class="h-1/3 text-center">
                    Active
                    <i class="fas fa-chevron-right"></i>
                </p>
            </div>
        @endif
            
        @endforeach
    </div>
    <table class="table-auto w-4/5 mt-6">
        <thead>
            <tr class="bg-primary h-12 text-white">
                <th class="border-2 w-9">No</th>
                <th class="border-2">Invitation</th>
                <th class="border-2">Name</th>
                <th class="border-2">Message</th>
                <th class="border-2">Created</th>
                <th class="border-2">Action</th>
            </tr>
        </thead>
        <tbody id="table-guest-book" class="h-auto">
            @for ($j = 0; $j < count($invitations[0]->guestBooks); $j++)
                <tr class="hover:bg-yellow-100 h-12">
                    <td class="w-9 text-center">{{ $j+1 }}</td>
                    <td>{{ $invitations[0]['slug'] }}</td>
                    <td>{{ $invitations[0]->guestBooks[$j]->name }}</td>
                    <td>{{ $invitations[0]->guestBooks[$j]->message }}</td>
                    <td>{{ $invitations[0]->guestBooks[$j]->created_at->diffForHumans() }}</td>
                    <td class="flex items-center h-12 justify-evenly">
                        <a href="/invitation/{{ $invitations[0]->slug }}#{{ $invitations[0]->guestBooks[$j]->id }}" class="hover:cursor-pointer">
                            <i class="fas fa-eye text-blue-500"></i>
                        </a>
                        <a href="#" class="hover:cursor-pointer">
                            <i class="fas fa-edit text-yellow-500"></i>
                        </a>
                        <a href="#" class="hover:cursor-pointer">
                            <i class="fas fa-times text-red-500"></i>
                        </a>
                    </td>
                </tr>
            @endfor 
        </tbody>
    </table>
</div>
@endsection

<script>
    let invitationsJson = '<?= ($invitationsJson); ?>';
    invitationsJson = invitationsJson.replace(/'/g, "\\'").replace(/\n/g, '\\n');
    let invitations = JSON.parse(invitationsJson)
    console.log(invitations);

    function invitation(index) {
        console.log(index);

        // mengubah data table
        let table = document.getElementById('table-guest-book');
        let newElements = [];
        for (let j = 0; j < invitations[index]["guest_book"].length; j++){
            let nomor = j+1;
            let newElement = `<tr class="hover:bg-yellow-100 h-12">
                    <td>` + nomor + `</td>
                    <td>` + invitations[index]["invitation_slug"] + `</td>
                    <td>` + invitations[index]["guest_book"][j]["name"] + `</td>
                    <td>` + invitations[index]["guest_book"][j]["message"] + `</td>
                    <td>` + invitations[index]["guest_book"][j]["created_at"] + `</td>
                    <td class="flex mx-1">
                        <a href="/invitation/`+ invitations[index]["invitation_slug"] + "#" + invitations[index]["guest_book"][j]["id"] + `" class="hover:cursor-pointer">
                            <i class="fas fa-eye text-blue-500"></i>
                        </a>
                        <a href="#" class="hover:cursor-pointer">
                            <i class="fas fa-edit text-yellow-500"></i>
                        </a>
                        <a href="#" class="hover:cursor-pointer">
                            <i class="fas fa-times text-red-500"></i>
                        </a>
                    </td>
                </tr>`;
            newElements = newElements.concat(newElement);
        }
        table.innerHTML = newElements;
        console.log('element');
        console.log(newElements);

        let invitation = invitations[index];
        console.log(invitation);
        let invitationElements = document.getElementsByClassName('invitation')
        for (let i = 0; i < invitationElements.length; i++) {
            const element = invitationElements[i];
            // mengubah tab active
            element.classList.remove('bg-primary');
            element.classList.remove('bg-white');
            if (i == index) {
                element.classList.add('bg-primary');
            } else {
                element.classList.add('bg-white');
            }
        }
    }

</script>