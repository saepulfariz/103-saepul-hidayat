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
            <form action="" method="post">
                @csrf
                @method('PUT')
                <div class="row">
                    <div class="col-md-5">
                        <div class="card mb-4">
                            <div class="card-body  pb-2">

                                <div class="mb-2">
                                    <label for="name">Name</label>
                                    <input type="text" class="form-control" name="name" id="name"
                                        value="{{ $data['name'] }}">
                                </div>

                                <div class="mb-2">
                                    <label for="email">Email</label>
                                    <input type="text" class="form-control" name="email" id="email"
                                        value="{{ $data['email'] }}">
                                </div>

                                <div class="mb-2">
                                    <label for="name">Image</label>
                                    <img class="d-block img-thumbnail mb-1" width="100px"
                                        src="{{ asset('assets/img/' . $data['image']) }}" alt="">
                                    <input type="file" class="form-control" name="name" id="name">
                                </div>

                                <div class="mb-2">
                                    <label for="role">Role</label>
                                    <select class="form-control" name="role" id="role">
                                        @foreach ($roles as $role)
                                            @if ($role == $data['role'])
                                                <option selected>{{ $role }}</option>
                                            @else
                                                <option>{{ $role }}</option>
                                            @endif
                                        @endforeach
                                    </select>
                                </div>

                                <button type="button" class="btn btn-primary">Submit</button>
                            </div>
                        </div>

                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
