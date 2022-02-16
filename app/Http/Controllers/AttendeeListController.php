<?php

namespace App\Http\Controllers;

use App\Models\Attendee_list;
use App\Http\Requests\StoreAttendee_listRequest;
use App\Http\Requests\UpdateAttendee_listRequest;

class AttendeeListController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
     * @param  \App\Http\Requests\StoreAttendee_listRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreAttendee_listRequest $request)
    {
        //
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
    public function destroy(Attendee_list $attendee_list)
    {
        //
    }
}
