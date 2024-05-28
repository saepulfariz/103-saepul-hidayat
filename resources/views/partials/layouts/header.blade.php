<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="apple-touch-icon" sizes="76x76" href="{{ asset('assets/img/apple-icon.png') }}">
    <link rel="icon" type="image/png" href="{{ asset('assets/img/favicon.png') }}">
    <title>@yield('title', ' - SIMASI')</title>
    <!--     Fonts and icons     -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet" />
    <!-- Nucleo Icons -->
    <link href="{{ asset('assets/css/nucleo-icons.css') }}" rel="stylesheet" />
    <link href="{{ asset('assets/css/nucleo-svg.css') }}" rel="stylesheet" />
    <!-- Font Awesome Icons -->
    <link rel="stylesheet" href="{{ asset('assets/plugins/fontawesome-free/css/all.min.css') }}">
    <link href="{{ asset('assets/css/nucleo-svg.css') }}" rel="stylesheet" />
    <!-- CSS Files -->
    <link id="pagestyle" href="{{ asset('assets/css/argon-dashboard.css?v=2.0.4') }}" rel="stylesheet" />

    {{-- <link href="{{ asset('assets/plugins/DataTables-2.0.7/css/dataTables.dataTables.css') }}" rel="stylesheet" /> --}}
    <link href="{{ asset('assets/plugins/DataTables-2.0.7/css/dataTables.bootstrap5.min.css') }}" rel="stylesheet" />

    <link href="{{ asset('assets/plugins/Buttons-3.0.2/css/buttons.dataTables.css') }}" rel="stylesheet" />
    <link href="{{ asset('assets/plugins/Buttons-3.0.2/css/buttons.bootstrap5.css') }}" rel="stylesheet" />


    @yield('head')
    <style>
        .navbar-vertical.navbar-expand-xs .navbar-collapse {
            display: block;
            overflow: auto;
            /* height: calc(100vh - 360px); */
            height: calc(100vh - 0px);
        }
    </style>
</head>
