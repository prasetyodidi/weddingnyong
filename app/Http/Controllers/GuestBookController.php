<?php

namespace App\Http\Controllers;

use App\Models\Guest_book;
use App\Models\Invitation;
use App\Http\Requests\UpdateGuest_bookRequest;
use App\Mail\ExampleMailables;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;

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

        // $request->validate([
        //     'invitation_id' => 'required',
        //     'name' => ['required'],
        //     'message' => ['required'],
        //     'confirmation' => ['required', 'boolean']
        // ]);

        $validator = Validator::make($request->all(), [
            'invitation_id' => 'required',
            'name' => ['required'],
            'message' => ['required'],
            'confirmation' => ['required', 'boolean']
        ]);

        if ($validator->fails()) {
            return redirect(route('invitation.show', $invitation))
                ->withErrors($validator)
                ->withInput();
        }

        $data = $validator->validated();


        $data = [
            'invitation_id' => $request->invitation_id,
            'name' => $request->name,
            'message' => $request->message,
            'confirmation' => $request->confirmation
        ];

        Guest_book::create($data);


        // check user allow to get rsva email
        $invitationOwner = User::getUserByInvitationId($data['invitation_id']);
        if ($invitationOwner['rsvp_email']) {
            Mail::to($invitationOwner['email'])->send(new ExampleMailables($data['name'], $data['message'], $data['confirmation']));
        }

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
