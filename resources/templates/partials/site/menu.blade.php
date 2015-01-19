<div class="menu site-menu clearfix">

    <ul class="float-left">
        <li class="strong">{{ $site->name }}</li>
        <li><span class="label label-primary">{{ $site->plan->name }}</span></li>
    </ul>

    <ul class="float-right">
        <li>{!! link_to_route('site.index', 'Dashboard', $site->id) !!}</li>
        <li>{!! link_to_route('site.users', 'Users', $site->id) !!}</li>
        <li>{!! link_to_route('site.plan', 'Plan', $site->id) !!}</li>
        <li>{!! link_to_route('site.billing', 'Billing', $site->id) !!}</li>
        <li>{!! link_to_route('site.domains', 'Domains', $site->id) !!}</li>
        <li>{!! link_to_route('site.settings', 'Configuration', $site->id) !!}</li>
    </ul>

</div>