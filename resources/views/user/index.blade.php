@extends('user.layouts.app')

@section('title', 'Beranda')

@section('jumbotron')
<section id="hero-animated" class="hero-animated d-flex align-items-center">
    <div class="container d-flex flex-column justify-content-center align-items-center text-center position-relative" data-aos="zoom-out">
      <img src="https://img.freepik.com/free-vector/hand-drawn-pet-sitting-facebook-cover_23-2149776410.jpg?w=1380&t=st=1684060785~exp=1684061385~hmac=0d9c4ec50a8707940bb71a806007bfb3b80907cad6269b984f56c7b6edfca03d" class="img-fluid animated">
      <h2>Selamat Datang Di <span>Pet Clinic</span></h2>
      <p>Semua kebutuhan kesehatan hewan peliharaan anda ada disini.</p>
      <div class="d-flex">
        <a href="#about" class="btn-get-started scrollto">Mulai</a>
    </div>
    </div>
</section>
@endsection

@section('content')
    <!-- ======= Featured Services Section ======= -->
    <section id="featured-services" class="featured-services">
      <div class="container">

        <div class="row gy-4">

          <div class="col-xl-3 col-md-6 d-flex" data-aos="zoom-out">
            <div class="service-item position-relative">
              <div class="icon"><i class="bi bi-activity icon"></i></div>
              <h4><a href="#!" class="stretched-link">Terlengkap</a></h4>
              <p>Pet Clinic terlengkap di nusantara.</p>
            </div>
          </div><!-- End Service Item -->

          <div class="col-xl-3 col-md-6 d-flex" data-aos="zoom-out" data-aos-delay="200">
            <div class="service-item position-relative">
              <div class="icon"><i class="bi bi-bounding-box-circles icon"></i></div>
              <h4><a href="#!" class="stretched-link">Professional</a></h4>
              <p>Dokter hewan yang dijamin sangat professional dalam pekerjaan.</p>
            </div>
          </div><!-- End Service Item -->

          <div class="col-xl-3 col-md-6 d-flex" data-aos="zoom-out" data-aos-delay="400">
            <div class="service-item position-relative">
              <div class="icon"><i class="bi bi-calendar4-week icon"></i></div>
              <h4><a href="#!" class="stretched-link">Tepat Waktu</a></h4>
              <p>Tepat dalam melakukan tindakan.</p>
            </div>
          </div><!-- End Service Item -->

          <div class="col-xl-3 col-md-6 d-flex" data-aos="zoom-out" data-aos-delay="600">
            <div class="service-item position-relative">
              <div class="icon"><i class="bi bi-broadcast icon"></i></div>
              <h4><a href="#!" class="stretched-link">Kebersihan No.1</a></h4>
              <p>Tetap menjaga kebersihan tempat pemeriksaan hewan.</p>
            </div>
          </div><!-- End Service Item -->

        </div>

      </div>
    </section><!-- End Featured Services Section -->

    <!-- ======= Call To Action Section ======= -->
    <section id="about" class="cta">
        <div class="section-header">
            <h2>Tentang Kami</h2>
        </div>
        <div class="container" data-aos="zoom-out">
            <div class="row g-5">
                <div class="col-lg-8 col-md-6 content d-flex flex-column justify-content-center order-last order-md-first">
                    <h3>Tentang <em>Pet Clinic</em></h3>
                    <p> Perusahaan klinik hewan peliharaan kami adalah penyedia layanan kesehatan hewan peliharaan yang terpercaya dan berkualitas tinggi. Kami didirikan dengan tujuan untuk memberikan perawatan terbaik untuk hewan peliharaan, serta memberikan layanan yang dapat membantu para pemilik hewan peliharaan dalam merawat dan menjaga kesehatan hewan kesayangan mereka.</p>
                    <a class="cta-btn align-self-start" target="_blank" href="https://wa.me/6281218403864?text=Saya ingin konsultasi tentang hewan peliharaan saya.">Konsultasi Sekarang</a>
                </div>
                <div class="col-lg-4 col-md-6 order-first order-md-last d-flex align-items-center">
                    <div class="img">
                    <img src="assets_user/img/cta.jpg" alt="" class="img-fluid">
                    </div>
                </div>
            </div>

        </div>
    </section><!-- End Call To Action Section -->

    <!-- ======= Services Section ======= -->
    <section id="services" class="services">
      <div class="container" data-aos="fade-up">

        <div class="section-header">
          <h2>Layanan Kami</h2>
          <p>Layanan yang kami sediakan.</p>
        </div>

        <div class="row gy-5">

          @forelse ($services as $service)
          <div class="col-xl-4 col-md-6" data-aos="zoom-in" data-aos-delay="200">
            <div class="service-item">
              <div class="img">
                <img src="{{ asset('assets_admin/img_service/'.$service->image) }}" class="img-fluid" style="object-fit: cover; height: 300px; width: 100%" alt="">
              </div>
              <div class="details position-relative">
                <a href="#" class="stretched-link">
                  <h3>{{ $service->name }}</h3>
                </a>
                <p>{{ $service->description }}</p>
              </div>
            </div>
          </div><!-- End Service Item -->
          @empty
              
          @endforelse

        </div>

      </div>
    </section><!-- End Services Section -->    

    <!-- ======= Team Section ======= -->
    <section id="team" class="team">
      <div class="container" data-aos="fade-up">

        <div class="section-header">
          <h2>Dokter Kami</h2>
          <p>Dokter kami yang sangat professional dan berpengalaman.</p>
        </div>

        <div class="row gy-5">

          @forelse ($doctors as $doctor)
          <div class="col-xl-4 col-md-6 d-flex" data-aos="zoom-in" data-aos-delay="200">
            <div class="team-member">
              <div class="member-img">
                <img src="{{ asset('assets_admin/img_doctor/'.$doctor->photo) }}" class="img-fluid" style="object-fit: cover; height: 400px; width: 100%" alt="">
              </div>
              <div class="member-info">
                <h4>{{ $doctor->nama }}</h4>
                <span>{{ $doctor->keahlian }}</span>
              </div>
            </div>
          </div><!-- End Team Member -->
          @empty
              
          @endforelse

        </div>

      </div>
    </section><!-- End Team Section -->
@endsection