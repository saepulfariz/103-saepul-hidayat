@extends('partials.layouts.app')

@section('title', 'kas')
@section('menu', $menu)

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="row mt-2">
                <div class="col-sm-6"></div>
                <div class="col-sm-6 text-end">
                    <a href="{{ route('kas.show', $member['id']) }}" class="btn btn-secondary me-2"><i
                            class="fas fa-arrow-left"></i>
                        BACK</a>
                </div>
            </div>
            <form action="{{ route('kas.store', $member['id']) }}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="row">
                    <div class="col-md-5 mb-2">
                        <div class="card">
                            <div class="card-body  pb-2">

                                <div class="mb-2">
                                    <label for="member_id">Member</label>
                                    <input type="text" readonly
                                        class="form-control @error('member_id') is-invalid @enderror" name="member_id"
                                        id="member_id"
                                        value="{{ old('member_id', $member->user->name . ' | ' . $member->user->npm) }}">
                                </div>

                                @error('member_id')
                                    <p class="text-danger">
                                        {{ $message }}
                                    </p>
                                @enderror

                                <div class="mb-2">
                                    <label for="nominal">Nominal</label>
                                    <input type="number" class="form-control @error('nominal') is-invalid @enderror"
                                        name="nominal" id="nominal" value="{{ old('nominal') }}">
                                </div>

                                @error('nominal')
                                    <p class="text-danger">
                                        {{ $message }}
                                    </p>
                                @enderror

                                <div class="mb-2">
                                    <label for="note">Note</label>
                                    <textarea name="note" class="form-control" id="note" cols="30" rows="3"></textarea>
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
