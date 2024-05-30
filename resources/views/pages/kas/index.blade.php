@extends('partials.layouts.app')

@section('title', 'Kas')
@section('menu', $menu)

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="row mt-2">
                <div class="col-sm-6"></div>
                <div class="col-sm-6 text-end">
                    <a href="{{ route('kas.report') }}" class="btn btn-info me-2"><i class="fas fa-file-export"></i></i>
                        REPORT</a>
                </div>
            </div>
            <div class="card mb-4">
                {{-- <div class="card-header pb-0">
                    <h6>Authors table</h6>
                </div> --}}
                <div class="card-body pb-2">
                    <div class="table-responsive p-0">
                        <table class="table align-items-center w-100 mb-0">
                            <thead>
                                <tr>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">No
                                    </th>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                                        NPM</th>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                                        Name</th>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                                        Division</th>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                                        Coordinator</th>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                                        Nominal</th>
                                    <th
                                        class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                        Action</th>
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
                                            <span class="text-secondary text-xs font-weight-bold">{{ $d->user->npm }}</span>
                                        </td>
                                        <td>
                                            <span
                                                class="text-secondary text-xs font-weight-bold">{{ $d->user->name }}</span>
                                        </td>
                                        <td>
                                            <span
                                                class="text-secondary text-xs font-weight-bold">{{ $d->divisi->name }}</span>
                                        </td>
                                        <td class="align-middle text-center text-sm">
                                            @if ($d['coordinator'] == true)
                                                <span class="badge badge-sm bg-gradient-success">Coordinator</span>
                                            @else
                                                <span class="badge badge-sm bg-gradient-info">Participant</span>
                                            @endif
                                        </td>
                                        <td>
                                            <span
                                                class="text-secondary text-xs font-weight-bold">{{ count($d->transactionNominal) > 0 ? number_format($d->transactionNominal[0]->total, 0, ',', '.') : 0 }}</span>
                                        </td>
                                        <td class="align-middle text-center">
                                            <a href="{{ route('kas.show', $d['id']) }}" class="btn btn-sm btn-info"><i
                                                    class="fas fa-eye"></i></a>
                                        </td>
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
