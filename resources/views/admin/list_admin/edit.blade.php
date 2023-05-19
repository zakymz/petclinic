@extends('admin.layouts.app')

@section('title', 'Edit Admin')

@section('content')
<div class="pagetitle">
  <section class="section">
    <div class="row">
      <div class="col-lg-12">

        <div class="card">
          <div class="card-body">
            <h5 class="card-title">Edit Admin {{ $admin->name }} </h5>
            
            <form action="{{ route('admin.update', $admin->id) }}" enctype="multipart/form-data" method="post">
                @csrf
                <div class="row">
                    <div class="form-group col-md-6 mt-3">
                        <label for="">Nama <span class="text-danger">*</span></label>
                        <input type="text" name="name" id="" required value="{{ $admin->name }}" class="form-control">
                    </div>
                    <div class="form-group col-md-6 mt-3">
                        <label for="">Email <span class="text-danger">*</span></label>
                        <input type="email" name="email" required value="{{ $admin->email }}" id="" class="form-control">
                    </div>
                    <div class="form-group col-md-6 mt-3">
                        <label for="">Password <span class="text-danger">*</span></label>
                        <input type="password" name="password" value="" id="" class="form-control">
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