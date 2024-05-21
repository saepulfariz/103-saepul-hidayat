@extends('partials.layouts.app')

@section('title', 'Members - SIMASI')
@section('menu', $menu)

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="row mt-2">
                <div class="col-sm-6"></div>
                <div class="col-sm-6 text-end">
                    <a href="{{ route('members.index') }}" class="btn btn-secondary me-2"><i class="fas fa-arrow-left"></i>
                        BACK</a>
                </div>
            </div>
            <form action="{{ route('members.store') }}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="row">
                    <div class="col-md-5 mb-2">
                        <div class="card">
                            <div class="card-body  pb-2">

                                <div class="mb-2">
                                    <label for="user_id">User</label>
                                    <select class="form-control @error('user_id') is-invalid @enderror" name="user_id"
                                        id="user_id">
                                        @foreach ($users as $d)
                                            <option value="{{ $d['id'] }}">{{ $d['npm'] }} | {{ $d['name'] }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>

                                @error('user_id')
                                    <p class="text-danger">
                                        {{ $message }}
                                    </p>
                                @enderror

                                <div class="mb-2">
                                    <label for="divisi_id">Division</label>
                                    <select class="form-control @error('divisi_id') is-invalid @enderror" name="divisi_id"
                                        id="divisi_id">
                                        @foreach ($divisions as $d)
                                            <option value="{{ $d['id'] }}">{{ $d['name'] }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>

                                @error('divisi_id')
                                    <p class="text-danger">
                                        {{ $message }}
                                    </p>
                                @enderror

                                <div class="mb-2">
                                    <label for="coordinator">Coordinator</label>
                                    <select class="form-control @error('coordinator') is-invalid @enderror"
                                        name="coordinator" id="coordinator">
                                        @foreach ($coordinators as $d)
                                            <option value="{{ $d['id'] }}">{{ $d['name'] }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>

                                @error('coordinator')
                                    <p class="text-danger">
                                        {{ $message }}
                                    </p>
                                @enderror

                                <button type="submit" name="submit" class="btn btn-primary">Submit</button>


                            </div>
                        </div>

                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
