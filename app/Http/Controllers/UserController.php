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

        $request->validate([
            // 'image'         => 'required|image|mimes:jpeg,jpg,png|max:2048',
            'name'         => 'required|min:5',
            'username'   => 'required|unique:users,username',
            'email'   => 'required|unique:users,email',
            'password'   => 'required|min:3',
            'role_id'   => 'required',
        ]);

        $user = new User();
        $user->name = $payload['name'];
        $user->username = $payload['username'];
        $user->password = Hash::make($payload['password']);
        $user->role_id = $payload['role_id'];
        $user->email = $payload['email'];
        $user->npm = $payload['npm'];
        // $user->image = $payload['image'];
        $user->telephone = $payload['telephone'];
        $user->birthday = $payload['birthday'];
        $user->address = $payload['address'];
        $user->save();

        return redirect()->route('users.index');
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
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
