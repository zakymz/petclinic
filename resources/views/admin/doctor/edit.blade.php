@extends('admin.layouts.app')

@section('title', 'Edit Dokter')

@section('content')
<div class="pagetitle">
  <section class="section">
    <div class="row">
      <div class="col-lg-12">

        <div class="card">
          <div class="card-body">
            <h5 class="card-title">Edit Dokter {{ $doctor->nama }} </h5>
            
            <form action="{{ route('doctor.update', $doctor->id) }}" enctype="multipart/form-data" method="post">
                @csrf
                <div class="row">
                    <div class="form-group col-md-12">
                        <label for="">Nama Dokter <span class="text-danger">*</span></label>
                        <input type="text" name="nama" id="" required value="{{ $doctor->nama }}" class="form-control">
                    </div>
                    <div class="form-group col-md-12 mt-3">
                        <label for="">Keahlian <span class="text-danger">*</span></label>
                        <input type="text" name="keahlian" required value="{{ $doctor->keahlian }}" id="" class="form-control">
                    </div>
                    <div class="form-group col-md-12 mt-3">
                        <label for="">Tanggal Lahir <span class="text-danger">*</span></label>
                        <input type="date" name="tanggal_lahir" required value="{{ $doctor->tanggal_lahir }}" id="" class="form-control">    
                    </div>
                    <div class="form-group col-md-12 mt-3">
                        <label for="">Foto <span class="text-danger">*</span></label>
                        <input type="file" name="photo" id="" accept="image/*" class="form-control">
                        <input type="hidden" name="photo_lama" value="{{ $doctor->photo }}">
                    </div>
                    <div class="col-md-12 mt-3">
                        <button type="submit" class="btn btn-primary btn-block">Update Data</button>
                    </div>
                </div>
            </form>
            <!-- End Table with stripped rows -->

          </div>
        </div>

      </div>
    </div>
</section>
@endsection