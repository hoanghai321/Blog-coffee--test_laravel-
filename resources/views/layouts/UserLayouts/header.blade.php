<div class="header-top">
	<div class="container">
		<div class="head-main">
			<a href="index.html"><img src="images/logo-1.png" alt="" /></a>
		</div>
	</div>
</div>
<div class="header">
	<div class="container">
		<div class="head">
			<div class="navigation">
				<span class="menu"></span>
				<ul class="navig">
					<li><a href="{{route('index')}}" class="active">Home</a></li>
					<li><a href="{{route('about')}}">About</a></li>
					<li>
						<div class="dropdown">
							<a class="btn btn-secondary dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-bs-toggle="dropdown" aria-expanded="false">
								Category
							</a>
							<ul class="dropdown-menu" aria-labelledby="dropdownMenuLink">
								<li><a class="dropdown-item" href="#"></a></li>
							</ul>
						</div>
					</li>
					&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;
					<script src="{{ asset('js/app.js') }}" defer></script>
					@guest
					@if (Route::has('login'))
					<li class="nav-item">
						<a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
					</li>
					@endif

					@if (Route::has('register'))
					<li class="nav-item">
						<a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
					</li>
					@endif
					@else
					<li class="nav-item dropdown">
						<a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
							Hello {{ Auth::user()->name }}
						</a>

						<div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
							<a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
								{{ __('Logout') }}
							</a>

							<form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
								@csrf
							</form>
						</div>
					</li>
					@endguest
				</ul>
			</div>
			<div class="header-right">
				<div class="search-bar">
					<input type="text" value="" placeholder="Search">
					<input type="submit" value="">
				</div>
				<ul>
					<li><a href="https://www.facebook.com/profile.php?id=100009744285303"><span class="fb"> </span></a></li>
				</ul>
			</div>
			<div class="clearfix"></div>
		</div>
	</div>
</div>

<script>
	$("span.menu").click(function() {
		$(" ul.navig").slideToggle("slow", function() {});
	});
</script>