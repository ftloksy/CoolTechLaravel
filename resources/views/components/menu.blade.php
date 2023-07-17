@php
use App\Http\Controllers\UserController;
@endphp

<!-- left hand sidebar, It is a dropdown menu -->
<div id="menu">
	@if (  Auth::check() )
		<div class="menutitle">{{ Auth::user()->name }}</div>
		<div class="menucontent">
			<div>
				<span><a class="menua" href={{ url('/logout') }}>Logout</a></span>
			</div>
		</div>
	@else
		<div class="menutitle">User Account</div>
			<div class="menucontent">
				<div>
					<span><a class="menua" href={{ url('/register') }}>Register</a></span>
				</div>
			<div>
				<span><a class="menua" href={{ url('/login') }}>Login</a></span>
			</div>
		</div>
	@endif

	<div class="menutitle">Category</div>
	<div class="menucontent">
		<div>
			<span><a class="menua" href={{ url('/category/all-artcle') }}>All artcle</a></span>
		</div>
		<div>
			<span><a class="menua" href={{ url('/category/tech-news') }}>Tech new</a></span>
		</div>
		<div>
			<span><a class="menua" href={{ url('/category/software-reviews') }}>Software reviews</a></span>
		</div>
		<div>
			<span><a class="menua" href={{ url('/category/hardware-reviews') }}>Hardware reviews</a></span>
		</div>
		<div>
			<span><a class="menua" href={{ url('/category/opinion-pieces') }}>Opinion pieces</a></span>
		</div>
	</div>


	<div class="menutitle">Tag</div>
	<div class="menucontent">

		@foreach ( UserController::get_tab_table() as $tag )
			<script>
			</script>
			<div>
				<span>
					<a class="menua" href="{{ url('/tag/' . $tag->tag_title ) }}">
						{{ $tag->tag_title }}
					</a>
				</span><span> ( {{ $tag->countArtcle }} )</span>
			</div>
		@endforeach
	</div>
	
	<x-book-mark/>

</div>
