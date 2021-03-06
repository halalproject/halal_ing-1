<style media="print" type="text/css">
	.printButton { display: none; }
</style>
<body>
	<form name="halal" enctype="multipart/form-data" autocomplete="off">
		<section class="body" style="">
			<!-- start: header -->
			<header class="header printButton" style="">
				<div class="logo-container">
					<a href="" class="logo">
						<img src="" height="35" alt="Halal Ingredient" />
                        <b>Halal Ingredient</b>
					</a>
					<div class="visible-xs toggle-sidebar-left" data-toggle-class="sidebar-left-opened" data-target="html" data-fire-event="sidebar-left-opened">
						<i class="fa fa-bars" aria-label="Toggle sidebar" style="cursor:pointer"></i>
					</div>
                    <div id="userbox" class="userbox1 visible-xs printButton"> Menu
                    	<figure class="profile-picture">

						</figure>
                        <a href="#" data-toggle="dropdown"></a>
						<div class="dropdown-menu" style="margin-left:-50px;width:250px">
							<div style="padding-left:10px"><br>
							@if(Auth::guard('client')->user())
							<span class="name"><b>{{ Auth::guard('client')->user()->company_name }}</b></span>
							@else
							<span class="name"><b>{{ Auth::guard('admin')->user()->company_name }}</b></span>
							@endif
							</div>

							<ul class="list-unstyled">
								<li class="divider"></li>
								<li>
									<a role="menuitem" tabindex="-1" href="/client/profile" data-toggle="modal" data-target="#myModal" data-backdrop="static"><i class="fa fa-user"></i> Profil Syarikat</a>
								</li>
								<li>
									<a role="menuitem" tabindex="-1" href="/client/password" data-toggle="modal" data-target="#myModal" data-backdrop="static"><i class="fa fa-key"></i> Tukar Kata Laluan</a>
								</li>
								<li title="Sila klik disini untuk log keluar daripada sistem">
									<a role="menuitem" tabindex="-1" href="/logout"><i class="fa fa-power-off"></i> Log Keluar</a>
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
								@if(\Request::is('client*'))
								<span class="name"><b>{{ Auth::guard('client')->user()->company_name }}</b></span>
								@else
								<span class="name"><b>{{ Auth::guard('admin')->user()->username }}</b></span>
								@endif
							</div>
							<i class="fa custom-caret"></i>
						</a>
						<div class="dropdown-menu">
							<ul class="list-unstyled">
								<li class="divider"></li>
								@php
								if(\Request::is('client*')){
									$path = 'client';
								} else {
									$path = 'jais';
								}
								@endphp
								<li>
									<a role="menuitem" tabindex="-1" href="/{{ $path }}/profile" data-toggle="modal" data-target="#myModal" data-backdrop="static">
										<i class="fa fa-user"></i> Profil
									</a>
								</li>
								<li>
									<a role="menuitem" tabindex="-1" href="/{{ $path }}/password" data-toggle="modal" data-target="#myModalm" data-backdrop="static">
										<i class="fa fa-key"></i> Tukar Kata Laluan
									</a>
								</li>
								<li title="Sila klik disini untuk log keluar daripada sistem">
									<a role="menuitem" tabindex="-1" href="/logout"><i class="fa fa-power-off"></i> Log Keluar</a>
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
						<div class="sidebar-title printButton">
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
									<li class="@if(\Request::is('client') || (\Request::is('jais')) || (\Request::is('jais/pengumuman'))) nav-expanded nav-active @endif">
										@if(\Request::is('client*'))
										<a href="/client/">
										@else
										<a href="/jais/">
										@endif
											<i class="fa fa-home" aria-hidden="true"></i>
											<span>Dashboard Utama</span>
										</a>
									</li>
									{{-- Client --}}
									@if(\Request::is('client*'))

									<li class="@if(\Request::is('client/permohonan*')) nav-expanded nav-active @endif">
										<a href="/client/permohonan">
											<i class="fa fa-list-alt" aria-hidden="true"></i>
											<span>Permohonan Ramuan</span>
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
											<i class="fa fa-trash-o" aria-hidden="true"></i>
											<span>Ramuan Yang Dihapuskan</span>
										</a>
									</li>

									@else {{-- Admin --}}

									@if(Auth::guard('admin')->user()->user_level <> 4)

									@if(Auth::guard('admin')->user()->user_level <> 2)
									<li class="@if(\Request::is('jais/permohonan*')) nav-expanded nav-active @endif">
										<a href="/jais/permohonan">
											<i class="fa fa-list-alt" aria-hidden="true"></i>
											<span>Senarai Permohonan</span>
										</a>
									</li>

									<li class="@if(\Request::is('jais/semak*')) nav-expanded nav-active @endif">
										<a href="/jais/semak">
										<i class="fa fa-retweet" aria-hidden="true"></i>
											<span>Proses Semakan</span>
										</a>
									</li>
									@endif

									@if (Auth::guard('admin')->user()->user_level <> 3)
									<li class="@if(\Request::is('jais/lulus*')) nav-expanded nav-active @endif">
										<a href="/jais/lulus">
										<i class="fa fa-check" aria-hidden="true"></i>
											<span>Proses Kelulusan</span>
										</a>
									</li>
									@endif

									<li class="@if(\Request::is('jais/tolak*')) nav-expanded nav-active @endif">
										<a href="/jais/tolak">
											<i class="fa fa-ban" aria-hidden="true"></i>
											<span>Permohonan Ditolak</span>
										</a>
									</li>
									@endif

									<li class="@if(\Request::is('jais/audit') || \Request::is('jais/audit/*')) nav-expanded nav-active @endif">
										<a href="/jais/audit">
											<i class="fa fa-folder" aria-hidden="true"></i>
											<span>Audit</span>
										</a>
									</li>

									<li class="@if(\Request::is('jais/syarikat*')) nav-expanded nav-active @endif">
										<a href="/jais/syarikat">
											<i class="fa fa-building" aria-hidden="true"></i>
											<span>Syarikat</span>
										</a>
									</li>

									@if (Auth::guard('admin')->user()->user_level == 1)
									<li class="@if(\Request::is('jais/staff*')) nav-expanded nav-active @endif">
										<a href="/jais/staff">
											<i class="fa fa-users" aria-hidden="true"></i>
											<span>Kakitangan</span>
										</a>
									</li>
									<li class="@if(\Request::is('jais/surat*')) nav-expanded nav-active @endif">
										<a href="/jais/surat">
											<i class="fa fa-envelope" aria-hidden="true"></i>
											<span>Surat Rujukan</span>
										</a>
									</li>
									<li class="@if(\Request::is('jais/sijil_halal*')) nav-expanded nav-active @endif">
										<a href="/jais/sijil_halal">
											<i class="fa fa-certificate" aria-hidden="true"></i>
											<span>Badan Persijilan Halal</span>
										</a>
                                    </li>
                                    <li class="@if(\Request::is('jais/auditrail*')) nav-expanded nav-active @endif">
										<a href="/jais/auditrail">
											<i class="fa fa-tasks" aria-hidden="true"></i>
											<span>Auditrail</span>
										</a>
									</li>
									@endif

									@endif
									<li>
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
