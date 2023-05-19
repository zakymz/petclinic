@extends('admin.layouts.app')

@section('title', 'Edit Pelanggan')

@section('content')
<div class="pagetitle">
  <section class="section">
    <div class="row">
      <div class="col-lg-12">

        <div class="card">
          <div class="card-body">
            <h5 class="card-title">Edit Hewan Peliharaan {{ $pet->relatedUser->name }} </h5>
            
            <form action="{{ route('pet.update', $pet->id) }}" enctype="multipart/form-data" method="post">
                @csrf
                <div class="row">
                    <div class="form-group col-md-4 mt-3">
                        <label for="">Nama Hewan <span class="text-danger">*</span></label>
                        <input type="text" name="name" id="" required value="{{ $pet->name }}" class="form-control">
                    </div>
    
                    <div class="form-group col-md-4 mt-3">
                        <label for="">Nama Alias <span class="text-danger">*</span></label>
                        <input type="text" name="alias_name" id="" required value="{{ $pet->alias_name }}" placeholder="Contoh : Puppy" class="form-control">
                    </div>
    
                    <div class="form-group col-md-4 mt-3">
                        <label for="">Usia Hewan <span class="text-danger">*</span></label>
                        <input type="text" name="age" id="" required value="{{ $pet->age }}" class="form-control">
                    </div>
    
                    <div class="form-group col-md-4 mt-3">
                        <label for="">Berat Badan Hewan <span class="text-danger">*</span></label>
                        <input type="number" name="weight" id="" required value="{{ $pet->weight }}" class="form-control">
                    </div>
    
                    <div class="form-group col-md-4 mt-3">
                        <label for="">Tinggi Badan Hewan <span class="text-danger">*</span></label>
                        <input type="number" name="height" id="" required value="{{ $pet->height }}" class="form-control">
                    </div>
    
                    <div class="form-group col-md-4 mt-3">
                        <label for="">Keluhan <span class="text-danger">*</span></label>
                        <textarea name="complaint" class="form-control" id="" required cols="3" rows="3">{{ $pet->complaint }}</textarea>    
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