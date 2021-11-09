@extends('layouts.master')

@section('title')
    Dashboard
@endsection

@section('content')

<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h2 class="text-dark">Dashboard</h2>
        </div>
        <form action="" method="post">
  <div class="form-row" style="margin-bottom: 15px">
  @csrf
    <div class="col-2">
      <input type="date" name='dari' class="form-control" placeholder="Dari">
    </div>
    <div class="col-2">
      <input type="date" name="sampai" class="form-control" placeholder="Sampai">
    </div>
    <div class="col-2">
      <input type="submit" class="form-control btn btn-success" value="Filter">
    </div>
  </div>
</form>
        <div class="row">
           
           
            @if(Auth::user()->role == 'admin')
            <div class="col-lg-4 col-md-6 col-sm-6 col-12">
              <div class="card card-statistic-1">
                <div class="card-icon bg-success">
                  <i class="fas fa-money-bill"></i>
                </div>
                <div class="card-wrap">
                  <div class="card-header">
                    <h4>Total Penjualan</h4>
                  </div>
                  <div class="card-body">
                  <?php
                    
                    if(isset($_POST['dari'])){
                    	$dari = $_POST['dari'];
                    	$sampai= $_POST['sampai'];
                    	$jumlah_penjualan = DB::table('penjualan')
						->whereBetween('tanggal', [$dari, $sampai]) 
						 ->sum('penjualan.nominal');
					}else{
						$jumlah_penjualan = DB::table('penjualan')
						 ->sum('penjualan.nominal');
					}
                     
                   
                  ?>
                  Rp. {{ number_format($jumlah_penjualan),00 }}
                  </div>
                </div>
              </div>
            </div>
            @endif
             @if(Auth::user()->role == 'customer')
            <div class="col-lg-4 col-md-6 col-sm-6 col-12">
              <div class="card card-statistic-1">
                <div class="card-icon bg-success">
                  <i class="fas fa-money-bill"></i>
                </div>
                <div class="card-wrap">
                  <div class="card-header">
                    <h4>Total Penjualan</h4>
                  </div>
                  <div class="card-body">
                  <?php
                    $jumlah_penjualan = DB::table('penjualan')
                    	->where('id_user',Auth::user()->id)
                      ->sum('penjualan.nominal');
                   	
                  ?>
                  Rp. {{ number_format($jumlah_penjualan),00 }}
                  </div>
                </div>
              </div>
            </div>
            @endif
           
        </div>
        <div class="row mb-4">
          <div class="col-md-6">
              <div class="card card-primary">
                  <div class="card-header">
                      <h4>Selamat Datang, {{ Auth::user()->name }}!</h4>
                  </div>
                  @if(Auth::user()->role == 'admin')
                    <div class="card-body">
                        <p>Jika anda ingin segera melakukan entri penjualan silahkan klik dibawah ini</p>
                        <a href="{{route('penjualan.create')}}" class="btn btn-primary btn-pill">Entri Penjualan →</a>
                    </div>
                 @endif
              </div>
          </div>
        </div>
    </section>
</div>

@endsection