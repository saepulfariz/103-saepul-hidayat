<?php

namespace App\Http\Controllers;

use App\Models\Meeting;
use Illuminate\Http\Request;

class MeetingController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = Meeting::all();
        $menu = "List";

        return view('pages.meetings.index', compact('data', 'menu'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $menu = "Create";

        return view('pages.meetings.create', compact('menu'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $rules = [
            'title'         => 'required',
            'date'         => 'required',
            'start_time'         => 'required',
            'end_time'         => 'required',
            'location'         => 'required',
        ];

        $request->validate($rules);

        Meeting::create([
            'title'         => $request->title,
            'date'         => $request->date,
            'start_time'         => $request->start_time,
            'end_time'         => $request->end_time,
            'location'         => $request->location,
            'recapitulation'         => $request->recapitulation,
        ]);

        return redirect()->route('meetings.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        return redirect()->route('meetings.index');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $data = Meeting::findOrFail($id);
        $menu = "Edit";

        return view('pages.meetings.edit', compact('data', 'menu'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $data = Meeting::findOrFail($id);
        $rules = [
            'title'         => 'required',
            'date'         => 'required',
            'start_time'         => 'required',
            'end_time'         => 'required',
            'location'         => 'required',
        ];

        $request->validate($rules);

        $data->update([
            'title'         => $request->title,
            'date'         => $request->date,
            'start_time'         => $request->start_time,
            'end_time'         => $request->end_time,
            'location'         => $request->location,
            'recapitulation'         => $request->recapitulation,
        ]);

        return redirect()->route('meetings.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $data = Meeting::findOrFail($id);

        $data->delete();

        return redirect()->route('meetings.index');
    }
}
