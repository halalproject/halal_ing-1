<body>
	<form name="halal" method="post" action="" enctype="multipart/form-data" autocomplete="off">
		<section class="body" style="">
			<!-- start: header -->
			<header class="header" style="">
				<div class="logo-container">
					<a href="" class="logo">
						<img src="" height="35" alt="Halal Ingredient" />
                        <b>Halal Ingredient</b>
					</a> 
					<div class="visible-xs toggle-sidebar-left" data-toggle-class="sidebar-left-opened" data-target="html" data-fire-event="sidebar-left-opened">
						<i class="fa fa-bars" aria-label="Toggle sidebar" style="cursor:pointer"></i>
					</div>
                    <div id="userbox" class="userbox1 visible-xs"> Menu
                    	<figure class="profile-picture">
								
						</figure>
                        <a href="#" data-toggle="dropdown"></a>
						<div class="dropdown-menu" style="margin-left:-50px;width:250px">
							<div style="padding-left:10px"><br>
							<span class="name"><b>dasdadasdasdad</b></span>
							</div>
                            
							<ul class="list-unstyled">
								<li class="divider"></li>
								<li>
									<a role="menuitem" tabindex="-1" href="" 
										data-toggle="modal" data-target="#myModal"><i class="fa fa-key"></i> Tukar Kata Laluan</a>
								</li>
								<li title="Sila klik disini untuk log keluar daripada sistem">
									<a role="menuitem" tabindex="-1" href="logout"><i class="fa fa-power-off"></i> Log Keluar</a>
								</li>
							</ul>
						</div>
					</div>
				</div>
				<!-- start: search & user box -->
				<div class="header-right visible-lg">
					<div id="userbox" class="userbox  visible-lg">
						<a href="#" data-toggle="dropdown">
							<figure class="profile-picture">
								<img src="{{ asset('images/person.jpg') }}" alt="" class="img-circle" data-lock-picture="{{ asset('images/person.jpg') }}" />
							</figure>
							<div class="profile-info" data-lock-name="wwwww" data-lock-email="">
								<span class="name"><b>asdadasdasdasdadasdad</b></span>
							</div>
							<i class="fa custom-caret"></i>
						</a>
						<div class="dropdown-menu">
							<ul class="list-unstyled">
								<li class="divider"></li>
								<li>
									<a role="menuitem" tabindex="-1" href="" 
										data-toggle="modal" data-target="#myModal"><i class="fa fa-key"></i> Tukar Kata Laluan</a>
								</li>
								<!--<li>
									<a role="menuitem" tabindex="-1" href="#" data-lock-screen="true"><i class="fa fa-lock"></i> Kunci Paparan Skrin</a>
								</li>-->
								<li title="Sila klik disini untuk log keluar daripada sistem">
									<a role="menuitem" tabindex="-1" href="logout.php"><i class="fa fa-power-off"></i> Log Keluar</a>
								</li>
							</ul>
						</div>
					</div>
				</div>
                <div class="header-right1 visible-xs">
                </div>
				<!-- end: search & user box -->
			</header>
			<!-- end: header -->

			<div class="inner-wrapper">
				<!-- start: sidebar -->
				<aside id="sidebar-left" class="sidebar-left">
				
					<div class="sidebar-header">
						<div class="sidebar-title">
							<font color="white"><b>Menu Utama</b></font>
						</div>
						<div class="sidebar-toggle hidden-xs" data-toggle-class="sidebar-left-collapsed" data-target="html" data-fire-event="sidebar-left-toggle">
							<i class="fa fa-bars" aria-label="Toggle sidebar"></i>
						</div>
					</div>
				
					<div class="nano">
						<div class="nano-content">
							<nav id="menu" class="nav-main" role="navigation">
								<ul class="nav nav-main">
									<li class="@if(\Request::is('client')) nav-expanded nav-active @endif">
										<a href="/client/">
											<i class="fa fa-home" aria-hidden="true"></i>
											<span>Dashboard Utama</span>
										</a>
									</li>
									@if(\Request::is('client*'))
									<li class="@if(\Request::is('client/daftar*')) nav-expanded nav-active @endif">
										<a href="/client/daftar">
											<i class="fa fa-list-alt" aria-hidden="true"></i>
											<span>Permohonan Baru</span>
										</a>
									</li>

									<li class="@if(\Request::is('client/proses*')) nav-expanded nav-active @endif">
										<a href="/client/proses">
											<i class="fa fa-refresh" aria-hidden="true"></i>
											<span>Permohonan Diproses</span>
										</a>
									</li>
									<li class="@if(\Request::is('client/tolak*')) nav-expanded nav-active @endif">
										<a href="/client/tolak">
											<i class="fa fa-ban" aria-hidden="true"></i>
											<span>Permohonan Ditolak</span>
										</a>
									</li>
									<li class="@if(\Request::is('client/ramuan*')) nav-expanded nav-active @endif">
										<a href="/client/ramuan">
											<i class="fa fa-list" aria-hidden="true"></i>
											<span>Senarai Ramuan</span>
										</a>
									</li>    
									<li class="@if(\Request::is('client/hapus*')) nav-expanded nav-active @endif">
										<a href="/client/hapus">
											<i class="fa fa-folder" aria-hidden="true"></i>
											<span>Ramuan Yang Dihapuskan</span>
										</a>
									</li>

									@else
									
									<li class="@if(\Request::is('admin/syarikat*')) nav-expanded nav-active @endif">
										<a href="/admin/syarikat">
											<i class="fa fa-list-alt" aria-hidden="true"></i>
											<span>Syarikat</span>
										</a>
									</li>

									<li class="@if(\Request::is('admin/staff*')) nav-expanded nav-active @endif">
										<a href="/admin/staff">
											<i class="fa fa-list-alt" aria-hidden="true"></i>
											<span>Staff</span>
										</a>
									</li>

									@endif

									<li class="visible-xs">
										<a href="/logout">
											<i class="fa fa-power-off"></i>
											<span> Log Keluar</span>
										</a>
									</li>

								</ul>
								<br /><br /><br />
							</nav>
							
						</div>
				
					</div>
				
				</aside>
				<!-- end: sidebar -->