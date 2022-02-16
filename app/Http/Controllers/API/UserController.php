<?php

namespace App\Http\Controllers\API;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Laravel\Sanctum\PersonalAccessToken;

class UserController extends Controller
{
    public function test(Request $request)
    {
        return response()->json([
            'message' => 'user has verified',
        ], 200);
    }

    public function getAllUser()
    {
        $allUser = User::all();

        return response()->json([
            'message' => 'success',
            'users' => $allUser
        ], 200);
    }

    public function getUserById(Request $request)
    {
        $userById = User::where('id', $request->id)->get();

        return response()->json([
            'message' => 'success',
            'users' => $userById
        ], 200);
    }

    public function delete(Request $request, $id)
    {
        $user = User::where('id', $id)->get();
        // $tokensByUser = PersonalAccessToken::where('tokenable_id', $id)->get();
        // User::where('id', $request->id);

        // delete token
        PersonalAccessToken::where('tokenable_id', $id)->delete();
        // delete invitation
        // delete user
        User::where('id', $id)->delete();

        return response()->json([
            'message' => 'user has been deleted',
            'user' => $user,
            // 'tokens' => $tokensByUser
        ], 200);
    }

    public function update(Request $request)
    {
        $user = $request->user();

        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'address' => ['required', 'string', 'max:255']
        ]);

        $data = [
            'name' => $request->name,
            'address' => $request->address
        ];

        $user->update($data);

        return response()->json([
            'message' => 'user has been updated',
            'user' => $data
        ], 200);
    }
}
