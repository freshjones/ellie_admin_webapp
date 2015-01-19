@extends('pages.site.page')

@section('content')

    <section class="container">

        <article class="content">
            <h2>{{ $site->name }}</h2>

            <dl class="dl-horizontal">

                <dt>Status:</dt>
                <dd><span class="label label-success">{{ $site->status }}</span></dd>

                <dt>Site Name:</dt>
                <dd><a href="https://{{ $site->url }}.{{ getenv('APP_NAME') }}" target="_blank">{{ $site->name }}</a></dd>

                <dt>Site URL:</dt>
                <dd><a href="https://{{ $site->url }}.{{ getenv('APP_NAME') }}" target="_blank">https://{{ $site->url }}.{{ getenv('APP_NAME') }}</a></dd>

                <dt>Current Plan:</dt>
                <dd>{{ $site->plan->name }}</dd>

                <dt>Version:</dt>
                <dd>{{ $site->branch }}</dd>

                <dt>Security:</dt>
                <dd>{{ $site->security }}</dd>

            </dl>

        </article>

    </section>

@stop