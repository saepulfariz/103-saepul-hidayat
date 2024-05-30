<?php

namespace App\Http\Controllers;

use App\Models\Member;
use App\Models\Meeting;
use App\Models\Attendance;
use Illuminate\Http\Request;

class AttendanceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index($id)
    {
        $meeting = Meeting::findOrFail($id);

        $data = Attendance::where('meet_id', $id)->orderBy('id', 'DESC')->get();
        $menu = "List";

        return view('pages.attendances.index', compact('data', 'meeting', 'menu'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create($id)
    {
        $meeting = Meeting::findOrFail($id);
        $members = Member::all();
        $presensis = (new Attendance())->presensis;
        $menu = "Create";

        return view('pages.attendances.create', compact('meeting', 'members', 'presensis', 'menu'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, $id)
    {
        $meeting = Meeting::findOrFail($id);

        $rules = [
            'member_id'         => 'required',
            'presensi'         => 'required',
        ];

        $request->validate($rules);

        Attendance::create([
            'meet_id'         => $id,
            'member_id'         => $request->member_id,
            'presensi'         => $request->presensi,
            'datetime'         => date('Y-m-d H:i:s'),
            'note'         => $request->note,
        ]);

        return redirect()->route('attendances.index', $id)->with('success', 'Add Success');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $data = Attendance::findOrFail($id);
        $meeting = Meeting::findOrFail($data['meet_id']);
        $members = Member::all();
        $presensis = (new Attendance())->presensis;
        $menu = "Edit";

        return view('pages.attendances.edit', compact('data', 'meeting', 'members', 'presensis', 'menu'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $data = Attendance::findOrFail($id);
        $meeting = Meeting::findOrFail($data['meet_id']);

        $rules = [
            // 'member_id'         => 'required',
            'presensi'         => 'required',
        ];

        $request->validate($rules);

        $data->update([
            'meet_id'         => $meeting['id'],
            // 'member_id'         => $request->member_id,
            'presensi'         => $request->presensi,
            'note'         => $request->note,
        ]);

        return redirect()->route('attendances.index', $meeting['id'])->with('success', 'Edit Success');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $data = Attendance::findOrFail($id);
        $meeting = Meeting::findOrFail($data['meet_id']);

        $data->delete();

        return redirect()->route('attendances.index', $meeting['id'])->with('success', 'Delete Success');
    }
}
