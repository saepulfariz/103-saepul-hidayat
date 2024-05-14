@extends('partials.layouts.app')

@section('title', 'Users - SIMASI')
@section('menu', $menu)

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="row mt-2">
                <div class="col-sm-6"></div>
                <div class="col-sm-6 text-end">
                    <a href="{{ route('users.create') }}" class="btn btn-success me-2"><i class="fas fa-plus"></i> INPUT</a>
                </div>
            </div>
            <div class="card mb-4">
                {{-- <div class="card-header pb-0">
                    <h6>Authors table</h6>
                </div> --}}
                <div class="card-body px-0 pt-0 pb-2">
                    <div class="table-responsive p-0">
                        <table class="table align-items-center mb-0">
                            <thead>
                                <tr>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">User
                                    </th>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                                        Npm</th>
                                    <th
                                        class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                        Status</th>
                                    <th
                                        class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                        Role</th>
                                    <th
                                        class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                        Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($users as $d)
                                    <tr>
                                        <td>
                                            <div class="d-flex px-2 py-1">
                                                <div>
                                                    <img src="{{ asset('assets/img/' . $d['image']) }}"
                                                        class="avatar avatar-sm me-3" alt="user1">
                                                </div>
                                                <div class="d-flex flex-column justify-content-center">
                                                    <h6 class="mb-0 text-sm">{{ $d['name'] }}</h6>
                                                    <p class="text-xs text-secondary mb-0">{{ $d['email'] }}</p>
                                                </div>
                                            </div>
                                        </td>
                                        <td>
                                            <span class="text-secondary text-xs font-weight-bold">{{ $d['npm'] }}</span>
                                        </td>
                                        <td class="align-middle text-center text-sm">
                                            @if ($d['is_active'] == true)
                                                <span class="badge badge-sm bg-gradient-success">Active</span>
                                            @else
                                                <span class="badge badge-sm bg-gradient-danger">Non Active</span>
                                            @endif
                                        </td>
                                        <td class="align-middle text-center">
                                            <span class="text-secondary text-xs font-weight-bold">{{ $d['role'] }}</span>
                                        </td>
                                        <td class="align-middle text-center">
                                            <a href="{{ route('users.show', $d['id']) }}" class="btn btn-sm btn-info"><i
                                                    class="fas fa-eye"></i></a>
                                            <a href="{{ route('users.edit', $d['id']) }}" class="btn btn-sm btn-warning"><i
                                                    class="fas fa-edit"></i></a>
                                            <a href="#"
                                                onclick="alert('Gak boleh ada yang di hapus, apalagi hati ^_^')"
                                                class="btn btn-sm btn-danger"><i class="fas fa-trash"></i></a>
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