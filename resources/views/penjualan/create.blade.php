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
            <h2 class="section-title">D.Paragon Store</h2>
            <p class="section-lead">
              Halaman Entri Penjualan
            </p>
            <div class="row">
                <div class="col-12">
                    <div class="card card-primary">
                        <form method="post" action="{{route('penjualan.store')}}">
                            @csrf
                            <div class="card-body">
                              <div class="form-group">
                                    <label>Kode Penjualan</label>
                                    <input type="text" name="kode_penjualan" class="form-control" value="{{ $kode }}" required="" readonly>
                                </div>
                                <div class="form-group">
                                    <label>Customer</label>
                                    <select name="id_user" id="id_user" class="form-control">
                                        <option >--Pilih--</option>
                                        @foreach ($user as $item)
                                            <option value="{{ $item->id}}">{{$item->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                              
                                <div class="form-group">
                                    <label>Tanggal Pembayaran</label>
                                    <input type="date" value="<?=date("Y-m-d")?>" name="tanggal" class="form-control" required="" placeholder="Masukkan Tanggal Pembayaran">
                                </div>
                                <div class="form-group">
                                    <label>Deskripsi</label>
                                    <input type="text" name="deskripsi" class="form-control" required="" >
                                </div>
                                 <div class="form-group">
                                    <label>Nominal</label>
                                    <input type="text" name="nominal" class="form-control" required="" >
                                </div>
                                <div class="form-group">
                                    <label>Metode Pembayaran</label>
                                    <select  name="metode_pembayaran" class="form-control">
                                        <option value="" >--Pilih--</option>
                                        <option>Cash</option>
                                        <option>Gopay</option>
                                        <option>OVO</option>
                                        <option>BRI</option>
                                        <option>BCA</option>
                                        <option>MANDIRI</option>
                                    </select>
                                </div>
                               
                                <div class="form-group">
                                    <button type="submit" class="btn btn-primary"><i class="fa fa-save"></i> Tambah</button>
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