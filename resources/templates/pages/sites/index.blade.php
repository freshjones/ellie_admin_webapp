@extends('layouts.default')

@section('content')

    <section class="container">

        <article class="content">

            <h2>My Sites </h2>

            <ul class="list inline templates">
                @foreach($sites AS $site)
                    <li>{!! link_to_route('site.index', $site->name, $site->id  ) !!}</li>
                @endforeach
                <li>{!! link_to_route('sites.create', 'New Site' ) !!}</li>
            </ul>

        </article>

    </section>

@stop

@section('header')

    @include('partials.dashboard.menu')

@stop