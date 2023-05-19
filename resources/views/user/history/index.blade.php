@extends('user.layouts.app')

@section('title', 'Riwayat')

@section('content')
<!-- ======= Breadcrumbs ======= -->
<div class="breadcrumbs">
    <div class="container">

      <div class="d-flex justify-content-between align-items-center">
        <h2>Riwayat</h2>
        <ol>
          <li><a href="{{ route('user.home') }}">Beranda</a></li>
          <li>Riwayat</li>
        </ol>
      </div>

    </div>
  </div><!-- End Breadcrumbs -->

    <!-- ======= Blog Section ======= -->
    <section id="blog" class="blog">
        <div class="container" data-aos="fade-up">
  
          <div class="row g-5">
  
            <div class="col-lg-12">
  
              <div class="row gy-4 posts-list">
  
                @forelse ($orders as $order)
                <div class="col-lg-4">
                    <article class="d-flex flex-column">
    
                      <div class="post-img">
                        <img src="{{ asset('assets_admin/img_service/'.$order->relatedService->image) }}" alt="" class="img-fluid">
                      </div>
    
                      <h2 class="title">
                        <a href="#!">{{ $order->relatedService->name }}, {{ $order->relatedPet->alias_name }} ({{ $order->relatedPet->name }})</a>
                      </h2>
    
                      <div class="meta-top">
                        <ul>
                          <li class="d-flex align-items-center"><i class="bi bi-person"></i> <a href="#!">{{ $order->relatedDoctor->nama }}</a></li>
                          <li class="d-flex align-items-center"><i class="bi bi-clock"></i> <a href="#!"><time datetime="2022-01-01">{{ \Carbon\Carbon::parse($order->date)->format('d F Y') }}</time></a></li>
                          {{-- <li class="d-flex align-items-center"><i class="bi bi-chat-dots"></i> <a href="#!">12 Comments</a></li> --}}
                        </ul>
                      </div>
    
                      {{-- <div class="content">
                        <p>
                          
                        </p>
                      </div> --}}
    
                      <div class="read-more mt-auto align-self-end">
                        {{-- <a href="#!">Read More</a> --}}
                        @if ($order->status == 'pending')
                                <span class="badge bg-warning">Pending</span>
                            @elseif ($order->status == 'proses')
                                <span class="badge bg-info">Proses</span>
                            @elseif ($order->status == 'selesai')
                                <span class="badge bg-success">Selesai</span>
                            @endif
                      </div>
    
                    </article>
                  </div><!-- End post list item -->
                @empty
                    <h1>Data Riwayat Kosong.</h1>
                @endforelse
  
              </div><!-- End blog posts list -->
  
              <div class="blog-pagination">
                {{ $orders->links() }}
              </div><!-- End blog pagination -->
  
            </div>
  
  
          </div>
  
        </div>
      </section><!-- End Blog Section -->
  
@endsection