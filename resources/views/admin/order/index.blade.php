@extends('admin.layouts.app')

@section('title', 'Layanan')

@section('content')
<div class="pagetitle">
  <section class="section">
    <div class="row">
      <div class="col-lg-12">

        <div class="card">
          <div class="card-body">
            <h5 class="card-title">Data Pesanan</h5>
            <div class="col-12">
                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#basicModal">
                    Buat Pesanan
                </button>
            </div>
            <!-- Table with stripped rows -->
            <table class="table datatable">
              <thead>
                <tr>
                  <th scope="col">No</th>
                  <th scope="col">Kode</th>
                  <th scope="col">Pelanggan</th>
                  <th scope="col">Hewan</th>
                  <th scope="col">Dokter</th>
                  <th scope="col">Layanan</th>
                  <th scope="col">Qty</th>
                  <th scope="col">Harga</th>
                  <th scope="col">Status</th>
                  <th scope="col">Aksi</th>
                </tr>
              </thead>
              <tbody>
                @foreach ($orders as $item)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $item->order_code }}</td>
                        <td>{{ $item->relatedUser->name }}</td>
                        <td>{{ $item->relatedPet->name }}</td>
                        <td>{{ $item->relatedDoctor->nama }}</td>
                        <td>{{ $item->relatedService->name }}</td>
                        <td>{{ $item->qty }}</td>
                        <td>Rp. {{ number_format($item->total) }}</td>
                        <td>
                            @if ($item->status == 'pending')
                                <span class="badge bg-warning">Pending</span>
                            @elseif ($item->status == 'proses')
                                <span class="badge bg-info">Proses</span>
                            @elseif ($item->status == 'selesai')
                                <span class="badge bg-success">Selesai</span>
                            @endif
                        </td>
                        <td> 
                            <a href="{{ route('order.show', $item->id) }}" class="btn btn-warning">Detail</a>
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
    <div class="modal-dialog modal-xl">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">Buat Pesanan Baru</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <form action="{{ route('order.store') }}" enctype="multipart/form-data" autocomplete="off" method="post">
        @csrf
        <div class="modal-body">
            <div class="row">
                <div class="col-md-12 mt-2 mb-2">
                    <h5>Data Pelanggan dan Hewan Peliharaan</h5>
                </div>
                <div class="col-md-6">
                    <div class="row">
                        <div class="col-md-6">
                            <label for="">Pelanggan <span class="text-danger">*</span></label>
                            <select name="user_id" class="form-control" required id="user_id">
                                <option value="">Pilih Pelanggan</option>
                                @foreach ($customers as $customer)
                                    <option value="{{ $customer->id }}">{{ $customer->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-md-6">
                            <label for="">Hewan <span class="text-danger">*</span></label>
                            <select name="pet_id" class="form-control" required id="pet_id">
                                <option value="">Pilih Pelanggan Dahulu</option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 mt-3">
                    <div class="row mb-3">
                        <label for="inputText" class="col-sm-4 col-form-label">Tanggal Pesan <span class="text-danger">*</span></label>
                        <div class="col-sm-8">
                          <input type="date" name="date" required class="form-control">
                        </div>
                    </div>
                </div>
                <div class="col-md-12 mt-2 mb-2">
                    <h5>Data Pesanan</h5>
                </div>
                <div class="col-md-12">
                    <div class="row">
                        <div class="col-md-3">
                            <label for="">Dokter <span class="text-danger">*</span></label>
                            <select name="doctor_id" class="form-control" required id="">
                                <option value="">Pilih Dokter</option>
                                @foreach ($doctors as $doctor)
                                    <option value="{{ $doctor->id }}">{{ $doctor->nama }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-md-3">
                            <label for="">Layanan <span class="text-danger">*</span></label>
                            <select name="service_id" class="form-control" required id="service_id">
                                <option value="">Pilih Layanan</option>
                                @foreach ($services as $service)
                                    <option value="{{ $service->id }}">{{ $service->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-md-3">
                            <label for="">Qty <span class="text-danger">*</span></label>
                            <input type="number" name="qty" value="1" id="" class="form-control">
                        </div>
                        <div class="col-md-3">
                            <label for="">Harga <span class="text-danger">*</span></label>
                            <input type="number" name="subtotal" id="subtotal" class="form-control">
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
            <button type="submit" class="btn btn-primary">Buat Pesanan</button>
        </div>
        </form>
      </div>
    </div>
  </div><!-- End Basic Modal-->
@endsection

@section('custom-js')
    <script>
        $(function() {
            $.ajaxSetup({
                headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') }
            });

            $('#user_id').on('change', function (){
                $.ajax({
                    url: '{{ route('pet.check') }}',
                    method: 'POST',
                    data: {id: $(this).val()},
                    success: function (response){
                        $('#pet_id').empty();
                        $('#pet_id').append('<option value="">Pilih Hewan</>');
                        $.each(response, function(id, alias_name){
                            $('#pet_id').append(new Option(id, alias_name));
                        });
                    }
                });
            });

            $('#service_id').on('change', function (){
                $.ajax({
                    url: '{{ route('service.check') }}',
                    method: 'POST',
                    data: {id: $(this).val()},
                    success: function (response){
                        $('#subtotal').empty();
                        console.log(response);
                        $.each(response, function(price, id){
                            // $('#pet_id').append(new Option(id, alias_name));
                            $('#subtotal').val(price);
                        });
                    }
                });
            });
        });
    </script>
@endsection