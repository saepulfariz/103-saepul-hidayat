<?php

namespace App\Http\Controllers;

use App\Models\Member;
use App\Models\Meeting;
use App\Models\Attendance;
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

        return redirect()->route('meetings.index')->with('success', 'Add Success');
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

        return redirect()->route('meetings.index')->with('success', 'Edit Success');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $data = Meeting::findOrFail($id);

        $data->delete();

        return redirect()->route('meetings.index')->with('success', 'Delete Success');;
    }

    public function report()
    {
        $members = Member::all();
        $meetings = Meeting::all();
        $presensis = (new Attendance)->presensis;
        $report = [];
        $a = 0;
        foreach ($members as $member) {
            $attendances = [];
            foreach ($meetings as $meet) {
                $attendance =  Attendance::where('meet_id', $meet['id'])->where('member_id', $member['id'])->first();
                $attendances[] = [
                    'title' => $meet->title,
                    'tgl' => $meet->date,
                    'presensi' => ($attendance) ? $attendance->presensi : '-',
                ];
            }
            $summary_presensi = [];
            foreach ($presensis as $presensi) {
                $jumlah_presensi = Attendance::selectRaw('COUNT(id) as jumlah')->where('presensi', "$presensi")->where('member_id', $member['id'])->first();
                $jumlah_presensi = ($jumlah_presensi) ? $jumlah_presensi['jumlah'] : 0;
                $summary_presensi[] = [
                    "presensi" => $presensi,
                    "jumlah" => $jumlah_presensi,
                ];
            }
            $report[] = [
                'name' => $member->user->name,
                'attendances' => $attendances,
                'summary_presensi' => $summary_presensi,
            ];
        }
        $data = [
            'data' => $report,
            'menu' => 'Report',
            'meetings' => $meetings,
            'presensis' => $presensis
        ];
        return view('pages.meetings.report', $data);
    }
}
