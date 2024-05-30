<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Member;
use App\Models\Division;
use Illuminate\Http\Request;

class MemberController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = Member::all();
        $menu = "List";

        return view('pages.members.index', compact('data', 'menu'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $coordinators = (new Member())->coordinators;
        $users = User::all();
        $divisions = Division::all();
        $menu = "Create";

        return view('pages.members.create', compact('users', 'divisions', 'coordinators', 'menu'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $rules = [
            'user_id'         => 'required',
            'divisi_id'         => 'required',
            'coordinator'         => 'required',
        ];

        $request->validate($rules);

        Member::create([
            'user_id'         => $request->user_id,
            'divisi_id'         => $request->divisi_id,
            'coordinator'         => $request->coordinator,
        ]);

        return redirect()->route('members.index')->with('success', 'Add Success');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        return redirect()->route('members.index');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $data = Member::findOrFail($id);
        $coordinators = (new Member())->coordinators;
        $users = User::all();
        $divisions = Division::all();
        $menu = "Edit";

        return view('pages.members.edit', compact('data', 'users', 'divisions', 'coordinators', 'menu'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $data = Member::findOrFail($id);

        $rules = [
            'user_id'         => 'required',
            'divisi_id'         => 'required',
            'coordinator'         => 'required',
        ];

        $request->validate($rules);

        $data->update([
            'user_id'         => $request->user_id,
            'divisi_id'         => $request->divisi_id,
            'coordinator'         => $request->coordinator,
        ]);

        return redirect()->route('members.index')->with('success', 'Edit Success');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $data = Member::findOrFail($id);

        $data->delete();

        return redirect()->route('members.index')->with('success', 'Delete Success');;
    }
}
