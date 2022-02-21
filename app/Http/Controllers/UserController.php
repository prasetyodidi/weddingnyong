<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function update(Request $request, User $user)
    {
        $rules = [
            'name' => 'required|max:255',
            'address' => 'max:255',
            'profile_image' => 'image|file|max:500',
        ];
        $validateData = $request->validate($rules);
        if ($request->profile_image) {
            $validateData['profile_image'] = $request->file('profile_image')->store('/img/user/profile', ['disk' => 'directly_to_public']);
        }

        $user->update($validateData);

        return redirect()->back()->with(['message' => 'profile has been updated']);
    }
}
