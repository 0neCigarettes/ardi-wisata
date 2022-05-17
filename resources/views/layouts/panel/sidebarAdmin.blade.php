<aside id="sidebar" class="sidebar">
	<ul class="sidebar-nav" id="sidebar-nav">
		<li class="nav-item">
			<a class="nav-link collapsed" href="{{ route('adminDashboard')}}">
				<i class="bi bi-grid"></i>
				<span>Dashboard</span>
			</a>
		</li>
		<li class="nav-item">
			<a class="nav-link collapsed" data-bs-target="#components-nav" data-bs-toggle="collapse" href="#">
				<i class="bi bi-gear"></i><span>Tiket & Parkir</span><i class="bi bi-chevron-down ms-auto"></i>
			</a>
			<ul id="components-nav" class="nav-content collapse" data-bs-parent="#sidebar-nav">
				<li>
					<a href="{{ route('admintiket')}}">
						<i class="bi bi-circle"></i><span>Tiket</span>
					</a>
				</li>
				<li>
					<a href="{{ route('adminParkir')}}">
						<i class="bi bi-circle"></i><span>Parkir</span>
					</a>
				</li>
			</ul>
		</li>
		<li class="nav-item">
			<a class="nav-link collapsed" href="{{ route('adminWarung')}}">
				<i class="bi bi-shop"></i>
				<span>Warung</span>
			</a>
		</li>
		<li class="nav-item">
			<a class="nav-link collapsed" href="{{ route('adminProduk')}}">
				<i class="bi bi-box-seam"></i>
				<span>Produk</span>
			</a>
		</li>
		<li class="nav-item">
			<a class="nav-link collapsed" href="{{ route('adminPegawai')}}">
				<i class="bi bi-people"></i>
				<span>Pegawai</span>
			</a>
		</li>
	</ul>
</aside>
