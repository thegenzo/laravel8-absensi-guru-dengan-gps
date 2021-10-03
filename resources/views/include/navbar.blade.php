<!--
			Tip 1: You can change the background color of the main header using: data-background-color="blue | purple | light-blue | green | orange | red"
		-->
		<div class="main-header" data-background-color="light-blue">
			<!-- Logo Header -->
			<div class="logo-header">
				
				<a href="/" class="logo">
					<img src="{{ asset('/assets/img/tutwuri.png') }}" alt="navbar brand" class="navbar-brand" style="width: 50px; height: 50px; margin-left: 50px;">
				</a>
				<button class="navbar-toggler sidenav-toggler ml-auto" type="button" data-toggle="collapse" data-target="collapse" aria-expanded="false" aria-label="Toggle navigation">
					<span class="navbar-toggler-icon">
						<i class="fa fa-bars"></i>
					</span>
				</button>
				<button class="topbar-toggler more"><i class="fa fa-ellipsis-v"></i></button>
				<div class="navbar-minimize">
					<button class="btn btn-minimize btn-rounded">
						<i class="fa fa-bars"></i>
					</button>
				</div>
			</div>
			<!-- End Logo Header -->

			<!-- Navbar Header -->
			<nav class="navbar navbar-header navbar-expand-lg">
				
				<div class="container-fluid">
					<div class="collapse" id="search-nav">
						<form class="navbar-left navbar-form nav-search mr-md-3">
							<div class="input-group">
								<div class="input-group-prepend">
									
								</div>
							</div>
						</form>
						<h5 id="ct" class="text-white"></h5>
					</div>
					<ul class="navbar-nav topbar-nav ml-md-auto align-items-center">

						<li class="nav-item dropdown hidden-caret">
							<a class="dropdown-toggle profile-pic" data-toggle="dropdown" href="#" aria-expanded="false">
								<div class="avatar-sm">
									<img src="{{ asset('/assets/img/bg-404.jpeg') }}" alt="..." class="avatar-img rounded-circle">
								</div>
							</a>
							<ul class="dropdown-menu dropdown-user animated fadeIn">
								<li>
									<div class="user-box">
										<div class="avatar-lg"><img src="{{ asset('/assets/img/bg-404.jpeg') }}" alt="image profile" class="avatar-img rounded"></div>
										<div class="u-text">
											<h4>{{ auth()->user()->name }}</h4>
											<p class="text-muted">{{ auth()->user()->email }}</p>
											{{-- <a href="profile.html" class="btn btn-rounded btn-danger btn-sm">View Profile</a> --}}
										</div>
									</div>
								</li>
								<li>
									<div class="dropdown-divider"></div>
									{{-- <a class="dropdown-item" href="#">My Profile</a>
									<a class="dropdown-item" href="#">My Balance</a>
									<a class="dropdown-item" href="#">Inbox</a>
									<div class="dropdown-divider"></div>
									<a class="dropdown-item" href="#">Account Setting</a>
									<div class="dropdown-divider"></div> --}}
									<form action="/logout" method="POST">
										@csrf
										<button type="submit" class="dropdown-item">Logout</button>
									</form>
								</li>
							</ul>
						</li>
						
					</ul>
				</div>
			</nav>
			<!-- End Navbar -->
		</div>