@extends('admin.layouts.app')

@section('title', 'Layanan')

@section('content')
<div class="pagetitle">
  <section class="section">
    <div class="row">
      <div class="col-lg-12">

        <div class="card">
          <div class="card-body">
            <h5 class="card-title">Data Dokter</h5>
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
                  <th scope="col">Foto</th>
                  <th scope="col">Nama</th>
                  <th scope="col">Keahlian</th>
                  <th>Usia</th>
                  <th scope="col">Tanggal Lahir</th>
                  <th scope="col">Dibuat Oleh</th>
                  <th scope="col">Aksi</th>
                </tr>
              </thead>
              <tbody>
                @foreach ($doctors as $doctor)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>
                            <a data-fancybox="gallery" href="{{ asset('assets_admin/img_doctor/'.$doctor->photo) }}">
                                <img src="{{ asset('assets_admin/img_doctor/'.$doctor->photo) }}" alt="{{ $doctor->nama }}" style="width: 50px;"> <br/>
                            </a>
                        </td>
                        <td>
                            {{ $doctor->nama }}
                        </td>
                        <td>{{ $doctor->keahlian }}</td>
                        <td>{{ Carbon\Carbon::parse($doctor->tanggal_lahir)->age }} Tahun</td>
                        <td>{{ $doctor->tanggal_lahir }}</td>
                        <td>{{ $doctor->relatedCreatedBy->name }}</td>
                        <td> 
                            <a href="{{ route('doctor.edit', $doctor->id) }}" class="btn btn-warning">Edit</a>
                            <a href="{{ route('doctor.delete', $doctor->id) }}" onclick="return confirm('Apakah kamu yakin ingin menghapus data ini?')" class="btn btn-danger">Hapus</a>
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
          <h5 class="modal-title">Tambah Dokter</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <form action="{{ route('doctor.store') }}" enctype="multipart/form-data" method="post">
        @csrf
        <div class="modal-body">
            <div class="row">
                <div class="form-group col-md-12">
                    <label for="">Nama Dokter <span class="text-danger">*</span></label>
                    <input type="text" name="nama" id="" required value="{{ old('nama') }}" class="form-control">
                </div>
                <div class="form-group col-md-12 mt-3">
                    <label for="">Keahlian <span class="text-danger">*</span></label>
                    <input type="text" name="keahlian" required value="{{ old('keahlian') }}" id="" class="form-control">
                </div>
                <div class="form-group col-md-12 mt-3">
                    <label for="">Tanggal Lahir <span class="text-danger">*</span></label>
                    <input type="date" name="tanggal_lahir" required value="{{ old('tanggal_lahir') }}" id="" class="form-control">    
                </div>
                <div class="form-group col-md-12 mt-3">
                    <label for="">Foto <span class="text-danger">*</span></label>
                    <input type="file" name="photo" required id="" accept="image/*" class="form-control">
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