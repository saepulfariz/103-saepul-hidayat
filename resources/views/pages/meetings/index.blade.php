@extends('partials.layouts.app')

@section('title', 'Meetings - SIMASI')
@section('menu', $menu)

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="row mt-2">
                <div class="col-sm-6"></div>
                <div class="col-sm-6 text-end">
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
                                        Title</th>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                                        Date</th>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                                        Start Time</th>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                                        End Time</th>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                                        Location</th>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                                        Recapitulation</th>
                                    <th
                                        class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                        Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                    $a = 1;
                                @endphp
                                @forelse ($data as $d)
                                    <tr>
                                        <td><span
                                                class="text-secondary text-xs font-weight-bold text-center px-3 py-1">{{ $a++ }}</span>
                                        </td>
                                        <td>
                                            <span class="text-secondary text-xs font-weight-bold">{{ $d['title'] }}</span>
                                        </td>
                                        <td>
                                            <span class="text-secondary text-xs font-weight-bold">{{ $d['date'] }}</span>
                                        </td>
                                        <td>
                                            <span
                                                class="text-secondary text-xs font-weight-bold">{{ $d['start_time'] }}</span>
                                        </td>
                                        <td>
                                            <span
                                                class="text-secondary text-xs font-weight-bold">{{ $d['end_time'] }}</span>
                                        </td>
                                        <td>
                                            <span
                                                class="text-secondary text-xs font-weight-bold">{{ $d['location'] }}</span>
                                        </td>
                                        <td>
                                            <span
                                                class="text-secondary text-xs font-weight-bold">{{ $d['recapitulation'] }}</span>
                                        </td>
                                        <td class="align-middle text-center">
                                            <a href="{{ route('attendances.index', $d['id']) }}"
                                                class="btn btn-sm btn-info"><i class="fas fa-calendar-check"></i></i></a>
                                            <a href="{{ route('meetings.edit', $d['id']) }}"
                                                class="btn btn-sm btn-warning"><i class="fas fa-edit"></i></a>
                                            <form class="d-inline" action="{{ route('meetings.destroy', $d['id']) }}"
                                                method="post">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-sm btn-danger"><i
                                                        class="fas fa-trash"></i></button>
                                            </form>
                                        </td>
                                    </tr>
                                @empty
                                    <h1>DATA EMPTY</h1>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
