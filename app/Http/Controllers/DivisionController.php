<?php

namespace App\Http\Controllers;

use App\Models\Division;
use Illuminate\Http\Request;

class DivisionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = Division::all();
        $menu = "List";

        return view('pages.divisions.index', compact('data', 'menu'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $menu = "Create";

        return view('pages.divisions.create', compact('menu'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $rules = [
            'name'         => 'required'
        ];

        $request->validate($rules);

        Division::create([
            'name'         => $request->name,
        ]);

        return redirect()->route('divisions.index')->with('success', 'Add Success');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        return redirect()->route('divisions.index');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $data = Division::findOrFail($id);
        $menu = "Edit";

        return view('pages.divisions.edit', compact('data', 'menu'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $data = Division::findOrFail($id);

        $rules = [
            'name'         => 'required'
        ];

        $request->validate($rules);

        $data->update([
            'name'         => $request->name,
        ]);

        return redirect()->route('divisions.index')->with('success', 'Edit Success');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $data = Division::findOrFail($id);

        $data->delete();

        return redirect()->route('divisions.index')->with('success', 'Delete Success');;
    }
}
