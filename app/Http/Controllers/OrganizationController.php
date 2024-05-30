<?php

namespace App\Http\Controllers;

use App\Models\Organization;
use Illuminate\Http\Request;

class OrganizationController extends Controller
{
    public function index()
    {
        $data = Organization::findOrFail(1);
        $menu = 'Edit';
        return view('pages.organizations.edit', compact('menu', 'data'));
    }

    public function update(Request $request, string $id)
    {
        $data = Organization::findOrFail($id);
        $rules = [
            'name'         => 'required',
            'shortname'         => 'required',
            'year'         => 'required',
        ];

        if ($request->hasFile('logo')) {
            $rules['logo'] = 'required|image|mimes:jpeg,jpg,png|max:2048';
        }

        $request->validate($rules);

        if ($request->hasFile('logo')) {
            $logo = $request->file('logo');
            $logoName = time() . "-" . $logo->hashName();

            if (file_exists(public_path("assets/uploads/organizations/" . $data->logo)) && ($data->logo != 'himasi.png' || $data->logo != 'fasilkom.png' || $data->logo != 'profa.png' || $data->logo != 'unsub.png')) {
                unlink("assets/uploads/organizations/" . $data->logo);
            }

            $logo->move("assets/uploads/organizations/", $logoName);
        } else {
            $logoName = $data->logo;
        }

        $data->update([
            'name'         => $request->name,
            'shortname'         => $request->shortname,
            'year'         => $request->year,
            'visi'         => $request->visi,
            'misi'         => $request->misi,
            'logo'         => $logoName,
            'telephone'         => $request->telephone,
            'email'         => $request->email,
            'instagram'         => $request->instagram,
            'youtube'         => $request->youtube,
            'website'         => $request->website,
            'address'         => $request->address,
            'description'         => $request->description,
        ]);

        return redirect()->route('organizations.index')->with('success', 'Edit Success');
    }
}
