@extends('layouts.master')

@section('title')
   Entri Penjualan
@endsection

@section('content')

<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h2 class="text-dark">Entri Penjualan</h2>
        </div>

        <div class="section-body">
            <h2 class="section-title">D.Paragon</h2>
            <p class="section-lead">
              Halaman Data Entri Penjualan
            </p>
            <div class="row">
                <div class="col-12">
                    <div class="card card-primary">
                        <div class="card-header">
                            <a href="{{ route('penjualan.create')}}" class="btn btn-success"><i class="fas fa-plus"></i> Tambah</a>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-striped" id="table_penjualan">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Kode Penjualan</th>
                                            <th>Nama</th>
                                            <th>No HP</th>
                                            <th>Gender</th>
                                            <th>Tanggal Order</th>
                                            <th>Deskripsi</th>
                                            <th>Metode Pembayaran</th>
                                            <th>Nominal</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse ($penjualan as $penjualan)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{$penjualan->kode_penjualan}}</td>
                                            <td>{{$penjualan->user['name']}}</td>
                                            <td>{{$penjualan->user['no_hp']}}</td>
                                            <td>{{$penjualan->user['gender']}}</td>
                                            <td>{{$penjualan->tanggal}}</td>
                                            <td>{{$penjualan->deskripsi}}</td>
                                            <td>{{$penjualan->metode_pembayaran}}</td>
                                            <td>Rp. {{number_format($penjualan->nominal)}}</td>
                                            <td>
                                                <a href="{{route('penjualan.edit', $penjualan->kode_penjualan)}}" class="btn btn-warning"><i class="fas fa-pen"></i></a>
                                                <a href="{{route('penjualan.destroy', $penjualan->kode_penjualan)}}" class="btn btn-danger" onclick="return confirm('Anda Yakin Ingin Menghapus ?')"><i class="fas fa-trash-alt"></i></a>
                                            </td>
                                        </tr>
                                        @empty
                                        <tr>
                                            <td colspan="12" class="text-center">Tidak ada data</td>
                                        </tr>
                                        @endforelse
                                    </tbody>
                                </table>
                            </div> 
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>

@endsection

@push('scripts')

    <script type="text/javascript" language="javascript" src="https://cdn.datatables.net/1.10.25/js/jquery.dataTables.min.js"></script>
	<script type="text/javascript" language="javascript" src="https://cdn.datatables.net/1.10.25/js/dataTables.bootstrap4.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#table_penjualan').DataTable();
        } );
    </script>

@endpush