@extends('pages.site.page')

@section('content')

    <section class="container">

        <div class="alert alert-danger" role="alert">
           <h3>Danger Zone</h3>
            <p>Make sure you have a backup before deleting. You will need to confirm the deletion on the next page.</p>
            <a href="{{ route('site.delete', $site->id ) }}" class="btn btn-danger btn-slim">Delete Site</a>
        </div>

    </section>


@stop
