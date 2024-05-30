@extends('partials.layouts.app')

@section('title', 'Attendances')
@section('menu', $menu)

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="row mt-2">
                <div class="col-sm-6"></div>
                <div class="col-sm-6 text-end">
                    <a href="{{ route('attendances.index', $data['meet_id']) }}" class="btn btn-secondary me-2"><i
                            class="fas fa-arrow-left"></i>
                        BACK</a>
                </div>
            </div>
            <form action="{{ route('attendances.update', $data['id']) }}" method="post" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="row">
                    <div class="col-md-5 mb-2">
                        <div class="card">
                            <div class="card-body  pb-2">

                                <div class="mb-2">
                                    <label for="meeting">Meeting</label>
                                    <input type="text" disabled
                                        class="form-control @error('meeting') is-invalid @enderror" name="meeting"
                                        id="meeting" value="{{ $meeting['title'] }}">
                                </div>

                                <div class="mb-2">
                                    <label for="member_id">Member</label>
                                    <select disabled class="form-control @error('date') is-invalid @enderror"
                                        name="member_id" id="member_id">
                                        @foreach ($members as $d)
                                            @if ($d['id'] == $data['member_id'])
                                                <option selected value="{{ $d['id'] }}">{{ $d->user->npm }} |
                                                    {{ $d->user->name }}
                                                @else
                                                <option value="{{ $d['id'] }}">{{ $d->user->npm }} |
                                                    {{ $d->user->name }}
                                            @endif
                                            </option>
                                        @endforeach
                                    </select>
                                </div>

                                @error('member_id')
                                    <p class="text-danger">
                                        {{ $message }}
                                    </p>
                                @enderror

                                <div class="mb-2">
                                    <label for="presensi">Presensi</label>
                                    <select class="form-control @error('date') is-invalid @enderror" name="presensi"
                                        id="presensi">
                                        @foreach ($presensis as $d)
                                            @if ($d == $data['presensi'])
                                                <option selected>{{ $d }}</option>
                                            @else
                                                <option>{{ $d }}</option>
                                            @endif
                                        @endforeach
                                    </select>
                                </div>

                                @error('presensi')
                                    <p class="text-danger">
                                        {{ $message }}
                                    </p>
                                @enderror

                                <div class="mb-2">
                                    <label for="note">Note</label>
                                    <textarea class="form-control @error('note') is-invalid @enderror" name="note" id="note" cols="30"
                                        rows="5">{{ old('note', $data['note']) }}</textarea>
                                </div>

                                @error('note')
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
