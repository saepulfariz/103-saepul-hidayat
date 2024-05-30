@extends('partials.layouts.auth')

@section('title', 'HOME - SIMASI')

@section('head')
    <style>
        body {
            background-color: #5E72E4
        }
    </style>
@endsection

@section('content')
    <main class="" style="">
        <div class="container mt-4">
            <div class="row mb-2">
                <div class="col-12 text-center">
                    <h1 class="text-white">HIMASI<span class="text-success">22</span></h1>
                </div>
            </div>
            <div class="row justify-content-center">
                <div class="col-md-4 mb-4">
                    <div class="card">
                        <div class="card-body">
                            <img class="img-thumbnail" src="{{ asset('assets/uploads/organizations/himasi.png') }}"
                                alt="">
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="list-group">
                        <a href="{{ route('home.kas') }}" class="list-group-item mb-4 h4" aria-current="true">
                            <i class="fas fa-hand-holding-usd"></i>
                            KAS
                        </a>
                        <a href="{{ route('home.attendances') }}" class="list-group-item mb-4 h4">
                            <i class="fas  fa-landmark "></i>
                            ATTENDANCES
                        </a>
                        <a href="{{ route('auth.login') }}" class="list-group-item mb-4 h4">
                            <i class="fas fa-sign-out-alt"></i>
                            LOGIN
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </main>

@endsection
