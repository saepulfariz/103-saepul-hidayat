@extends('partials.layouts.app')

@section('title', 'Users - SIMASI')
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
            <form action="{{ route('users.store') }}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="row">
                    <div class="col-md-5 mb-2">
                        <div class="card">
                            <div class="card-body  pb-2">

                                <div class="mb-2">
                                    <label for="name">Name</label>
                                    <input type="text" class="form-control @error('name') is-invalid @enderror"
                                        name="name" id="name" value="{{ old('name') }}">
                                </div>

                                @error('name')
                                    <p class="text-danger">
                                        {{ $message }}
                                    </p>
                                @enderror

                                <div class="mb-2">
                                    <label for="username">Username</label>
                                    <input type="text" class="form-control @error('username') is-invalid @enderror"
                                        name="username" id="username" value="{{ old('username') }}">
                                </div>

                                @error('username')
                                    <p class="text-danger">
                                        {{ $message }}
                                    </p>
                                @enderror

                                <div class="mb-2">
                                    <label for="password">Password</label>
                                    <input type="password" class="form-control @error('password') is-invalid @enderror"
                                        name="password" id="password">
                                </div>

                                @error('password')
                                    <p class="text-danger">
                                        {{ $message }}
                                    </p>
                                @enderror

                                <div class="mb-2">
                                    <label for="role_id">Role</label>
                                    <select class="form-control @error('role_id') is-invalid @enderror" name="role_id"
                                        id="role_id">
                                        @foreach ($roles as $role)
                                            <option value="{{ $role->id }}">{{ $role->name }}</option>
                                        @endforeach
                                    </select>
                                </div>

                                @error('role_id')
                                    <p class="text-danger">
                                        {{ $message }}
                                    </p>
                                @enderror

                                <div class="mb-2">
                                    <label for="email">Email</label>
                                    <input type="text" class="form-control @error('email') is-invalid @enderror"
                                        name="email" id="email" value="{{ old('email') }}">
                                </div>

                                @error('email')
                                    <p class="text-danger">
                                        {{ $message }}
                                    </p>
                                @enderror

                            </div>
                        </div>

                    </div>
                    <div class="col-md-5">
                        <div class="card mb-4">
                            <div class="card-body  pb-2">


                                <div class="mb-2">
                                    <label for="npm">NPM</label>
                                    <input type="text" class="form-control" name="npm" id="npm">
                                </div>

                                <div class="mb-2">
                                    <label for="telephone">Telephone</label>
                                    <input type="text" class="form-control" name="telephone" id="telephone">
                                </div>

                                <div class="mb-2">
                                    <label for="birthday">Birthday</label>
                                    <input type="date" class="form-control" name="birthday" id="birthday">
                                </div>

                                <div class="mb-2">
                                    <label for="image">Image</label>
                                    <input type="file" class="form-control" name="image" id="image">
                                </div>

                                <div class="mb-2">
                                    <label for="address">Address</label>
                                    <textarea name="address" class="form-control" id="address" cols="30" rows="3"></textarea>
                                </div>





                                <button type="submit" name="submit" class="btn btn-primary">Submit</button>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
