@extends('partials.layouts.app')

@section('title', 'Profile')
@section('menu', $menu)

@section('content')
    <div class="row">
        <div class="col-12">

            <div class="card shadow-lg mx-4 ">
                <div class="card-body p-3">
                    <div class="row gx-4">
                        <div class="col-auto">
                            <div class="avatar avatar-xl position-relative">
                                <img src="{{ asset('assets/uploads/organizations/' . $data['logo']) }}" alt="profile_image"
                                    class="w-100 border-radius-lg shadow-sm">
                            </div>
                        </div>
                        <div class="col-auto my-auto">
                            <div class="h-100">
                                <h5 class="mb-1">
                                    {{ $data->name }}
                                </h5>
                                <p class="mb-0 font-weight-bold text-sm">
                                    {{ $data->shortname }}
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
                                    <p class="mb-0">Edit Organization</p>
                                </div>
                            </div>
                            <div class="card-body">
                                <form action="{{ route('organizations.update', $data['id']) }}" method="post"
                                    enctype="multipart/form-data">
                                    @csrf
                                    @method('PUT')
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="name" class="form-control-label">Name
                                                </label>
                                                <input class="form-control @error('name') is-invalid @enderror"
                                                    name="name" id="name" type="text"
                                                    value="{{ old('name', $data->name) }}">
                                            </div>

                                            @error('email')
                                                <p class="text-danger">
                                                    {{ $message }}
                                                </p>
                                            @enderror

                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="shortname" class="form-control-label">Shortname</label>
                                                <input class="form-control @error('shortname') is-invalid @enderror"
                                                    name="shortname" id="shortname" type="text"
                                                    value="{{ old('shortname', $data->shortname) }}">
                                            </div>

                                            @error('shortname')
                                                <p class="text-danger">
                                                    {{ $message }}
                                                </p>
                                            @enderror

                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="visi" class="form-control-label">Visi</label>
                                                <textarea class="form-control" name="visi" id="visi" cols="30" rows="2">{{ old('visi', $data->visi) }}</textarea>

                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="misi" class="form-control-label">Misi</label>
                                                <textarea class="form-control" name="misi" id="misi" cols="30" rows="2">{{ old('misi', $data->misi) }}</textarea>

                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="year" class="form-control-label">Year
                                                </label>
                                                <input class="form-control @error('year') is-invalid @enderror"
                                                    name="year" id="year" type="text"
                                                    value="{{ old('year', $data->year) }}">
                                            </div>

                                            @error('year')
                                                <p class="text-danger">
                                                    {{ $message }}
                                                </p>
                                            @enderror

                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="logo" class="form-control-label">Logo</label>
                                                <input class="form-control @error('logo') is-invalid @enderror"
                                                    type="file" id="logo" name="logo">
                                            </div>

                                            @error('logo')
                                                <p class="text-danger">
                                                    {{ $message }}
                                                </p>
                                            @enderror
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="telephone" class="form-control-label">Telephone
                                                </label>
                                                <input class="form-control @error('telephone') is-invalid @enderror"
                                                    name="telephone" id="telephone" type="text"
                                                    value="{{ old('telephone', $data->telephone) }}">
                                            </div>

                                            @error('telephone')
                                                <p class="text-danger">
                                                    {{ $message }}
                                                </p>
                                            @enderror

                                        </div>

                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="email" class="form-control-label">Email
                                                    address</label>
                                                <input class="form-control @error('email') is-invalid @enderror"
                                                    name="email" id="email" type="email"
                                                    value="{{ old('email', $data->email) }}">
                                            </div>

                                            @error('email')
                                                <p class="text-danger">
                                                    {{ $message }}
                                                </p>
                                            @enderror

                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="instagram" class="form-control-label">Instagram
                                                </label>
                                                <input class="form-control @error('instagram') is-invalid @enderror"
                                                    name="instagram" id="instagram" type="text"
                                                    value="{{ old('instagram', $data->instagram) }}">
                                            </div>

                                            @error('instagram')
                                                <p class="text-danger">
                                                    {{ $message }}
                                                </p>
                                            @enderror

                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="youtube" class="form-control-label">Youtube
                                                </label>
                                                <input class="form-control @error('youtube') is-invalid @enderror"
                                                    name="youtube" id="youtube" type="text"
                                                    value="{{ old('youtube', $data->youtube) }}">
                                            </div>

                                            @error('youtube')
                                                <p class="text-danger">
                                                    {{ $message }}
                                                </p>
                                            @enderror

                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="website" class="form-control-label">Website
                                                </label>
                                                <input class="form-control @error('website') is-invalid @enderror"
                                                    name="website" id="website" type="text"
                                                    value="{{ old('website', $data->website) }}">
                                            </div>

                                            @error('website')
                                                <p class="text-danger">
                                                    {{ $message }}
                                                </p>
                                            @enderror

                                        </div>
                                        <div class="col-md-6">
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="address" class="form-control-label">Address</label>
                                                <textarea class="form-control" name="address" id="address" cols="30" rows="5">{{ old('address', $data->address) }}</textarea>

                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="descriptions" class="form-control-label">Descriptions</label>
                                                <textarea class="form-control" name="descriptions" id="descriptions" cols="30" rows="5">{{ old('description', $data->descriptions) }}</textarea>

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
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
