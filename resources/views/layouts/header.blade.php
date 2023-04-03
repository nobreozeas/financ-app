<!doctype html>
<html lang="pt-br">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title')</title>
    <link href="{{ asset('assets/css/bootstrap.min.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="{{asset('assets/css/style.css')}}">
    <link href="{{ asset('assets/css/all.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('assets/css/select2.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/css/select2-bootstrap-5-theme.min.css') }}" />
    <link rel="stylesheet" href="{{asset('assets/css/datatables.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/dataTables.bootstrap5.min.css')}}">

    @stack('styles')
    <script src="{{ asset('assets/js/chart.js') }}"></script>
</head>

<body>




