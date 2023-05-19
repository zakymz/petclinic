@extends('admin.layouts.app')

@section('title', 'Layanan')

@section('content')
<div class="pagetitle">
  <section class="section">
    <div class="row">
      <div class="col-lg-12">

        <div class="card">
          <div class="card-body">
            <h5 class="card-title">Data Hewan Peliharaan</h5>
            <div class="col-12">
                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#basicModal">
                    Tambah Hewan Peliharaan
                </button>
            </div>
            <!-- Table with stripped rows -->
            <table class="table datatable">
              <thead>
                <tr>
                  <th scope="col">No</th>
                  <th scope="col">Pelanggan</th>
                  <th scope="col">Nama</th>
                  <th scope="col">Nama Alias</th>
                  <th scope="col">Usia</th>
                  <th scope="col">Berat Badan</th>
                  <th scope="col">Tinggi Badan</th>
                  <th scope="col">Keluhan</th>
                  <th scope="col">Dibuat Oleh</th>
                  <th scope="col">Aksi</th>
                </tr>
              </thead>
              <tbody>
                @foreach ($pets as $item)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $item->relatedUser->name }}</td>
                        <td>{{ $item->name }}</td>
                        <td>{{ $item->alias_name }}</td>
                        <td>{{ $item->age }}</td>
                        <td>{{ $item->weight }} Kg</td>
                        <td>{{ $item->height }} Cm</td>
                        <td>{{ $item->complaint }}</td>
                        <td>{{ $item->relatedCreatedBy->name }}</td>
                        <td> 
                            <a href="{{ route('pet.edit', $item->id) }}" class="btn btn-warning">Edit</a>
                            <a href="{{ route('pet.delete', $item->id) }}" onclick="return confirm('Apakah kamu yakin ingin menghapus data ini?. Data yg dihapus tidak bisa dikembalikan!')" class="btn btn-danger">Hapus</a>
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
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">Tambah Pelanggan</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <form action="{{ route('pet.store') }}" enctype="multipart/form-data" autocomplete="off" method="post">
        @csrf
        <div class="modal-body">
            <div class="row">
                <div class="col-12 mt-5">
                    <h6>Data Hewan Peliharaan</h6>
                </div>

                <div class="form-group col-md-12 mt-3">
                    <label for="">Pelanggan <span class="text-danger">*</span></label>
                    <select name="user_id" class="form-control" required id="">
                        <option value="">Pilih Pelanggan</option>
                        @foreach ($customers as $customer)
                            <option value="{{ $customer->id }}">{{ $customer->name }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="form-group col-md-4 mt-3">
                    <label for="">Nama Hewan <span class="text-danger">*</span></label>
                    <input type="text" name="name" id="" required value="{{ old('name') }}" class="form-control">
                </div>

                <div class="form-group col-md-4 mt-3">
                    <label for="">Nama Alias <span class="text-danger">*</span></label>
                    <input type="text" name="alias_name" id="" required value="{{ old('alias_name') }}" placeholder="Contoh : Puppy" class="form-control">
                </div>

                <div class="form-group col-md-4 mt-3">
                    <label for="">Usia Hewan <span class="text-danger">*</span></label>
                    <input type="text" name="age" id="" required value="{{ old('age') }}" class="form-control">
                </div>

                <div class="form-group col-md-4 mt-3">
                    <label for="">Berat Badan Hewan <span class="text-danger">*</span></label>
                    <input type="number" name="weight" id="" required value="{{ old('weight') }}" class="form-control">
                </div>

                <div class="form-group col-md-4 mt-3">
                    <label for="">Tinggi Badan Hewan <span class="text-danger">*</span></label>
                    <input type="number" name="height" id="" required value="{{ old('height') }}" class="form-control">
                </div>

                <div class="form-group col-md-4 mt-3">
                    <label for="">Keluhan <span class="text-danger">*</span></label>
                    <textarea name="complaint" class="form-control" id="" required cols="3" rows="3">{{ old('complaint') }}</textarea>    
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