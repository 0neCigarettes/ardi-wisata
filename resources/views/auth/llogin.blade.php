<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Lembah Akasia</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="{{ url('template/assets/img/favicon.png')}}" rel="icon">
  <link href="{{ url('template/assets/img/apple-touch-icon.png')}}" rel="apple-touch-icon">

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
  <link href="{{ url('template/assets/css/style.css" rel="stylesheet')}}">
</head>

<body>

  <main>
    <div class="container">

      <section class="section register min-vh-100 d-flex flex-column align-items-center justify-content-center py-4">
        <div class="container">
          <div class="row justify-content-center">
            <div class="col-lg-4 col-md-6 d-flex flex-column align-items-center justify-content-center">

              <div class="d-flex justify-content-center py-4">
                <a href="index.html" class="logo d-flex align-items-center w-auto">
                  <img width="160px" src="{{ url('statics/img/logo.jpg')}}" alt="">
                </a>
              </div><!-- End Logo -->

              <div class="card mb-3">

                <div class="card-body">

                  <div class="pt-4 pb-2">
										<h5 class="card-title text-center pb-0 fs-4">Login Akun Anda</h5>
                    <p class="text-center small">Masukan username & password untuk login</p>
										<x-jet-validation-errors class="mb-4" />
										@if (session('status'))
										<p class="text-center small">{{ session('status') }}</p>
												<div class="mb-4 font-medium text-sm text-green-600">
														{{ session('status') }}
												</div>
										@endif
                  </div>

                  <form class="row g-3 needs-validation" method="POST" action="{{ route('login') }}">
										@csrf
                    <div class="col-12">
                      <label for="email" class="form-label">Email</label>
                      <div class="input-group has-validation">
                        <span class="input-group-text" id="email"><i class="bx bx-user"></i></span>
												</span>
                        <input type="text" type="email" name="email" value="{{old('email')}}" class="form-control" id="email" required autofocus />
												@if (session('status'))
												<p class="text-center small">{{ session('status') }}</p>
														<div class="mb-4 font-medium text-sm text-green-600">
																{{ session('status') }}
														</div>
														<div class="invalid-feedback">{{ session('status') }}</div>
												@endif
                      </div>
                    </div>

                    <div class="col-12">
                      <label for="yourPassword" class="form-label">Password</label>
                      <input type="password" name="password" class="form-control" id="yourPassword" required autocomplete="current-password" />
                      <div class="invalid-feedback">Please enter your password!</div>
                    </div>

                    <div class="col-12">
                      <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="remember" value="true" id="rememberMe">
                        <label class="form-check-label" for="rememberMe">Simpan kata sandi</label>
                      </div>
                    </div>
                    <div class="col-12">
                      <button class="btn btn-primary w-100" type="submit">Login</button>
                    </div>
                  </form>

                </div>
              </div>

            </div>
          </div>
        </div>

      </section>

    </div>
  </main>

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

</body>

</html>
