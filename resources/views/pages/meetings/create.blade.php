@extends('partials.layouts.app')

@section('title', 'Meetings')
@section('menu', $menu)

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="row mt-2">
                <div class="col-sm-6"></div>
                <div class="col-sm-6 text-end">
                    <a href="{{ route('meetings.index') }}" class="btn btn-secondary me-2"><i class="fas fa-arrow-left"></i>
                        BACK</a>
                </div>
            </div>
            <form action="{{ route('meetings.store') }}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="row">
                    <div class="col-md-5 mb-2">
                        <div class="card">
                            <div class="card-body  pb-2">

                                <div class="mb-2">
                                    <label for="title">Title</label>
                                    <input type="text" class="form-control @error('title') is-invalid @enderror"
                                        name="title" id="title" value="{{ old('title') }}">
                                </div>

                                @error('title')
                                    <p class="text-danger">
                                        {{ $message }}
                                    </p>
                                @enderror

                                <div class="mb-2">
                                    <label for="date">Date</label>
                                    <input type="date" class="form-control @error('date') is-invalid @enderror"
                                        name="date" id="date" value="{{ old('date') }}">
                                </div>

                                @error('date')
                                    <p class="text-danger">
                                        {{ $message }}
                                    </p>
                                @enderror

                                <div class="row">
                                    <div class="col-6">
                                        <div class="mb-2">
                                            <label for="start_time">Start Time</label>
                                            <input type="time"
                                                class="form-control @error('start_time') is-invalid @enderror"
                                                name="start_time" id="start_time" value="{{ old('start_time') }}">
                                        </div>

                                        @error('start_time')
                                            <p class="text-danger">
                                                {{ $message }}
                                            </p>
                                        @enderror
                                    </div>

                                    <div class="col-6">
                                        <div class="mb-2">
                                            <label for="end_time">Start Time</label>
                                            <input type="time"
                                                class="form-control @error('end_time') is-invalid @enderror" name="end_time"
                                                id="end_time" value="{{ old('end_time') }}">
                                        </div>

                                        @error('end_time')
                                            <p class="text-danger">
                                                {{ $message }}
                                            </p>
                                        @enderror
                                    </div>
                                </div>

                                <div class="mb-2">
                                    <label for="location">Location</label>
                                    <input type="text" class="form-control @error('location') is-invalid @enderror"
                                        name="location" id="location" value="{{ old('location') }}">
                                </div>

                                @error('location')
                                    <p class="text-danger">
                                        {{ $message }}
                                    </p>
                                @enderror

                                <div class="mb-2">
                                    <label for="recapitulation">Recapitulation</label>
                                    <textarea class="form-control @error('recapitulation') is-invalid @enderror" name="recapitulation" id="recapitulation"
                                        cols="30" rows="5">{{ old('recapitulation') }}</textarea>
                                </div>

                                @error('recapitulation')
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
