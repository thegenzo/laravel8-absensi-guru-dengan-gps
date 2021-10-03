<!-- Sidebar -->
		<div class="sidebar">
			<div class="sidebar-background"></div>
			<div class="sidebar-wrapper scrollbar-inner">
				<div class="sidebar-content">

					<ul class="nav">
						<li class="nav-item {{ Request::is('/') ? 'active' : '' }}">
							<a href="/">
								<i class="fas fa-home text-info"></i>
								<p>Dashboard</p>
							</a>
						</li>
						@if((auth()->user()->level == 'admin') || (auth()->user()->level == 'kepsek'))
                        <li class="nav-item {{ Request::is('admin') ? 'active' : '' }}">
							<a href="/admin">
								<i class="fas fa-user-shield text-secondary"></i>
								<p>Admin</p>
								<span class="badge badge-count badge-danger">{{ \App\Models\Admin::count() }}</span>
							</a>
						</li>
                        <li class="nav-item {{ Request::is('kepala-sekolah') ? 'active' : '' }}">
							<a href="/kepala-sekolah">
								<i class="fas fa-brain text-success"></i>
								<p>Kepala Sekolah</p>
								<span class="badge badge-count badge-danger">{{ \App\Models\KepalaSekolah::count() }}</span>
							</a>
						</li>
                        <li class="nav-item {{ Request::is('guru-pns') ? 'active' : '' }}">
							<a href="/guru-pns">
								<i class="fas fa-chalkboard-teacher text-danger"></i>
								<p>Guru PNS</p>
								<span class="badge badge-count badge-danger">{{ \App\Models\GuruPNS::count() }}</span>
							</a>
						</li>
                        <li class="nav-item {{ Request::is('guru-ptt') ? 'active' : '' }}">
							<a href="/guru-ptt">
								<i class="fas fa-chalkboard-teacher text-warning"></i>
								<p>Guru GTT</p>
								<span class="badge badge-count badge-danger">{{ \App\Models\GuruPTT::count() }}</span>
							</a>
						</li>
						
						{{-- <li class="nav-item {{ (Request::is('laporan-absensi-pns')) || (Request::is('laporan-absensi-ptt')) ? 'show' : ''}} submenu">
							<a data-toggle="collapse" href="#base">
								<i class="fas fa-layer-group"></i>
								<p>Laporan Absensi</p>
								<span class="caret"></span>
							</a>
							<div class="collapse show" id="base">
								<ul class="nav nav-collapse">
									<li class="{{ Request::is('laporan-absensi-pns') ? 'active' : '' }}">
										<a href="../components/avatars.html">
											<span class="sub-item">Guru PNS</span>
										</a>
									</li>
									<li>
										<a href="{{ Request::is('laporan-absensi-ptt') ? 'active' : '' }}">
											<span class="sub-item">Guru PTT</span>
										</a>
									</li>
								</ul>
							</div>
						</li> --}}

						
						<li class="nav-item {{ (Request::is('laporan-absensi-pns')) || (Request::is('laporan-absensi-ptt')) ? 'active submenu' : ''}}">
							<a data-toggle="collapse" href="#tables">
								<i class="fas fa-table text-primary"></i>
								<p>Laporan Absensi</p>
								<span class="caret"></span>
							</a>
							<div class="collapse {{ (Request::is('laporan-absensi-pns')) || (Request::is('laporan-absensi-ptt')) ? 'show' : ''}}" id="tables">
								<ul class="nav nav-collapse">
									<li class="{{ Request::is('laporan-absensi-pns') ? 'active' : '' }}">
										<a href="/laporan-absensi-pns">
											<span class="sub-item">Guru PNS</span>
										</a>
									</li>
									<li class="{{ Request::is('laporan-absensi-ptt') ? 'active' : '' }}">
										<a href="/laporan-absensi-ptt">
											<span class="sub-item">Guru GTT</span>
										</a>
									</li>
								</ul>
							</div>
						</li>
						<li class="nav-item {{ Request::is('lokasi-sekolah') ? 'active' : '' }}">
							<a href="/lokasi-sekolah">
								<i class="fas fa-map-marker-alt text-success"></i>
								<p>Lokasi Sekolah</p>
							</a>
						</li>
						
						@endif
						@if (auth()->user()->level == 'guru_pns')
						<li class="nav-item {{ Request::is('absen-guru-pns') ? 'active' : '' }}">
							<a href="/absen-guru-pns">
								<i class="fas fa-clipboard-list text-warning"></i>
								<p>Absen Guru PNS</p>
							</a>
						</li>
						<li class="nav-item {{ Request::is('lokasi-anda') ? 'active' : '' }}">
							<a href="/lokasi-anda">
								<i class="fas fa-map-marker-alt text-success"></i>
								<p>Lokasi Anda</p>
							</a>
						</li>
						@endif

						@if (auth()->user()->level == 'guru_ptt')
						<li class="nav-item {{ Request::is('absen-guru-ptt') ? 'active' : '' }}">
							<a href="/absen-guru-ptt">
								<i class="fas fa-clipboard-list text-warning"></i>
								<p>Absen Guru GTT</p>
							</a>
						</li>
						<li class="nav-item {{ Request::is('lokasi-anda') ? 'active' : '' }}">
							<a href="/lokasi-anda">
								<i class="fas fa-map-marker-alt text-success"></i>
								<p>Lokasi Anda</p>
							</a>
						</li>
						@endif
					</ul>
				</div>
			</div>
		</div>
		<!-- End Sidebar -->