<?php

namespace App\Http\Controllers;

use App\Helpers\Helper;
use App\Models\Attendee_list;
use App\Http\Requests\StoreAttendee_listRequest;
use App\Http\Requests\UpdateAttendee_listRequest;
use App\Models\Invitation;
use Illuminate\Http\Request;

class AttendeeListController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('attendee-list.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('attendee-list.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreAttendee_listRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $rules = [
            'invitation_slug' => 'required|max:255',
            'name' => 'required|max:255',
            'address' => 'required|max:255',
        ];
        $invitationSlug = base64_decode($request->invitation_slug);
        $request->validate($rules);
        $invitationId = Invitation::getInvitationIdBySlug($invitationSlug);
        $data = [
            'invitation_id' => $invitationId,
            'name' => $request->name,
            'address' => $request->address,
        ];
        if ($invitationId != -1) {
            Attendee_list::create($data);
            return redirect(route('attendee-list.index'))->with('message', 'your data has been sending!');
        }

        return redirect(route('attendee-list.index'))->with('message', 'your data not valid!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Attendee_list  $attendee_list
     * @return \Illuminate\Http\Response
     */
    public function show(Attendee_list $attendee_list)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Attendee_list  $attendee_list
     * @return \Illuminate\Http\Response
     */
    public function edit(Attendee_list $attendee_list)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateAttendee_listRequest  $request
     * @param  \App\Models\Attendee_list  $attendee_list
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateAttendee_listRequest $request, Attendee_list $attendee_list)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Attendee_list  $attendee_list
     * @return \Illuminate\Http\Response
     */
    public function destroy(Attendee_list $attendeeList)
    {
        Helper::checkOwnerOrAdminAttendeeList($attendeeList);
        $attendeeList->delete();
        return redirect()->back()->with('message', 'data has been deleted');
    }
}
