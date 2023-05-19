@extends('admin.layouts.app')

@section('title', 'Beranda')

@section('content')
<div class="pagetitle">
    <h1>Dashboard</h1>
    <nav>
      <ol class="breadcrumb">
        <li class="breadcrumb-item active">Dashboard</li>
      </ol>
    </nav>
  </div><!-- End Page Title -->

  <section class="section dashboard">
    <div class="row">

      <!-- Left side columns -->
      <div class="col-lg-12">
        <div class="row">

          <!-- Sales Card -->
          <div class="col-xxl-4 col-md-6">
            <div class="card info-card sales-card">

              <div class="card-body">
                <h5 class="card-title">Pesanan <span>| Hari Ini</span></h5>

                <div class="d-flex align-items-center">
                  <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                    <i class="bi bi-cart"></i>
                  </div>
                  <div class="ps-3">
                    <h6>{{ $order }}</h6>
                    
                  </div>
                </div>
              </div>

            </div>
          </div><!-- End Sales Card -->

          <!-- Customers Card -->
          <div class="col-xxl-4 col-xl-12">
            <div class="card info-card customers-card">
              <div class="card-body">
                <h5 class="card-title">Pelanggan</h5>
                <div class="d-flex align-items-center">
                  <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                    <i class="bi bi-people"></i>
                  </div>
                  <div class="ps-3">
                    <h6>{{ $customer }}</h6>
                  </div>
                </div>
              </div>
            </div>
          </div>

          <div class="col-xxl-4 col-xl-12">
            <div class="card info-card customers-card">
              <div class="card-body">
                <h5 class="card-title">Hewan</h5>
                <div class="d-flex align-items-center">
                  <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                    <i class="ri-baidu-line"></i>
                  </div>
                  <div class="ps-3">
                    <h6>{{ $pet }}</h6>
                  </div>
                </div>
              </div>
            </div>
          </div>

          <div class="col-xxl-6 col-xl-12">
            <div class="card info-card customers-card">
              <div class="card-body">
                <h5 class="card-title">Dokter</h5>
                <div class="d-flex align-items-center">
                  <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                    <i class="ri-user-add-line"></i>
                  </div>
                  <div class="ps-3">
                    <h6>{{ $doctor }}</h6>
                  </div>
                </div>
              </div>
            </div>
          </div>

          <div class="col-xxl-6 col-xl-12">
            <div class="card info-card customers-card">
              <div class="card-body">
                <h5 class="card-title">Layanan</h5>
                <div class="d-flex align-items-center">
                  <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                    <i class="ri-file-list-line"></i>
                  </div>
                  <div class="ps-3">
                    <h6>{{ $service }}</h6>
                  </div>
                </div>
              </div>
            </div>
          </div>

        </div>
      </div><!-- End Left side columns -->



    </div>
</section>
@endsection