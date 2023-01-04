<div class="sidebar">
			<div class="sidebar-background"></div>
			<div class="sidebar-wrapper scrollbar-inner">
				<div class="sidebar-content">
					<div class="user">
						<div class="avatar-sm float-left mr-2">
							  @if ($profile->profile_picture === null)
									<img src="{{ asset('/template/img/boy.jpg') }}" alt="..." class="avatar-img rounded-circle">
                                    @else
                                    <img src="{{asset('/images/profile_picture/'.$profile->profile_picture)}}" alt="..." class="avatar-img rounded-circle">
                                    @endif
						</div>
						<div class="info">
							<a data-toggle="collapse" href="#collapseExample" aria-expanded="true">
								<span>
									{{ Auth::user()->name }}
									<span class="user-level">{{$user_position->position_name}}</span>
									<span class="caret"></span>
								</span>
							</a>
							<div class="clearfix"></div>

							<div class="collapse in" id="collapseExample">
								<ul class="nav">
									<li>
										<a href="/profile">
											<span class="link-collapse">My Profile</span>
										</a>
									</li>
									<li>
										<a href="/profile/{{ $profile->id }}/edit">
											<span class="link-collapse">Edit Profile</span>
										</a>
									</li>
									<li>
										<a href="#settings">
											<span class="link-collapse">Settings</span>
										</a>
									</li>
								</ul>
							</div>
						</div>
					</div>
					<ul class="nav">
						<li class="nav-item">
							<a href="/home">
								<i class="fas fa-home"></i>
								<p>Dashboard</p>
							</a>
						</li>
						<li class="nav-section">
							<span class="sidebar-mini-icon">
								<i class="fa fa-ellipsis-h"></i>
							</span>
							<h4 class="text-section">Menu</h4>
						</li>
						<li class="nav-item">
							<a data-toggle="collapse" href="#base">
                            <i class="fa-solid fa-users"></i>
								<p>Pegawai</p>
								<span class="caret"></span>
							</a>
							<div class="collapse" id="base">
								<ul class="nav nav-collapse">
									<li>
										<a href="/employee">
											<span class="sub-item">Lihat Semua Pegawai</span>
										</a>
									</li>
									<li>
										<a href="/employee/create">
											<span class="sub-item">Tambah Data Pegawai</span>
										</a>
									</li>
								</ul>
							</div>
						</li>
						<li class="nav-item">
							<a data-toggle="collapse" href="#forms">
                            <i class="fa-solid fa-chalkboard-user"></i>
								<p>Jabatan</p>
								<span class="caret"></span>
							</a>
							<div class="collapse" id="forms">
								<ul class="nav nav-collapse">
									<li>
										<a href="/position">
											<span class="sub-item">Lihat Jabatan</span>
										</a>
									</li>
									<li>
										<a href="/position/create">
											<span class="sub-item">Tambah Jabatan</span>
										</a>
									</li>

								</ul>
							</div>
						</li>
						<li class="nav-item">
							<a data-toggle="collapse" href="#tables">
							<i class="fa-solid fa-money-bill-wave"></i>
								<p>Gaji</p>
								<span class="caret"></span>
							</a>
							<div class="collapse" id="tables">
								<ul class="nav nav-collapse">
									<li>
										<a href="/salary">
											<span class="sub-item">Lihat Gaji Karyawan</span>
										</a>
									</li>
								</ul>
							</div>
						</li>
						<li class="nav-item">
							<a data-toggle="collapse" href="#maps">
                            <i class="fa-regular fa-calendar-days"></i>
								<p>Jam Kerja</p>
								<span class="caret"></span>
							</a>
							<div class="collapse" id="maps">
								<ul class="nav nav-collapse">
									<li>
										<a href="maps/googlemaps.html">
											<span class="sub-item">Jadwal Karyawan</span>
										</a>
									</li>
								</ul>
							</div>
						</li>
						<li class="nav-item">
							<a data-toggle="collapse" href="#custompages">
                            <i class="fa-regular fa-calendar"></i>
								<p>Absensi</p>
								<span class="caret"></span>
							</a>
							<div class="collapse" id="custompages">
								<ul class="nav nav-collapse">
									<li>
										<a href="login.html">
											<span class="sub-item">Absen Masuk</span>
										</a>
									</li>
									<li>
										<a href="login2.html">
											<span class="sub-item">Absen Keluar</span>
										</a>
									</li>
									<li>
										<a href="userprofile.html">
											<span class="sub-item">Riwayat Absensi</span>
										</a>
									</li>
								</ul>
							</div>
						</li>
					</ul>
				</div>
			</div>
		</div>
