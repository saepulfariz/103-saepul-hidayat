@extends('partials.layouts.app')

@section('title', 'Meetings - SIMASI')
@section('menu', $menu)

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="row mt-2">
                <div class="col-sm-6"></div>
                <div class="col-sm-6 text-end">
                    <a href="{{ route('meetings.index') }}" class="btn btn-warning me-2"><i class="fas fa-home"></i></i>
                        HOME</a>
                    <a href="{{ route('meetings.create') }}" class="btn btn-success me-2"><i class="fas fa-plus"></i>
                        INPUT</a>
                </div>
            </div>
            <div class="card mb-4">
                {{-- <div class="card-header pb-0">
                    <h6>Authors table</h6>
                </div> --}}
                <div class="card-body pb-2">
                    <div class="table-responsive p-0">
                        <table class="table align-items-center mb-0">
                            <thead>
                                <tr>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">No
                                    </th>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                                        Name</th>

                                    @foreach ($meetings as $meet)
                                        <th
                                            class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                                            {{ date('d/m/Y', strtotime($meet->date)) }}</th>
                                    @endforeach
                                    @foreach ($presensis as $presensi)
                                        <th
                                            class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                                            {{ $presensi }}</th>
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
                                            <span class="text-secondary text-xs font-weight-bold">{{ $d['name'] }}</span>
                                        </td>

                                        @foreach ($d['attendances'] as $at)
                                            <td>
                                                <span
                                                    class="text-secondary text-xs font-weight-bold">{{ $at['presensi'] }}</span>
                                            </td>
                                        @endforeach

                                        @foreach ($d['summary_presensi'] as $p)
                                            <td>
                                                <span
                                                    class="text-secondary text-xs font-weight-bold">{{ $p['jumlah'] }}</span>
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
@endsection
