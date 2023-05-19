<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Pages / Login - NiceAdmin Bootstrap Template</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="assets_admin/img/favicon.png" rel="icon">
  <link href="assets_admin/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.gstatic.com" rel="preconnect">
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="assets_admin/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets_admin/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="assets_admin/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="assets_admin/vendor/quill/quill.snow.css" rel="stylesheet">
  <link href="assets_admin/vendor/quill/quill.bubble.css" rel="stylesheet">
  <link href="assets_admin/vendor/remixicon/remixicon.css" rel="stylesheet">
  <link href="assets_admin/vendor/simple-datatables/style.css" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="assets_admin/css/style.css" rel="stylesheet">
  <link rel="stylesheet" href="{{ asset('modules/izitoast/css/iziToast.min.css') }}">

  <!-- =======================================================
  * Template Name: NiceAdmin
  * Updated: Mar 09 2023 with Bootstrap v5.2.3
  * Template URL: https://bootstrapmade.com/nice-admin-bootstrap-admin-html-template/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
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
                  <img src="assets_admin/img/logo.png" alt="">
                  <span class="d-none d-lg-block">PetClinic</span>
                </a>
              </div><!-- End Logo -->

              <div class="card mb-3">

                <div class="card-body">

                  <div class="pt-4 pb-2">
                    <h5 class="card-title text-center pb-0 fs-4">Login</h5>
                    <p class="text-center small">Masukan Email Dan Password</p>
                  </div>

                  <form action="{{ route('authenticate') }}" method="POST" class="row g-3 needs-validation" novalidate>
                    @csrf
                    <div class="col-12">
                      <label for="yourUsername" class="form-label">Email</label>
                      <div class="input-group has-validation">
                        {{-- <span class="input-group-text" id="inputGroupPrepend">@</span> --}}
                        <input type="email" name="email" class="form-control" id="yourUsername" placeholder="Masukan email" required>
                        <div class="invalid-feedback">Please enter your username.</div>
                      </div>
                    </div>

                    <div class="col-12">
                      <label for="yourPassword" class="form-label">Password</label>
                      <input type="password" name="password" class="form-control" placeholder="Masukan password" id="yourPassword" required>
                      <div class="invalid-feedback">Please enter your password!</div>
                    </div>

                    <div class="col-12">
                      <button class="btn btn-primary w-100" type="submit">Login</button>
                    </div>
                    {{-- <div class="col-12">
                      <p class="small mb-0">Don't have account? <a href="pages-register.html">Create an account</a></p>
                    </div> --}}
                  </form>

                </div>
              </div>

              <div class="credits">
                <!-- All the links in the footer should remain intact. -->
                <!-- You can delete the links only if you purchased the pro version. -->
                <!-- Licensing information: https://bootstrapmade.com/license/ -->
                <!-- Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/nice-admin-bootstrap-admin-html-template/ -->
                {{-- Designed by <a href="https://bootstrapmade.com/">BootstrapMade</a> --}}
              </div>

            </div>
          </div>
        </div>

      </section>

    </div>
  </main><!-- End #main -->

  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Vendor JS Files -->
  <script src="assets_admin/vendor/apexcharts/apexcharts.min.js"></script>
  <script src="assets_admin/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="assets_admin/vendor/chart.js/chart.umd.js"></script>
  <script src="assets_admin/vendor/echarts/echarts.min.js"></script>
  <script src="assets_admin/vendor/quill/quill.min.js"></script>
  <script src="assets_admin/vendor/simple-datatables/simple-datatables.js"></script>
  <script src="assets_admin/vendor/tinymce/tinymce.min.js"></script>
  <script src="assets_admin/vendor/php-email-form/validate.js"></script>

  <!-- Template Main JS File -->
  <script src="assets_admin/js/main.js"></script>
  <script src="{{ asset("modules/izitoast/js/iziToast.min.js") }}"></script>

  @if(Session::has('message'))
    <script>
        iziToast.success({
            title: "{{ Session::get('title') }}",
            message: "{{ Session::get('message') }}",
            position: 'topRight'
        });
    </script>
    @endif

    @if(Session::has('error'))
    <script>
        iziToast.error({
            message: "{{ Session::get('error') }}",
            position: 'topRight'
        });
    </script>
    @endif

</body>

</html>