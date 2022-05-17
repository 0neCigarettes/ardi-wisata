<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Ardi Wisata</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="assets/img/favicon.png" rel="icon">
  <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.gstatic.com" rel="preconnect">
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="{{ url('template/assets/vendor/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet">
  <link href="{{ url('template/assets/vendor/bootstrap-icons/bootstrap-icons.css')}}" rel="stylesheet">
  <link href="{{ url('template/assets/vendor/boxicons/css/boxicons.min.css')}}" rel="stylesheet">
  <link href="{{ url('template/assets/vendor/quill/quill.snow.css')}}" rel="stylesheet">
  <link href="{{ url('template/assets/vendor/quill/quill.bubble.css')}}" rel="stylesheet">
  <link href="{{ url('template/assets/vendor/remixicon/remixicon.css')}}" rel="stylesheet">
  <link href="{{ url('template/assets/vendor/simple-datatables/style.css')}}" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="{{ url('template/assets/css/style.css')}}" rel="stylesheet">
  @yield('css')

	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
</head>

<body>

  <!-- ======= Header ======= -->
  @include('layouts.panel.header')
  <!-- End Header -->

  <!-- ======= Sidebar ======= -->
	@if(Auth::user()->role === 0)
  	@include('layouts.panel.sidebarAtasan')
	@elseif(Auth::user()->role === 1)
		@include('layouts.panel.sidebarAdmin')
	@elseif(Auth::user()->role === 2)
		@include('layouts.panel.sidebarTiket')
	@elseif(Auth::user()->role === 3)
		@include('layouts.panel.sidebarKasir')
	@endif

	<!-- End Sidebar-->

  <main id="main" class="main">

    @yield('content')

  </main><!-- End #main -->

  <!-- ======= Footer ======= -->
  {{-- <footer id="footer" class="footer">
    <div class="copyright">
      &copy; Copyright <strong><span>NiceAdmin</span></strong>. All Rights Reserved
    </div>
    <div class="credits">
      <!-- All the links in the footer should remain intact. -->
      <!-- You can delete the links only if you purchased the pro version. -->
      <!-- Licensing information: https://bootstrapmade.com/license/ -->
      <!-- Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/nice-admin-bootstrap-admin-html-template/ -->
      Designed by <a href="https://bootstrapmade.com/">BootstrapMade</a>
    </div>
  </footer><!-- End Footer --> --}}

  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Vendor JS Files -->
  <script src="{{ url('template/assets/vendor/apexcharts/apexcharts.min.js')}}"></script>
  <script src="{{ url('template/assets/vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
  <script src="{{ url('template/assets/vendor/chart.js/chart.min.js')}}"></script>
  <script src="{{ url('template/assets/vendor/echarts/echarts.min.js')}}"></script>
  <script src="{{ url('template/assets/vendor/quill/quill.min.js')}}"></script>
  <script src="{{ url('template/assets/vendor/simple-datatables/simple-datatables.js')}}"></script>
  <script src="{{ url('template/assets/vendor/tinymce/tinymce.min.js')}}"></script>
  <script src="{{ url('template/assets/vendor/php-email-form/validate.js')}}"></script>

  <!-- Template Main JS File -->
  <script src="{{ url('template/assets/js/main.js')}}"></script>
	<script src="https://unpkg.com/axios/dist/axios.min.js"></script>
	<script type="text/javascript" language="javascript">
		function konfirmasi (msg = 'Apakah Anda Yakin Menghapus Data ?') {
			var pilihan = confirm (msg);
			if (pilihan) {
				return true
			} else {
				alert ("Proses Di Batalkan")
				return false
			}
		}

		const formatRp = (num) => new Intl.NumberFormat('en-ID', {
				style: 'currency',
				currency: 'IDR'
			}).format(num)
			.replace(/[IDR]/gi, '')
			.replace(/(\.+\d{2})/, '')
			.trimLeft();

	</script>
  @yield('js')

</body>

</html>
