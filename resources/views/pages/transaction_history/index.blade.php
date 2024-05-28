@extends('partials.layouts.app')

@section('title', 'Transaction History - SIMASI')
@section('menu', $menu)

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="row mt-2">
                <div class="col-sm-6 col-12text-start">
                    <h3 class="text-white">Saldo : {{ number_format($saldo, 0, ',', '.') }}</h3>
                </div>
                <div class="col-sm-6 text-end">

                </div>
            </div>
            <div class="card mb-4">
                {{-- <div class="card-header pb-0">
                    <h6>Authors table</h6>
                </div> --}}
                <div class="card-body  pb-2">
                    <div class="table-responsive p-0">
                        <table class="table align-items-center mb-0">
                            <thead>
                                <tr>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">No
                                    </th>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                                        Date</th>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                                        Debit</th>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                                        Credit</th>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                                        Saldo</th>
                                    <th
                                        class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                        Operator</th>
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
                                            <span class="text-secondary text-xs font-weight-bold">{{ $d->datetime }}</span>
                                        </td>
                                        <td>
                                            <span
                                                class="text-secondary text-xs font-weight-bold">{{ number_format($d->debit, 0, ',', '.') }}</span>
                                        </td>
                                        <td>
                                            <span
                                                class="text-secondary text-xs font-weight-bold">{{ number_format($d->credit, 0, ',', '.') }}</span>
                                        </td>
                                        <td class="align-middle text-center">
                                            <span
                                                class="text-secondary text-xs font-weight-bold">{{ number_format($d->balance, 0, ',', '.') }}</span>
                                        </td>
                                        <td class="align-middle text-center">
                                            <span
                                                class="text-secondary text-xs font-weight-bold">{{ $d->user->name }}</span>
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
