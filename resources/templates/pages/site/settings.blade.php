@extends('pages.site.page')

@section('content')

    <section class="container">

        <div class="alert alert-success" role="info">
            <h3>Start/Restart Website</h3>
            <p>If your website was stopped or needs to be restarted.</p>
            <a href="{{ route('site.confirm.start', $site->id ) }}" class="btn btn-success btn-slim">Restart Site</a>
        </div>

        <div class="alert alert-warning" role="info">
            <h3>Stop Website</h3>
            <p>If you would like to stop your website without deleting it click below </p>
            <p><strong>Note: Stopped sites will still be charged to your account based on the sites plan.</strong></p>
            <a href="{{ route('site.confirm.stop', $site->id ) }}" class="btn btn-warning btn-slim">Stop Site</a>
        </div>

        <div class="alert alert-danger" role="alert">
           <h3>Delete Website</h3>
            <p>Make sure you have a backup before deleting. You will need to confirm the deletion on the next page.</p>
            <a href="{{ route('site.confirm.delete', $site->id ) }}" class="btn btn-danger btn-slim">Delete Site</a>
        </div>

    </section>


@stop
