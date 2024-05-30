<?php

namespace App\Http\Controllers;

use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;


class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $users = User::latest('id')->get();
        $menu = "List";

        return view('pages.users.index', compact('users', 'menu'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $roles = Role::all();
        $menu = "Create";

        return view('pages.users.create', compact('roles', 'menu'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $payload = $request->all();

        $rules = [
            'name'         => 'required|min:5',
            'username'   => 'required|unique:users,username',
            'email'   => 'required|unique:App\Models\User,email|email',
            'password'   => 'required|min:3',
            'role_id'   => 'required',
        ];

        if ($request->hasFile('image')) {
            $rules['image'] = 'required|image|mimes:jpeg,jpg,png|max:2048';
        }

        $request->validate($rules);

        $user = new User();
        $user->name = $payload['name'];
        $user->username = $payload['username'];
        $user->password = Hash::make($payload['password']);
        $user->role_id = $payload['role_id'];
        $user->email = $payload['email'];
        $user->npm = $payload['npm'];

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = time() . "-" . $image->hashName();
            $image->move("assets/uploads/users/", $imageName);
            $user->image = $imageName;
        }

        $user->telephone = $payload['telephone'];
        $user->birthday = $payload['birthday'];
        $user->address = $payload['address'];
        $user->save();

        return redirect()->route('users.index')->with('success', 'Add Success');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $data = User::find($id);
        $menu = "Edit";

        return view('pages.users.show', compact('data', 'menu'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $data = User::find($id);
        $roles = Role::all();
        $menu = "Edit";

        return view('pages.users.edit', compact('data', 'roles', 'menu'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {

        $payload = $request->all();
        $user = User::find($id);

        $rules = [
            'name'         => 'required|min:5',
            'role_id'   => 'required',
        ];

        if ($payload['password'] != null) {
            $rules['password'] = 'required|min:3';
            $user->password = Hash::make($payload['password']);
        }

        if ($payload['email'] != $user->email) {
            $rules['email'] = 'required|unique:App\Models\User,email|email';
            $email = $payload['email'];
        } else {
            $email = $user->email;
        }

        if ($payload['username'] != $user->username) {
            $rules['username'] = 'required|unique:users,username';
            $username = $payload['username'];
        } else {
            $username = $user->username;
        }

        if ($request->hasFile('image')) {
            $rules['image'] = 'required|image|mimes:jpeg,jpg,png|max:2048';
        }

        $request->validate($rules);


        $user->name = $payload['name'];
        $user->username = $username;

        $user->role_id = $payload['role_id'];
        $user->email = $email;
        $user->npm = $payload['npm'];

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = time() . "-" . $image->hashName();

            if (file_exists(public_path("assets/uploads/users/" . $user->image)) && $user->image != 'default.jpg') {
                unlink("assets/uploads/users/" . $user->image);
            }

            $image->move("assets/uploads/users/", $imageName);
            $user->image = $imageName;
        }

        $user->telephone = $payload['telephone'];
        $user->birthday = $payload['birthday'];
        $user->address = $payload['address'];
        $user->save();

        return redirect()->route('users.index')->with('success', 'Edit Success');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $user = User::find($id);

        if (file_exists(public_path("assets/uploads/users/" . $user->image)) && $user->image != 'default.jpg') {
            unlink("assets/uploads/users/" . $user->image);
        }

        User::destroy($id);
        return redirect()->route('users.index')->with('success', 'Delete Success');
    }

    public function active($id)
    {
        $data = User::findOrFail($id);

        if ($data['is_active'] == 1) {
            $update_active = 0;
        } else {
            $update_active = 1;
        }

        $data->update([
            'is_active' => $update_active
        ]);
        $status = ($update_active == 1) ? 'Active' : 'Non Active';
        return redirect()->route('users.index')->with('success',  $status . ' Success');
    }
}
