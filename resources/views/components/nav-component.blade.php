<div class="nav-dark">
 <nav id="nav">
				<ul class="main-menu nav navbar-nav navbar-right">
					<li><a href="{{ url('/SkillsHub/home', []) }}">Home</a></li>
					<li class="dropdown">
						<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true"
							aria-expanded="false">Categories <span class="caret"></span></a>
						<ul class="dropdown-menu">
							@foreach ($cats as $cat)
							<li><a href="{{ url('SkillsHub/category/show', [$cat->id] ) }}">{{$cat->name}}</a></li>
							@endforeach
						</ul>
					</li>
					<li><a href="{{ url('/SkillsHub/contact', []) }} ">Contact</a></li>

					@if (!Auth::user())
					<li><a href="{{ url('/SkillsHub/login', []) }}">Sign In</a></li>
					<li><a href="{{ url('/SkillsHub/register', []) }}">Sign Up</a></li>
					@endif

					@if(Auth::user())

					@if(Auth::user()->role_id == 1) 
					<li><a href="{{ url('/SkillsHub/Profile', []) }}">Profile</a></li>
					@else 
					<li><a href="{{ url('/SkillsHub/Dashboard', []) }}">Dashboard</a></li>
					 @endif
					 
					<li><a href="{{ url('/SkillsHub/logout', []) }}">logOut</a></li>
					@endif

				</ul>
			</nav>
</div>
