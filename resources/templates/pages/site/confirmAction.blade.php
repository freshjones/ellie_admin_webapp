@extends('pages.site.page')

@section('content')

    <section class="container">

        <h2>{{ $action }} {{ $site->name }}</h2>

        <p>{!! $message !!}</p>

        @foreach ($errors->all() as $error)
            <li class="errors">{{ $error }}</li>
        @endforeach

        {!! Form::open(['route' => [$route, $site->id]]) !!}

        <!-- Site_name Form Input -->
        <div class="form-group">
            {!! Form::label('name', 'Password:') !!}
            {!! Form::password('password', ['class' => 'form-control']) !!}
        </div>

        <div class="form-group">
            {!! Form::submit('Delete Website', ['class' => 'btn btn-danger form-control', ]) !!}
        </div>

        {!! Form::close() !!}

    </section>

@stop