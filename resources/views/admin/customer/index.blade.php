@extends('admin.layouts.app')

@section('title', 'Layanan')

@section('content')
<div class="pagetitle">
  <section class="section">
    <div class="row">
      <div class="col-lg-12">

        <div class="card">
          <div class="card-body">
            <h5 class="card-title">Data Pelanggan</h5>
            <div class="col-12">
                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#basicModal">
                    Tambah Pelanggan
                </button>
            </div>
            <!-- Table with stripped rows -->
            <table class="table datatable">
              <thead>
                <tr>
                  <th scope="col">No</th>
                  <th scope="col">Nama</th>
                  <th scope="col">Email</th>
                  <th scope="col">No HP</th>
                  <th scope="col">Aksi</th>
                </tr>
              </thead>
              <tbody>
                @foreach ($customers as $item)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $item->name }}</td>
                        <td>{{ $item->email }}</td>
                        <td>{{ $item->phone_number }}</td>
                        <td> 
                            <a href="{{ route('customer.edit', $item->id) }}" class="btn btn-warning">Edit</a>
                            {{-- <a href="{{ route('doctor.delete', $doctor->id) }}" onclick="return confirm('Apakah kamu yakin ingin menghapus data ini?')" class="btn btn-danger">Hapus</a> --}}
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
        <form action="{{ route('customer.store') }}" enctype="multipart/form-data" autocomplete="off" method="post">
        @csrf
        <div class="modal-body">
            <div class="row">
                <div class="col-12">
                    <h6>Data Pelanggan</h6>
                </div>
                <div class="form-group col-md-6 mt-3">
                    <label for="">Nama <span class="text-danger">*</span></label>
                    <input type="text" name="name" id="" required value="{{ old('name') }}" class="form-control">
                </div>
                <div class="form-group col-md-6 mt-3">
                    <label for="">Email <span class="text-danger">*</span></label>
                    <input type="email" name="email" required value="{{ old('email') }}" id="" class="form-control">
                </div>
                <div class="form-group col-md-6 mt-3">
                    <label for="">Password <span class="text-danger">*</span></label>
                    <input type="password" name="password" required value="{{ old('password') }}" id="" class="form-control">
                </div>
                <div class="form-group col-md-6 mt-3">
                    <label for="">No HP <span class="text-danger">*</span></label>
                    <input type="number" name="phone_number" required value="{{ old('phone_number') }}" id="" class="form-control">
                </div>

                <div class="col-12 mt-5">
                    <h6>Data Hewan Peliharaan</h6>
                </div>

                <div class="form-group col-md-4 mt-3">
                    <label for="">Nama Hewan</label>
                    <input type="text" name="pet_name" id="" value="{{ old('pet_name') }}" class="form-control">
                </div>

                <div class="form-group col-md-4 mt-3">
                    <label for="">Nama Alias</label>
                    <input type="text" name="alias_name" id="" value="{{ old('alias_name') }}" placeholder="Contoh : Puppy" class="form-control">
                </div>

                <div class="form-group col-md-4 mt-3">
                    <label for="">Usia Hewan</label>
                    <input type="text" name="age" id="" value="{{ old('age') }}" class="form-control">
                </div>

                <div class="form-group col-md-4 mt-3">
                    <label for="">Berat Badan Hewan</label>
                    <input type="number" name="weight" id="" value="{{ old('weight') }}" class="form-control">
                </div>

                <div class="form-group col-md-4 mt-3">
                    <label for="">Tinggi Badan Hewan</label>
                    <input type="number" name="height" id="" value="{{ old('height') }}" class="form-control">
                </div>

                <div class="form-group col-md-4 mt-3">
                    <label for="">Keluhan</label>
                    <textarea name="complaint" class="form-control" id="" cols="3" rows="3">{{ old('complaint') }}</textarea>    
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