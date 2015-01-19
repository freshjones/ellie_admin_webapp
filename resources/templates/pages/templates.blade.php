@extends('layouts.default')

@section('content')
	<section class="container">
		<article class="content">
			<h1>Choose a design</h1>
			<ul class="list inline templates">
				@for($i=0;$i<8;$i++)
				<li><a href="{{ route('signup') }}?template={{ $i+1 }}">Template {{ $i+1 }}</a></li>
				@endfor
			</ul>
		</article>
	</section>
@stop

