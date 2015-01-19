@extends('layouts.default')

@section('content')
    @yield('content')
@stop

@section('header')
    @include('partials.dashboard.menu')
    @include('partials.site.menu')
@stop