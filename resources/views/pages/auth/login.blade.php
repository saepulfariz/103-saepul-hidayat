@extends('partials.layouts.auth')

@section('title', 'LOGIN')

@section('content')
    <main class="main-content  mt-0">
        <section>
            <div class="page-header min-vh-100">
                <div class="container">
                    <div class="row">
                        <div class="col-xl-4 col-lg-5 col-md-7 d-flex flex-column mx-lg-0 mx-auto">
                            <div class="card card-plain">
                                <div class="card-header pb-0 text-start">
                                    <h4 class="font-weight-bolder">Sign In</h4>
                                    <p class="mb-0">Enter your email and password to sign in</p>
                                </div>
                                <div class="card-body">
                                    <form action="{{ route('auth.process') }}" method="post" role="form">
                                        @csrf
                                        @if (session()->get('error'))
                                            <div class="alert text-white alert-danger alert-dismissible fade show"
                                                role="alert">
                                                <span class="alert-text">
                                                    {{ session()->get('error') }}
                                                </span>
                                                <button type="button" class="btn-close" data-bs-dismiss="alert"
                                                    aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                        @endif
                                        <div class="mb-3">
                                            <input type="text" class="form-control form-control-lg" name="username"
                                                id="username" placeholder="Username Or Email" aria-label="Email">
                                        </div>
                                        <div class="mb-3">
                                            <input type="password" class="form-control form-control-lg" name="password"
                                                id="password" placeholder="Password" aria-label="Password">
                                        </div>
                                        {{-- <div class="form-check form-switch">
                                            <input class="form-check-input" type="checkbox" id="rememberMe">
                                            <label class="form-check-label" for="rememberMe">Remember me</label>
                                        </div> --}}
                                        <div class="text-center">
                                            {{-- <a href="/dashboard" class="btn btn-lg btn-primary btn-lg w-100 mt-4 mb-0">Sign
                                                in</a> --}}
                                            <button type="submit"
                                                class="btn btn-lg btn-primary btn-lg w-100 mt-4 mb-0">Sign in</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <div
                            class="col-6 d-lg-flex d-none h-100 my-auto pe-0 position-absolute top-0 end-0 text-center justify-content-center flex-column">
                            <div class="position-relative bg-gradient-primary h-100 m-3 px-7 border-radius-lg d-flex flex-column justify-content-center overflow-hidden"
                                style="background-image: url('{{ asset('assets/uploads/organizations/' . session()->get('organization')['logo']) }}');
          background-size: cover;">
                                <span class="mask bg-gradient-primary opacity-6"></span>
                                <h4 class="mt-5 text-white font-weight-bolder position-relative">
                                    "{{ session()->get('organization')['name'] }}"</h4>
                                <p class="text-white position-relative">{{ session()->get('organization')['qoute'] }}</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>

@endsection
