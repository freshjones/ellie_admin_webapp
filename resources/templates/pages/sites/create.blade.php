@extends('layouts.default')

@section('content')

    <section class="container">

        <article class="content">
            <h2>Create Site</h2>

            @foreach ($errors->all() as $error)
                <li class="errors">{{ $error }}</li>
            @endforeach

            {!! Form::open(['route' => 'sites.store']) !!}

            <!-- Site_name Form Input -->
            <div class="form-group">
                {!! Form::label('name', 'Site Name:') !!}
                {!! Form::text('name', null, ['class' => 'form-control', 'placeholder' => 'Site Name' ]) !!}
            </div>

            <!-- Site_url Form Input -->
            <div class="form-group">
                {!! Form::label('url', 'Site Url:') !!}
                {!! Form::text('url', null, ['class' => 'form-control', 'placeholder' => 'Site Url' ]) !!}.{{ getenv('APP_NAME') }}
            </div>

            <!-- Template Form Input -->
            <div class="form-group">
                {!! Form::label('template_id', 'Template:') !!}
                {!! Form::text('template_id', null, ['class' => 'form-control', 'placeholder' => 'Template' ]) !!}
            </div>

            <!-- Color_scheme Form Input -->
            <div class="form-group">
                {!! Form::label('colorscheme_id', 'Color_scheme:') !!}
                {!! Form::text('colorscheme_id', null, ['class' => 'form-control', 'placeholder' => 'Color_scheme' ]) !!}
            </div>

            <!-- Form Input -->
            <div class="form-group">
                {!! Form::submit('Next', ['class' => 'btn form-control', ]) !!}
            </div>

            {!! Form::close() !!}

        </article>

    </section>

@stop

@section('header')

    @include('partials.dashboard.menu')

@stop

