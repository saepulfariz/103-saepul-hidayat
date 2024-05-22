@extends('partials.layouts.app')

@section('title', 'Kas - SIMASI')
@section('menu', $menu)

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="row mt-2">
                <div class="col-sm-6 col-12">
                    <h3 class="text-white">{{ $member->user->name }} | {{ $member->user->npm }}</h3>
                </div>
                <div class="col-sm-6 text-end">
                    <a href="{{ route('kas.create', $member['id']) }}" class="btn btn-success me-2"><i class="fas fa-plus"></i>
                        INPUT</a>
                </div>
            </div>
            <div class="card mb-4">
                {{-- <div class="card-header pb-0">
                    <h6>Authors table</h6>
                </div> --}}
                <div class="card-body px-0 pt-3 pb-2">
                    <div class="table-responsive p-0">
                        <table class="table align-items-center mb-0">
                            <thead>
                                <tr>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">No
                                    </th>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                                        Name</th>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                                        Nominal</th>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                                        Date</th>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                                        Note</th>
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
                                            <span
                                                class="text-secondary text-xs font-weight-bold">{{ $d->member->user->name }}</span>
                                        </td>
                                        <td>
                                            <span
                                                class="text-secondary text-xs font-weight-bold">{{ number_format($d->nominal, 0, ',', '.') }}</span>
                                        </td>
                                        <td>
                                            <span class="text-secondary text-xs font-weight-bold">{{ $d->datetime }}</span>
                                        </td>
                                        <td>
                                            <span class="text-secondary text-xs font-weight-bold">{{ $d->note }}</span>
                                        </td>
                                        <td class="align-middle text-center">
                                            {{-- <td class="align-middle text-center">
                                                <a href="{{ route('kas.edit', $d['id']) }}"
                                                    class="btn btn-sm btn-warning"><i class="fas fa-edit"></i></a>
                                                <form class="d-inline" action="{{ route('kas.destroy', $d['id']) }}"
                                                    method="post">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-sm btn-danger"><i
                                                            class="fas fa-trash"></i></button>
                                                </form>
                                            </td> --}}
                                        </td>
                                    </tr>
                                @empty
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection