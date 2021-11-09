@extends('layouts.master')

@section('title')
    Update Penjualan
@endsection

@section('content')

<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h2 class="text-dark">Edit Penjualan</h2>
        </div>

        <div class="section-body">
            <h2 class="section-title">D.Paragon Store</h2>
            <p class="section-lead">
              Halaman Edit Data Penjualan
            </p>
            <div class="row">
                <div class="col-12 ">
                    <div class="card card-primary">
                        <form method="post" action="{{route('penjualan.update', $penjualan->kode_penjualan)}}">
                            @csrf
                            @method('put')
                            <div class="card-body">
                                
                                
                                
                                <div class="form-group">
                                    <label>Kode Penjualan</label>
                                    <input type="text" name="kode_penjualan" class="form-control" value="{{ $penjualan->kode_penjualan }}" required="" readonly>
                                </div>
                                <div class="form-group">
                                    <label>Customer</label>
                                    <select name="id_user" id="id_user" class="form-control">
                                        <option >--Pilih--</option>
                                        @foreach ($user as $item)
                                             <option value="{{ $item->id}}"
                                            @if($item->id == $penjualan->id_user)
                                                selected
                                            @endif
                                            >{{$item->name}}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                              
                                <div class="form-group">
                                    <label>Tanggal Pembayaran</label>
                                    <input type="date" value="{{ $penjualan->tanggal }}" name="tanggal" class="form-control" required="" placeholder="Masukkan Tanggal Pembayaran">
                                </div>
                                <div class="form-group">
                                    <label>Deskripsi</label>
                                    <input type="text" name="deskripsi" value="{{ $penjualan->deskripsi }}" class="form-control" required="" >
                                </div>
                                 <div class="form-group">
                                    <label>Nominal</label>
                                    <input type="text" name="nominal" value="{{ $penjualan->nominal }}" class="form-control" required="" >
                                </div>
                                <div class="form-group">
                                    <label>Metode Pembayaran</label>
                                    <select  name="metode_pembayaran" class="form-control">
                                        <option value="" >--Pilih--</option>
                                        <option selected>{{ $penjualan->metode_pembayaran }}</option>
                                        <option>Cash</option>
                                        <option>Gopay</option>
                                        <option>OVO</option>
                                        <option>BRI</option>
                                        <option>BCA</option>
                                        <option>MANDIRI</option>
                                    </select>
                                </div>
                                
                                
                                <div class="form-group">
                                    <button type="submit" class="btn btn-warning"><i class="fas fa-sync"></i>  Ubah</button>
                                    <a class="btn btn-primary" href="/penjualan"><i class="fas fa-times-circle"></i> Batal</a>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>

@endsection