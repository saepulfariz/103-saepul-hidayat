@extends('partials.layouts.auth')

@section('title', 'KAS')

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
                    <h1 class="text-white">{{ session()->get('organization')['shortname'] }}-<span
                            class="text-success">{{ session()->get('organization')['year'] }}</span></h1>
                </div>
            </div>
            <div class="row justify-content-center">
                <div class="col">
                    <div class="row">
                        <div class="col">
                            <a href="{{ route('home.index') }}" class="btn btn-sm btn-secondary">HOME</a>
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-body">
                            <div class="table-responsive p-0">
                                <table class="table align-items-center w-100 mb-0">
                                    <thead>
                                        <tr>
                                            <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                                No
                                            </th>
                                            <th
                                                class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                                                Name</th>

                                            @foreach ($range_date as $date)
                                                <th
                                                    class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                                                    {{ date('d/m/Y', strtotime($date)) }}</th>
                                            @endforeach
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @php
                                            $a = 1;
                                        @endphp
                                        @foreach ($data as $d)
                                            <tr>
                                                <td><span
                                                        class="text-secondary text-xs font-weight-bold text-center px-3 py-1">{{ $a++ }}</span>
                                                </td>
                                                <td>
                                                    <span
                                                        class="text-secondary text-xs font-weight-bold">{{ $d['name'] }}</span>
                                                </td>

                                                @foreach ($d['kas'] as $at)
                                                    <td>
                                                        <span
                                                            class="text-secondary text-xs font-weight-bold">{{ number_format($at['nominal'], 0, ',', '.') }}</span>
                                                    </td>
                                                @endforeach


                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>

@endsection
