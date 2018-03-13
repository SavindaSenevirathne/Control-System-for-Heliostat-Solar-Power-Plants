<nav class="navbar navbar-dark sticky-top bg-dark flex-md-nowrap p-0">
	<a class="navbar-brand col-sm-3 col-md-2 mr-0" href="#">Heliostat Solar Power Plants</a>
	<ul class="navbar-nav px-3">
		<li class="nav-item text-nowrap">
			<a href="{{ url('/logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();" class="nav-link" >
                        Logout
          	</a>		
          	<form id="logout-form" action="{{ url('/logout') }}" method="POST" style="display: none;">
	              {{ csrf_field() }}
         	</form>
		</li>
	</ul>
</nav>