@extends('partials.layouts.app')

@section('title', 'Profile - SIMASI')
@section('menu', $menu)

@section('content')
    <div class="row">
        <div class="col-12">

            <div class="card shadow-lg mx-4 ">
                <div class="card-body p-3">
                    <div class="row gx-4">
                        <div class="col-auto">
                            <div class="avatar avatar-xl position-relative">
                                <img src="{{ asset('assets/uploads/users/' . $user['image']) }}" alt="profile_image"
                                    class="w-100 border-radius-lg shadow-sm">
                            </div>
                        </div>
                        <div class="col-auto my-auto">
                            <div class="h-100">
                                <h5 class="mb-1">
                                    {{ $user->name }}
                                </h5>
                                <p class="mb-0 font-weight-bold text-sm">
                                    {{ $user->role->name }}
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="container-fluid py-4">
                <div class="row">
                    <div class="col-md-8">
                        <div class="card">
                            <div class="card-header pb-0">
                                <div class="d-flex align-items-center">
                                    <p class="mb-0">Edit Profile</p>
                                </div>
                            </div>
                            <div class="card-body">
                                <form action="{{ route('profile.update') }}" method="post" enctype="multipart/form-data">
                                    @csrf
                                    @method('PUT')
                                    <p class="text-uppercase text-sm">User Information</p>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="example-text-input" class="form-control-label">Username</label>
                                                <input disabled class="form-control" type="text"
                                                    value="{{ $user->username }}">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="email" class="form-control-label">Email
                                                    address</label>
                                                <input class="form-control @error('email') is-invalid @enderror"
                                                    name="email" id="email" type="email"
                                                    value="{{ $user->email }}">
                                            </div>

                                            @error('email')
                                                <p class="text-danger">
                                                    {{ $message }}
                                                </p>
                                            @enderror

                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="name" class="form-control-label">Name</label>
                                                <input class="form-control @error('name') is-invalid @enderror"
                                                    id="name" name="name" type="text"
                                                    value="{{ $user->name }}">
                                            </div>

                                            @error('name')
                                                <p class="text-danger">
                                                    {{ $message }}
                                                </p>
                                            @enderror
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="npm" class="form-control-label">NPM</label>
                                                <input class="form-control @error('npm') is-invalid @enderror"
                                                    id="npm" name="npm" type="text"
                                                    value="{{ $user->npm }}">
                                            </div>

                                            @error('npm')
                                                <p class="text-danger">
                                                    {{ $message }}
                                                </p>
                                            @enderror
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="birthday" class="form-control-label">Birthday</label>
                                                <input class="form-control" id="birthday" name="birthday" type="date"
                                                    value="{{ $user->birthday }}">
                                            </div>

                                            @error('birthday')
                                                <p class="text-danger">
                                                    {{ $message }}
                                                </p>
                                            @enderror
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="image" class="form-control-label">Foto</label>
                                                <input class="form-control @error('image') is-invalid @enderror"
                                                    type="file" id="image" name="image">
                                            </div>

                                            @error('image')
                                                <p class="text-danger">
                                                    {{ $message }}
                                                </p>
                                            @enderror
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="address" class="form-control-label">Address</label>
                                                <textarea class="form-control" name="address" id="address" cols="30" rows="5">{{ $user->address }}</textarea>

                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col text-end">
                                            <button type="submit" class="btn btn-primary">Change</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="card">
                            <div class="card-header pb-0">
                                <div class="d-flex align-items-center">
                                    <p class="mb-0">Change Password</p>
                                </div>
                            </div>
                            <div class="card-body">
                                <form action="{{ route('profile.change_password') }}" method="post"
                                    enctype="multipart/form-data">
                                    @csrf
                                    @method('PUT')
                                    <div class="row">
                                        <div class="col">
                                            <div class="form-group">
                                                <label for="password_old" class="form-control-label">Password
                                                    Current</label>
                                                <input class="form-control @error('password_old') is-invalid @enderror"
                                                    id="password_old" name="password_old" type="password">
                                            </div>

                                            @error('password_old')
                                                <p class="text-danger">
                                                    {{ $message }}
                                                </p>
                                            @enderror

                                            <div class="form-group">
                                                <label for="password" class="form-control-label">Password
                                                    New</label>
                                                <input class="form-control @error('password') is-invalid @enderror"
                                                    id="password" name="password" type="password">
                                            </div>

                                            @error('password')
                                                <p class="text-danger">
                                                    {{ $message }}
                                                </p>
                                            @enderror

                                            <div class="form-group">
                                                <label for="password_confirmation" class="form-control-label">Password
                                                    Confirmation</label>
                                                <input
                                                    class="form-control @error('password_confirmation') is-invalid @enderror"
                                                    id="password_confirmation" name="password_confirmation"
                                                    type="password">
                                            </div>

                                            @error('password_confirmation')
                                                <p class="text-danger">
                                                    {{ $message }}
                                                </p>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col text-end">
                                            <button type="submit" class="btn btn-primary">Submit</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
