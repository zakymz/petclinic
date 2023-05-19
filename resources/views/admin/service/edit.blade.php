@extends('admin.layouts.app')

@section('title', 'Layanan')

@section('content')
<div class="pagetitle">
  <section class="section">
    <div class="row">
      <div class="col-lg-12">

        <div class="card">
          <div class="card-body">
            <h5 class="card-title">Edit Data Layanan {{ $service->name }} </h5>
            
            <form action="{{ route('service.update', $service->id) }}" enctype="multipart/form-data" method="post">
                @csrf
                <div class="row">
                    <div class="form-group col-md-6">
                        <label for="">Nama Layanan <span class="text-danger">*</span></label>
                        <input type="text" name="name" id="" required value="{{ $service->name }}" class="form-control">
                    </div>
                    <div class="form-group col-md-6">
                        <label for="">Harga <span class="text-danger">*</span></label>
                        <input type="number" name="price" required value="{{ $service->price }}" id="" class="form-control">
                    </div>
                    <div class="form-group col-md-12">
                        <label for="">Deskripsi <span class="text-danger">*</span></label>
                        <textarea name="description" class="form-control" required id="" cols="4" rows="3">{{ $service->description }}</textarea>
                    </div>
                    <div class="form-group col-md-12">
                        <label for="">Cover <span class="text-danger">*</span></label>
                        <input type="file" name="image" id="" accept="image/*" class="form-control">
                        <input type="hidden" name="image_lama" value="{{ $service->image }}">
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