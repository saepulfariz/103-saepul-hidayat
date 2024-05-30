@extends('partials.layouts.app')

@section('title', 'Users')
@section('menu', $menu)

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="row mt-2">
                <div class="col-sm-6"></div>
                <div class="col-sm-6 text-end">
                    <a href="{{ route('users.index') }}" class="btn btn-secondary me-2"><i class="fas fa-arrow-left"></i>
                        BACK</a>
                </div>
            </div>
            <div class="row">
                <div class="col-md-4 mb-2">
                    <img class="img-thumbnail" width="100%" src="{{ asset('assets/uploads/users/' . $data['image']) }}"
                        alt="">
                </div>
                <div class="col-md-4 mb-2">
                    <div class="card">
                        <div class="card-body  pb-2">

                            <div class="mb-2">
                                <label for="name">Name</label>
                                <input type="text" class="form-control" disabled name="name" id="name"
                                    value="{{ $data['name'] }}">
                            </div>

                            <div class="mb-2">
                                <label for="username">Username</label>
                                <input type="text" class="form-control" disabled name="username" id="username"
                                    value="{{ $data['username'] }}">
                            </div>

                            <div class="mb-2">
                                <label for="email">Email</label>
                                <input type="text" class="form-control" disabled name="email" id="email"
                                    value="{{ $data['email'] }}">
                            </div>

                            <div class="mb-2">
                                <label for="role">Role</label>
                                <input type="text" class="form-control" disabled name="role" id="role"
                                    value="{{ $data['role']->name }}">
                            </div>
                        </div>
                    </div>

                </div>
                <div class="col-md-4 mb-2">
                    <div class="card">
                        <div class="card-body  pb-2">



                            <div class="mb-2">
                                <label for="npm">NPM</label>
                                <input type="text" class="form-control" disabled name="npm" id="npm"
                                    value="{{ $data['npm'] }}">
                            </div>

                            <div class="mb-2">
                                <label for="birthday">Birthday</label>
                                <input type="text" class="form-control" disabled name="birthday" id="birthday"
                                    value="{{ $data['birthday'] }}">
                            </div>

                            <div class="mb-2">
                                <label for="address">Address</label>

                                <textarea type="text" class="form-control" disabled name="address" id="address">{{ $data['address'] }}</textarea>
                            </div>



                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
@endsection
