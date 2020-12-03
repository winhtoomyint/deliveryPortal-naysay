@if(backpack_user()->hasRole('Admin'))
<!-- This file is used to store sidebar items, starting with Backpack\Base 0.9.0 -->
<li class="nav-item"><a class="nav-link" href="{{ backpack_url('dashboard') }}"><i class="la la-home nav-icon"></i> {{ trans('backpack::base.dashboard') }}</a></li>

<li class="nav-item nav-dropdown">
	<a class="nav-link nav-dropdown-toggle" href="#"><i class="nav-icon la la-wrench"></i>Setting</a>
	<ul class="nav-dropdown-items">
	<li class='nav-item'><a class='nav-link' href='{{ backpack_url('city') }}'><i class='nav-icon la la-industry'></i> Cities</a></li>
		<li class='nav-item'><a class='nav-link' href='{{ backpack_url('township') }}'><i class='nav-icon la la-university'></i> Townships</a></li>
		<li class='nav-item'><a class='nav-link' href='{{ backpack_url('channel') }}'><i class='nav-icon la la-creative-commons'></i> Channels</a></li>
		<li class='nav-item'><a class='nav-link' href='{{ backpack_url('openingday') }}'><i class='nav-icon la la-hand-pointer-o'></i> Open Days</a></li>
	</ul>
</li>

<li class="nav-item nav-dropdown">
	<a class="nav-link nav-dropdown-toggle" href="#"><i class="nav-icon la la-truck"></i>Delivery</a>
	<ul class="nav-dropdown-items">
		<li class='nav-item'><a class='nav-link' href='{{ backpack_url('delivery') }}'><i class='nav-icon la la-gift'></i> Delivery</a></li>
		<li class='nav-item'><a class='nav-link' href='{{ backpack_url('pricing') }}'><i class='nav-icon la la-calculator'></i> Pricings</a></li>
	</ul>
</li>

<li class="nav-item nav-dropdown">
	<a class="nav-link nav-dropdown-toggle" href="#"><i class="nav-icon la la-pencil-square-o"></i>Blog Post</a>
	<ul class="nav-dropdown-items">
		<li class='nav-item'><a class='nav-link' href='{{ backpack_url('category') }}'><i class='nav-icon la la-cc'></i> Categories</a></li>
		<li class='nav-item'><a class='nav-link' href='{{ backpack_url('post') }}'><i class='nav-icon la la-pied-piper'></i> Posts</a></li>

		<li class='nav-item'><a class='nav-link' href='{{ backpack_url('comment') }}'><i class='nav-icon la la-comment-o'></i> Comments</a></li>
	</ul>
</li>

<li class="nav-item nav-dropdown">
	<a class="nav-link nav-dropdown-toggle" href="#"><i class="nav-icon la la-question-circle"></i> Forum</a>
	<ul class="nav-dropdown-items">
		<li class='nav-item'><a class='nav-link' href='{{ backpack_url('topic') }}'><i class='nav-icon la la-list'></i> Topics</a></li>
		<li class='nav-item'><a class='nav-link' href='{{ backpack_url('forum_category') }}'><i class='nav-icon la la-cc'></i> Forum_categories</a></li>
		<li class='nav-item'><a class='nav-link' href='{{ backpack_url('forum_discussion') }}'><i class='nav-icon la la-comments'></i> Forum_discussions</a></li>
	</ul>
</li>


<li class="nav-item nav-dropdown">
	<a class="nav-link nav-dropdown-toggle" href="#"><i class="nav-icon la la-file-movie-o"></i>Training Room</a>
	<ul class="nav-dropdown-items">
		<li class='nav-item'><a class='nav-link' href='{{ backpack_url('playlist') }}'><i class='nav-icon la la-th-list'></i> Playlists</a></li>
		<li class='nav-item'><a class='nav-link' href='{{ backpack_url('video') }}'><i class='nav-icon la la-video-camera'></i> Videos</a></li>
		<li class='nav-item'><a class='nav-link' href='{{ backpack_url('showplaylist') }}'><i class='nav-icon la la-arrow-circle-o-right'></i> Showplaylists</a></li>
	</ul>
</li>


<li class="nav-item nav-dropdown">
	<a class="nav-link nav-dropdown-toggle" href="#"><i class="nav-icon la la-list-alt"></i>Event</a>
	<ul class="nav-dropdown-items">
		<li class='nav-item'><a class='nav-link' href='{{ backpack_url('eventcategory') }}'><i class='nav-icon la la-leanpub'></i> Eventcategories</a></li>
		<li class='nav-item'><a class='nav-link' href='{{ backpack_url('organizer') }}'><i class='nav-icon la la-adn'></i> Organizers</a></li>
		<li class='nav-item'><a class='nav-link' href='{{ backpack_url('venue') }}'><i class='nav-icon la la-university'></i> Venues</a></li>
		<li class='nav-item'><a class='nav-link' href='{{ backpack_url('speaker') }}'><i class='nav-icon la la-user'></i> Speakers</a></li>
		<li class='nav-item'><a class='nav-link' href='{{ backpack_url('event') }}'><i class='nav-icon la la-tasks'></i> Events</a></li>
	</ul>
</li>

<li class="nav-item nav-dropdown">
	<a class="nav-link nav-dropdown-toggle" href="#"><i class="nav-icon la la-users"></i> Authentication</a>
	<ul class="nav-dropdown-items">
		<li class="nav-item"><a class="nav-link" href="{{ backpack_url('user') }}"><i class="nav-icon la la-user"></i> <span>Users</span></a></li>
		<li class="nav-item"><a class="nav-link" href="{{ backpack_url('role') }}"><i class="nav-icon la la-id-badge"></i> <span>Roles</span></a></li>
		<li class="nav-item"><a class="nav-link" href="{{ backpack_url('permission') }}"><i class="nav-icon la la-key"></i> <span>Permissions</span></a></li>
	</ul>
</li>
<!-- Users, Roles, Permissions -->
@elseif(backpack_user()->hasRole('Delivery'))
<li class="nav-item nav-dropdown">
	<a class="nav-link nav-dropdown-toggle" href="#"><i class="nav-icon la la-truck"></i> Delivery</a>
	<ul class="nav-dropdown-items">
		<li class='nav-item'><a class='nav-link' href='{{ backpack_url('delivery') }}'><i class='nav-icon la la-gift'></i> Delivery</a></li>
		<li class='nav-item'><a class='nav-link' href='{{ backpack_url('pricing') }}'><i class='nav-icon la la-calculator'></i> Pricings</a></li>
	</ul>
</li>
@endif
