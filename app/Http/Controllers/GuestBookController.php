<?php

namespace App\Http\Controllers;

use App\Models\Guest_book;
use App\Models\Invitation;
use App\Http\Requests\StoreGuest_bookRequest;
use App\Http\Requests\UpdateGuest_bookRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class GuestBookController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return 'index';
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreGuest_bookRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $invitation = Invitation::where('id', $request->invitation_id)->get()->first();
        if (!isset($invitation)) {
            return "blocked";
        }

        $request->validate([
            'invitation_id' => 'required',
            'name' => ['required'],
            'message' => ['required'],
            'confirmation' => ['required', 'boolean']
        ]);

        $data = [
            'invitation_id' => $request->invitation_id,
            'name' => $request->name,
            'message' => $request->message,
            'confirmation' => $request->confirmation
        ];

        // dd($data);

        Guest_book::create($data);

        return Redirect::back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Guest_book  $guest_book
     * @return \Illuminate\Http\Response
     */
    public function show(Guest_book $guest_book)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Guest_book  $guest_book
     * @return \Illuminate\Http\Response
     */
    public function edit(Guest_book $guest_book)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateGuest_bookRequest  $request
     * @param  \App\Models\Guest_book  $guest_book
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateGuest_bookRequest $request, Guest_book $guest_book)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Guest_book  $guest_book
     * @return \Illuminate\Http\Response
     */
    public function destroy(Guest_book $guest_book)
    {
        //
    }
}
