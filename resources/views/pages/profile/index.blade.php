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
                                                <label for="example-text-input" class="form-control-label">Email
                                                    address</label>
                                                <input class="form-control" name="email" id="email" type="email"
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
                                                <label for="example-text-input" class="form-control-label">Name</label>
                                                <input class="form-control" id="name" name="name" type="text"
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
                                                <label for="example-text-input" class="form-control-label">NPM</label>
                                                <input class="form-control" id="npm" name="npm" type="text"
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
                                                <label for="example-text-input" class="form-control-label">Birthday</label>
                                                <input class="form-control" id="birthday" name="birthday"
                                                    type="date" value="{{ $user->birthday }}">
                                            </div>

                                            @error('birthday')
                                                <p class="text-danger">
                                                    {{ $message }}
                                                </p>
                                            @enderror
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="example-text-input" class="form-control-label">Foto</label>
                                                <input class="form-control" type="file" id="image" name="image">
                                            </div>

                                            @error('image')
                                                <p class="text-danger">
                                                    {{ $message }}
                                                </p>
                                            @enderror
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="example-text-input" class="form-control-label">Address</label>
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
                        <div class="card card-profile">
                            <img src="assets/img/bg-profile.jpg" alt="Image placeholder" class="card-img-top">
                            <div class="row justify-content-center">
                                <div class="col-4 col-lg-4 order-lg-2">
                                    <div class="mt-n4 mt-lg-n6 mb-4 mb-lg-0">
                                        <a href="javascript:;">
                                            <img src="assets/img/team-2.jpg"
                                                class="rounded-circle img-fluid border border-2 border-white">
                                        </a>
                                    </div>
                                </div>
                            </div>
                            <div class="card-header text-center border-0 pt-0 pt-lg-2 pb-4 pb-lg-3">
                                <div class="d-flex justify-content-between">
                                    <a href="javascript:;" class="btn btn-sm btn-info mb-0 d-none d-lg-block">Connect</a>
                                    <a href="javascript:;" class="btn btn-sm btn-info mb-0 d-block d-lg-none"><i
                                            class="ni ni-collection"></i></a>
                                    <a href="javascript:;"
                                        class="btn btn-sm btn-dark float-right mb-0 d-none d-lg-block">Message</a>
                                    <a href="javascript:;"
                                        class="btn btn-sm btn-dark float-right mb-0 d-block d-lg-none"><i
                                            class="ni ni-email-83"></i></a>
                                </div>
                            </div>
                            <div class="card-body pt-0">
                                <div class="row">
                                    <div class="col">
                                        <div class="d-flex justify-content-center">
                                            <div class="d-grid text-center">
                                                <span class="text-lg font-weight-bolder">22</span>
                                                <span class="text-sm opacity-8">Friends</span>
                                            </div>
                                            <div class="d-grid text-center mx-4">
                                                <span class="text-lg font-weight-bolder">10</span>
                                                <span class="text-sm opacity-8">Photos</span>
                                            </div>
                                            <div class="d-grid text-center">
                                                <span class="text-lg font-weight-bolder">89</span>
                                                <span class="text-sm opacity-8">Comments</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="text-center mt-4">
                                    <h5>
                                        Mark Davis<span class="font-weight-light">, 35</span>
                                    </h5>
                                    <div class="h6 font-weight-300">
                                        <i class="ni location_pin mr-2"></i>Bucharest, Romania
                                    </div>
                                    <div class="h6 mt-4">
                                        <i class="ni business_briefcase-24 mr-2"></i>Solution Manager - Creative Tim
                                        Officer
                                    </div>
                                    <div>
                                        <i class="ni education_hat mr-2"></i>University of Computer Science
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
