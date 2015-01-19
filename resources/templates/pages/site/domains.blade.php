@extends('pages.site.page')

@section('content')

    <section class="container">

        <a href="http://{{ $site->url }}.{{ getenv('APP_NAME') }}" target="_blank" class="btn btn-default btn-slim">View this site</a>

    </section>

    <section class="container">

        <article class="content">

            domains
        </article>

    </section>

@stop