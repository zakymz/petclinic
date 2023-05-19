@extends('admin.layouts.app')

@section('title', 'Layanan')

@section('content')
<div class="pagetitle">
  <section class="section">
    <div class="row">
      <div class="col-lg-12">

        <div class="card">
          <div class="card-body">
            <h5 class="card-title">Data Layanan</h5>
            <div class="col-12">
                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#basicModal">
                    Tambah Data
                </button>
            </div>
            <!-- Table with stripped rows -->
            <table class="table datatable">
              <thead>
                <tr>
                  <th scope="col">No</th>
                  <th scope="col">Cover</th>
                  <th scope="col">Nama</th>
                  <th scope="col">Deskripsi</th>
                  <th scope="col">Harga</th>
                  <th scope="col">Dibuat Oleh</th>
                  <th scope="col">Aksi</th>
                </tr>
              </thead>
              <tbody>
                @foreach ($services as $service)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>
                            <a data-fancybox="gallery" href="{{ asset('assets_admin/img_service/'.$service->image) }}">
                                <img src="{{ asset('assets_admin/img_service/'.$service->image) }}" alt="{{ $service->name }}" style="width: 50px;"> <br/>
                            </a>
                        </td>
                        <td>
                            
                            {{ $service->name }}
                        </td>
                        <td>{{ $service->description }}</td>
                        <td>Rp. {{ number_format($service->price) }}</td>
                        <td>{{ $service->relatedCreatedBy->name }}</td>
                        <td> 
                            <a href="{{ route('service.edit', $service->id) }}" class="btn btn-warning">Edit</a>
                            <a href="{{ route('service.delete', $service->id) }}" onclick="return confirm('Apakah kamu yakin ingin menghapus data ini?')" class="btn btn-danger">Hapus</a>
                        </td>
                    </tr>
                @endforeach
              </tbody>
            </table>
            <!-- End Table with stripped rows -->

          </div>
        </div>

      </div>
    </div>
</section>

<div class="modal fade" id="basicModal" tabindex="-1">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">Tambah Layanan</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <form action="{{ route('service.store') }}" enctype="multipart/form-data" method="post">
        @csrf
        <div class="modal-body">
            <div class="row">
                <div class="form-group col-md-6">
                    <label for="">Nama Layanan <span class="text-danger">*</span></label>
                    <input type="text" name="name" id="" required value="{{ old('name') }}" class="form-control">
                </div>
                <div class="form-group col-md-6">
                    <label for="">Harga <span class="text-danger">*</span></label>
                    <input type="number" name="price" required value="{{ old('price') }}" id="" class="form-control">
                </div>
                <div class="form-group col-md-12">
                    <label for="">Deskripsi <span class="text-danger">*</span></label>
                    <textarea name="description" class="form-control" required id="" cols="4" rows="3">{{ old('description') }}</textarea>
                </div>
                <div class="form-group col-md-12">
                    <label for="">Cover <span class="text-danger">*</span></label>
                    <input type="file" name="image" required id="" accept="image/*" class="form-control">
                </div>
            </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-primary">Tambah</button>
          </div>
        </form>
      </div>
    </div>
  </div><!-- End Basic Modal-->
@endsection