@extends('layouts.default')

@section('content')
	<section class="container">
		<article class="content">
			<h1>Welcome</h1>

			{!! link_to_route('templates', 'you should sign up', array(), ['class' => 'button' ]) !!}
			{!! link_to_route('login', 'login', array(), ['class' => 'button' ]) !!}

		</article>
	</section>
@stop
