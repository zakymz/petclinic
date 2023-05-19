<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Pet Clinic | @yield('title')</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="assets_user/img/favicon.png" rel="icon">
  <link href="assets_user/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&family=Poppins:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&family=Source+Sans+Pro:ital,wght@0,300;0,400;0,600;0,700;1,300;1,400;1,600;1,700&display=swap" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="{{ asset('assets_user/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
  <link href="{{ asset('assets_user/vendor/bootstrap-icons/bootstrap-icons.css') }}" rel="stylesheet">
  <link href="{{ asset('assets_user/vendor/aos/aos.css') }}" rel="stylesheet">
  <link href="{{ asset('assets_user/vendor/glightbox/css/glightbox.min.css') }}" rel="stylesheet">
  <link href="{{ asset('assets_user/vendor/swiper/swiper-bundle.min.css') }}" rel="stylesheet">

  <!-- Variables CSS Files. Uncomment your preferred color scheme -->
  <link href="{{ asset('assets_user/css/variables.css') }}" rel="stylesheet">
  <!-- <link href="assets_user/css/variables-blue.css" rel="stylesheet"> -->
  <!-- <link href="assets_user/css/variables-green.css" rel="stylesheet"> -->
  <!-- <link href="assets_user/css/variables-orange.css" rel="stylesheet"> -->
  <!-- <link href="assets_user/css/variables-purple.css" rel="stylesheet"> -->
  <!-- <link href="assets_user/css/variables-red.css" rel="stylesheet"> -->
  <!-- <link href="assets_user/css/variables-pink.css" rel="stylesheet"> -->

  <!-- Template Main CSS File -->
  <link href="{{ asset('assets_user/css/main.css') }}" rel="stylesheet">
  <link rel="stylesheet" href="{{ asset('modules/izitoast/css/iziToast.min.css') }}">

  <!-- =======================================================
  * Template Name: HeroBiz
  * Updated: Mar 10 2023 with Bootstrap v5.2.3
  * Template URL: https://bootstrapmade.com/herobiz-bootstrap-business-template/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>

<body>

  <!-- ======= Header ======= -->
  <header id="header" class="header fixed-top" data-scrollto-offset="0">
    @include('user.layouts.navbar')
  </header><!-- End Header -->

  @yield('jumbotron')

  <main id="main">

    @yield('content')

  </main><!-- End #main -->

  @if (Auth::user())
  <div class="modal fade" id="modal-setting" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h1 class="modal-title fs-5" id="exampleModalLabel">Pengaturan</h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <form action="{{ route('update.user', Auth::user()->id) }}" autocomplete="off" method="post"> @csrf
          <div class="modal-body">
            <div class="row">
              <div class="form-group col-md-12 mt-3">
                <label for="">Nama <span class="text-danger">*</span></label>
                <input type="text" name="" id="" required value="{{ Auth::user()->name }}" disabled class="form-control">
              </div>
              <div class="form-group col-md-12 mt-3">
                  <label for="">Email <span class="text-danger">*</span></label>
                  <input type="email" name="email" required value="{{ Auth::user()->email }}" id="" class="form-control">
              </div>
              <div class="form-group col-md-12 mt-3">
                  <label for="">Password <span class="text-danger">*</span></label>
                  <input type="password" name="password" value="" id="" class="form-control">
              </div>
            </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
            <button type="submit" class="btn btn-primary">Update</button>
          </div>
        </form>
      </div>
    </div>
  </div>

  @endif
  <!-- ======= Footer ======= -->
  <footer id="footer" class="footer">

    <div class="footer-legal text-center">
      <div class="container d-flex flex-column flex-lg-row justify-content-center justify-content-lg-between align-items-center">

        <div class="d-flex flex-column align-items-center align-items-lg-start">
          <div class="copyright">
            &copy; Copyright <strong><span>PetClinic</span></strong>
          </div>
          <div class="credits">
            <!-- All the links in the footer should remain intact. -->
            <!-- You can delete the links only if you purchased the pro version. -->
            <!-- Licensing information: https://bootstrapmade.com/license/ -->
            <!-- Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/herobiz-bootstrap-business-template/ -->
            {{-- Designed by <a href="https://bootstrapmade.com/">BootstrapMade</a> --}}
          </div>
        </div>

      </div>
    </div>

  </footer><!-- End Footer -->

  <a href="#" class="scroll-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <div id="preloader"></div>

  <!-- Vendor JS Files -->
  <script src="{{ asset('assets_user/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
  <script src="{{ asset('assets_user/vendor/aos/aos.js') }}"></script>
  <script src="{{ asset('assets_user/vendor/glightbox/js/glightbox.min.js') }}"></script>
  <script src="{{ asset('assets_user/vendor/isotope-layout/isotope.pkgd.min.js') }}"></script>
  <script src="{{ asset('assets_user/vendor/swiper/swiper-bundle.min.js') }}"></script>
  <script src="{{ asset('assets_user/vendor/php-email-form/validate.js') }}"></script>

  <!-- Template Main JS File -->
  <script src="{{ asset('assets_user/js/main.js') }}"></script>
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