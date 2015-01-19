<div class="menu admin-menu clearfix">

	<ul class="float-left">
		<li>{!! link_to_route('dashboard', 'Dashboard') !!}</li>
		<li>{!! link_to_route('sites.index', 'My Sites') !!}</li>
	</ul>

	<ul class="float-right">
		<li>{!! link_to_route('account.edit',  $user->first_name . ' ' . $user->last_name, ['profile' => $user->id]) !!}</li>
		<li>{!! link_to_route('logout', 'Logout') !!}</li>
		<li>{!! link_to_route('help.index', 'Help') !!}</li>
	</ul>

</div>