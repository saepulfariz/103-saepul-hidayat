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
            <div class="row">
                <div class="col-md-5 mb-2">
                    <img class="img-thumbnail" src="{{ asset('assets/img/' . $data['image']) }}" alt="">
                </div>
                <div class="col-md-5">
                    <div class="card mb-4">
                        <div class="card-body  pb-2">

                            <div class="mb-2">
                                <label for="name">Name</label>
                                <input type="text" class="form-control" disabled name="name" id="name"
                                    value="{{ $data['name'] }}">
                            </div>

                            <div class="mb-2">
                                <label for="email">Email</label>
                                <input type="text" class="form-control" disabled name="email" id="email"
                                    value="{{ $data['email'] }}">
                            </div>

                            <div class="mb-2">
                                <label for="role">Role</label>
                                <input type="text" class="form-control" disabled name="role" id="role"
                                    value="{{ $data['role'] }}">
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
@endsection
