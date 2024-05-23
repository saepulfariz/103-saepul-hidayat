<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    public function index()
    {
        $user = User::findOrFail(session()->get('userId'));
        $menu = 'List';
        return view('pages.profile.index', compact('menu', 'user'));
    }

    public function update(Request $request)
    {
        $user = User::findOrFail(session()->get('userId'));

        $rules = [
            'name'         => 'required',
            'email'         => 'required',
            'npm'         => 'required',
        ];

        if ($request->email != $user->email) {
            $rules['email'] = 'required|unique:App\Models\User,email|email';
            $email = $request->email;
        } else {
            $email = $user->email;
        }

        if ($request->hasFile('image')) {
            $rules['image'] = 'required|image|mimes:jpeg,jpg,png|max:2048';
        }

        $request->validate($rules);

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = time() . "-" . $image->hashName();

            if (file_exists(public_path("assets/uploads/users/" . $user->image)) && $user->image != 'default.jpg') {
                unlink("assets/uploads/users/" . $user->image);
            }

            $image->move("assets/uploads/users/", $imageName);
        } else {
            $imageName = $user->image;
        }

        $user->update([
            'name'         => $request->name,
            'email'         => $email,
            'npm'         => $request->npm,
            'birthday'         => $request->birthday,
            'address'         => $request->address,
            'image'         => $imageName,
        ]);

        return redirect()->route('profile.index');
    }
}
