@extends('pages.site.page')

@section('content')

    <section class="container">

        <h2>Delete {{ $site->name }}</h2>

        <p>All data associated with the <strong>{{ $site->name }}</strong> website will be deleted including all pages, files, images. <strong>Warning! This can NOT be undone!</strong></p>

        @foreach ($errors->all() as $error)
            <li class="errors">{{ $error }}</li>
        @endforeach

        {!! Form::open(['route' => ['site.delete', $site->id]]) !!}

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