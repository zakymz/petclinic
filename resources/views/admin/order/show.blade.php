@extends('admin.layouts.app')

@section('title', 'Detail Pesanan')

@section('content')
<div class="pagetitle">
  <section class="section">
    <div class="row">
      <div class="col-lg-12">

        <div class="card">
          <div class="card-body">
            <h5 class="card-title">Data Pesanan</h5>
          
            {{-- <a href="#modal-update" class="btn btn-primary" style="position: absolute; right: 10px; top: 10px">Update Status</a> --}}
            <div class="dropdown">
                <button class="btn btn-primary dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false" style="position: absolute; right: 0; top: -50px;">
                  Pengaturan Pesanan
                </button>
                <ul class="dropdown-menu">
                  <li><a class="dropdown-item" href="#modal-update" data-bs-toggle="modal">Update Status</a></li>
                  <li><a class="dropdown-item" href="{{ route('order.delete', $order->id) }}" onclick="return confirm('Apakah kamu yakin ingin menghapus data ini? Data yg dihapus tidak bisa dikembalikan!.')">Hapus Pesanan</a></li>
                </ul>
              </div>

            <div class="row">
                <div class="col-md-12">
                    <div class="row">
                        <div class="col-6">
                            <span class="text-bold">Pelanggan</span><br/>
                            {{ $order->relatedUser->name }} ({{ $order->relatedUser->phone_number ?? '-' }})
                        </div>
                        <div class="col-6" style="text-align: right;">
                            <span class="text-bold">Tanggal</span><br>
                            {{ \Carbon\Carbon::parse($order->date)->format('d F Y') }}
                        </div>
                    </div>
                </div>
                <div class="col-md-12 mt-3">
                    <div class="row">
                        <div class="col-6">
                            <span class="text-bold">Hewan Peliharaan</span><br/>
                            {{ $order->relatedPet->name }} ({{ $order->relatedPet->alias_name ?? '-' }})
                        </div>
                        <div class="col-6" style="text-align: right;">
                            @if ($order->status == 'pending')
                                <span class="badge bg-warning">Pending</span>
                            @elseif ($order->status == 'proses')
                                <span class="badge bg-info">Proses</span>
                            @elseif ($order->status == 'selesai')
                                <span class="badge bg-success">Selesai</span>
                            @endif
                        </div>
                    </div>
                </div>
                <div class="col-md-12 mt-3">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>Dokter</th>
                                <th>Layanan</th>
                                <th>Tgl</th>
                                <th>Qty</th>
                                <th>Subtotal</th>
                                <th>Total</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>{{ $order->relatedDoctor->nama }}</td>
                                <td>{{ $order->relatedService->name }}</td>
                                <td>{{ \Carbon\Carbon::parse($order->date)->format('d F Y') }}</td>
                                <td>{{ $order->qty }}</td>
                                <td>Rp. {{ number_format($order->subtotal) }} </td>
                                <td>Rp. {{ number_format($order->total) }}</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>

          </div>
        </div>

      </div>
      <div class="col-md-4">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">Data Dokter</h5>
                <div class="row">
                    <div class="col-6">
                        <p class="mb-0 mt-0 text-muted">Nama</p>
                        <p class="mb-0 mt-0 text-bold">{{ $order->relatedDoctor->nama }}</p>
                    </div>
                    <div class="col-6">
                        <p class="mb-0 mt-0 text-muted">Keahlian</p>
                        <p class="mb-0 mt-0 text-bold">{{ $order->relatedDoctor->keahlian }}</p>
                    </div>
                    <div class="col-6">
                        <p class="mb-0 mt-0 text-muted">Usia</p>
                        <p class="mb-0 mt-0 text-bold">{{ Carbon\Carbon::parse($order->relatedDoctor->tanggal_lahir)->age }} Tahun</p>
                    </div>
                    <div class="col-md-12">
                        <p class="mb-0 mt-0 text-muted">Foto</p>
                        <img src="{{ asset('assets_admin/img_doctor/'.$order->relatedDoctor->photo) }}" alt="{{ $order->relatedDoctor->nama }}" style="width: 100%;">
                    </div>
                </div>
            </div>
        </div>
      </div>
      <div class="col-md-4">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">Data Pelanggan</h5>
                <div class="row">
                    <div class="col-6">
                        <p class="mb-0 mt-0 text-muted">Nama</p>
                        <p class="mb-0 mt-0 text-bold">{{ $order->relatedUser->name }}</p>
                    </div>
                    <div class="col-6">
                        <p class="mb-0 mt-0 text-muted">Email</p>
                        <p class="mb-0 mt-0 text-bold">{{ $order->relatedUser->email }}</p>
                    </div>
                    <div class="col-6">
                        <p class="mb-0 mt-0 text-muted">No Hp</p>
                        <p class="mb-0 mt-0 text-bold">{{ $order->relatedUser->phone_number ?? '-' }}</p>
                    </div>
                </div>
            </div>
        </div>
      </div>
      <div class="col-md-4">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">Data Hewan Peliharaan</h5>
                <div class="row">
                    <div class="col-6">
                        <p class="mb-0 mt-0 text-muted">Nama</p>
                        <p class="mb-0 mt-0 text-bold">{{ $order->relatedPet->name }}</p>
                    </div>
                    <div class="col-6">
                        <p class="mb-0 mt-0 text-muted">Nama Alias</p>
                        <p class="mb-0 mt-0 text-bold">{{ $order->relatedPet->alias_name }}</p>
                    </div>
                    <div class="col-6">
                        <p class="mb-0 mt-0 text-muted">Usia</p>
                        <p class="mb-0 mt-0 text-bold">{{ $order->relatedPet->age }}</p>
                    </div>
                    <div class="col-6">
                        <p class="mb-0 mt-0 text-muted">Berat</p>
                        <p class="mb-0 mt-0 text-bold">{{ $order->relatedPet->weight }} Kg</p>
                    </div>
                    <div class="col-6">
                        <p class="mb-0 mt-0 text-muted">Tinggi</p>
                        <p class="mb-0 mt-0 text-bold">{{ $order->relatedPet->height }} Cm</p>
                    </div>
                    <div class="col-12">
                        <p class="mb-0 mt-0 text-muted">Keluhan</p>
                        <p class="mb-0 mt-0 text-bold">{{ $order->relatedPet->complaint }}</p>
                    </div>
                </div>
            </div>
        </div>
      </div>
    </div>
</section>

<div class="modal fade" id="modal-update" tabindex="-1">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">Update Status Pesanan</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <form action="{{ route('order.update', $order->id) }}" enctype="multipart/form-data" autocomplete="off" method="post">
        @csrf
        <div class="modal-body">
            <div class="row">
                <div class="form-group col-md-12">
                    <label for="">Status Pesanan <span class="text-danger">*</span></label>
                    <select name="status" class="form-control" required id="">
                        <option value="">Pilih Status Pesanan</option>
                        <option value="pending" {{ $order->status == 'pending' ? 'selected' : '' }}>Pending</option>
                        <option value="proses" {{ $order->status == 'proses' ? 'selected' : '' }}>Proses</option>
                        <option value="selesai" {{ $order->status == 'selesai' ? 'selected' : '' }}>Selesai</option>
                    </select>
                </div>

            </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
            <button type="submit" class="btn btn-primary">Update</button>
          </div>
        </form>
      </div>
    </div>
  </div><!-- End Basic Modal-->
@endsection