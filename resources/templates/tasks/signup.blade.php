@extends('layouts.default')

@section('content')

	<section class="container">

		<article class="content">
			<h1>Signup</h1>

			<p>Using Template {{ $template }} <br/><em>(You can always change this later)</em></p>

			@foreach ($errors->all() as $error)
			<li class="errors">{{ $error }}</li>
			@endforeach

			{!! Form::open(['route' => 'signup.store']) !!}

			{!! Form::hidden('template', $template) !!}

			<!-- First_name Form Input -->
			<div class="form-group">
				{!! Form::label('first_name', 'First_name:') !!}
				{!! Form::text('first_name', null, ['class' => 'form-control', 'placeholder' => 'First_name' ]) !!}
			</div>

			<!-- Last_name Form Input -->
			<div class="form-group">
				{!! Form::label('last_name', 'Last_name:') !!}
				{!! Form::text('last_name', null, ['class' => 'form-control', 'placeholder' => 'Last_name' ]) !!}
			</div>

			<!-- Last_name Form Input -->
			<div class="form-group">
				{!! Form::label('email', 'Email:') !!}
				{!! Form::text('email', null, ['class' => 'form-control', 'placeholder' => 'Email Address' ]) !!}
			</div>

			<!-- Ymca_name Form Input -->
			<div class="form-group">
				{!! Form::label('ymca_name', 'YMCA Name:') !!}
				{!! Form::text('ymca_name', null, ['class' => 'form-control', 'placeholder' => 'YMCA Name' ]) !!}
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