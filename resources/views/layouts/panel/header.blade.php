<header id="header" class="header fixed-top d-flex align-items-center">

    <div class="d-flex align-items-center justify-content-between">
      <a href="#" class="logo d-flex align-items-center">
        <img src="{{ url('statics/img/logo.png')}}" alt="">
        <span class="d-none d-lg-block">Lembah Akasia</span>
      </a>
      <i class="bi bi-list toggle-sidebar-btn"></i>
    </div><!-- End Logo -->
		<h4 class="mt-2"><span class="badge rounded-pill bg-primary">{{$warungKasir ? $warungKasir->nama : ''}}</span></h4>
    <nav class="header-nav ms-auto">
      <ul class="d-flex align-items-center">
        <li class="nav-item dropdown pe-3">
          <a class="nav-link nav-profile d-flex align-items-center pe-0" href="#" data-bs-toggle="dropdown">
            <img width="80%" src="{{ Auth()->user() ? Auth()->user()->profile_photo_url : url('statics/icon/icon-user.png')}}" alt="Profile" class="rounded-circle">
            <span class="d-none d-md-block dropdown-toggle ps-2">{{Auth()->user()->name}}</span>
          </a><!-- End Profile Iamge Icon -->

          <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow profile">
            <li class="dropdown-header">
							<img width="40%" src="{{ url('statics/icon/icon-user.png')}}" alt="Profile">
              <h6>{{Auth()->user()->name}}</h6>
              <span>{{
							Auth()->user()->role === 0 ? 'Atasan'
							: (Auth()->user()->role === 1 ? 'Admin'
							: (Auth()->user()->role === 2 ? 'Pegawai Tiket'
							: 'Pegawai Kasir'))
							}}</span><br>
							<span class="badge rounded-pill bg-primary">{{$warungKasir ? $warungKasir->nama : ''}}</span>
            </li>
            <li>
              <hr class="dropdown-divider">
            </li>
            <li>
              <hr class="dropdown-divider">
            </li>

            <li>
							<!-- Authentication -->
								<a class="dropdown-item d-flex align-items-center"
									href="{{ route('logout') }}"
									onclick="event.preventDefault();
                  document.getElementById('logout-form').submit();
									"
								>
								<form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
										@csrf
								</form>
									<i class="bi bi-box-arrow-right"></i>
									<span>Log-Out</span>
								</a>
            </li>

          </ul><!-- End Profile Dropdown Items -->
        </li><!-- End Profile Nav -->

      </ul>
    </nav><!-- End Icons Navigation -->

  </header>
