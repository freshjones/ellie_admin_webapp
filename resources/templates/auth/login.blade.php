@extends('layouts.default')

@section('content')

    <section class="container">

        <article class="content">

            <h1>Login</h1>

            @foreach ($errors->all() as $error)
                <li class="errors">{{ $error }}</li>
            @endforeach

            {!! Form::open(['route' => 'login']) !!}

            <!-- Last_name Form Input -->
            <div class="form-group">
                {!! Form::label('email', 'Email:') !!}
                {!! Form::text('email', null, ['class' => 'form-control', 'placeholder' => 'Email Address' ]) !!}
            </div>

            <!-- Password Form Input -->
            <div class="form-group">
                {!! Form::label('password', 'Password:') !!}
                {!! Form::password('password', ['class' => 'form-control']) !!}
            </div>

            <!-- Form Input -->
            <div class="form-group">
                {!! Form::submit('Next', ['class' => 'btn form-control', ]) !!}
            </div>

            {!! Form::close() !!}

        </article>

    </section>


@stop