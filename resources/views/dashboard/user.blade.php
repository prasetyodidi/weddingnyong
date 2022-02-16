@extends('dashboard.main')

@section('content')
    <div class="w-full h-full p-3 overflow-hidden">
        <h1 class="text-2xl">Users</h1>

        <table class="table-auto w-3/4 mt-9">
            <thead>
                <tr class="bg-primary h-12 text-white">
                    <th class="border-2 w-9">No</th>
                    <th class="border-2">Name</th>
                    <th class="border-2">Email</th>
                    <th class="border-2">Address</th>
                    <th class="border-2">Total invitations</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($users as $user)
                    <tr class="hover:bg-yellow-100 h-12">
                        <td class="w-9 text-center">{{ $loop->iteration }}</td>
                        <td>{{ $user['name'] }}</td>
                        <td>{{ $user['email'] }}</td>
                        <td>{{ $user['address'] ? $user['address'] : 'tidak diketahui' }}</td>
                        <td class="text-center">{{ $user['total_invitations'] }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection