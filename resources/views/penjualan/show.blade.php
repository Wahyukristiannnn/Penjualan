@extends('layouts.master')

@section('title')
    History Pembayaran SPP
@endsection

@section('content')

<div class="main-content">
    <section class="section">
        <div class="card" style="width:100%;">
            <div class="card-body">
                <h2 class="card-title text-uppercase" style="color: black;">Detail History Pembayaran SPP — {{ $pembayaranspp->biodatasiswa['nama_siswa'] }} </h2>
                <hr>
                <p class="card-text"> Berikut adalah detail History Pembayaran SPP dari siswa yang bernama {{ $pembayaranspp->biodatasiswa['nama_siswa'] }} . Detail
                    meliputi NIS, SPP, Tahun Ajaran, Tanggal Pembayaran, Bulan Pembayaran.
                </p>
            </div>
        </div> 
        <div class="row mb-4">
            <div class="col-md-12">
                <div class="card card-primary">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-12">
                                <!-- Main content -->
                                <div class="invoice p-3 mb-3">
                                    <div class="col-sm-12 invoice-col text-center">
                                        <img src="{{ asset('assets/img/123.png') }}" alt="" width="80px"
                                            height="80px">
                                    </div>
                                    <br>
                                    <!-- info row -->
                                    <div class="row invoice-info">
                                            <div class="col-sm-12 invoice-col text-center">
                                            <address>
                                                <strong>PONDOK PESANTREN PERKEMAS</strong><br>
                                                Dusun Sidorejo Desa Branti Raya Kecamatan Natar Kabupaten Lampung Selatan<br>
                                                <!-- Telp./Fax. : (0251) 8242411 <br>
                                                e-mail : prohumasi@smkwikrama.sch.id <br>
                                                website : www.smkwikrama.sch.id -->
                                            </address>
                                        </div>
                                        <!-- /.col -->
                                        <!--  -->
                                        <!-- /.col -->
                                    </div>
                                    <!-- /.row -->

                                    <!-- Table row -->
                                </div>
                                <div class="card-body">
                                    <div class="table-responsive">
                                        <table class="table table-striped table-hover">
                                            <tbody>
                                                <tr>
                                                    <th>NIS</th>
                                                    <td>{{ $pembayaranspp->biodatasiswa['NIS'] }} - {{ $pembayaranspp->biodatasiswa['nama_siswa'] }}</td>
                                                </tr>
                                                <tr>
                                                    <th>Kelas</th>
                                                    <td>{{ $pembayaranspp->kelas['kelas'] }}</td>
                                                </tr>
                                                <tr>
                                                    <th>SPP</th>
                                                    <td>Rp. {{number_format ($pembayaranspp->spp['spp']) }}</td>
                                                </tr>
                                                <tr>
                                                    <th>Tahun Ajaran</th>
                                                    <td>{{ $pembayaranspp->tahunajaran['tahun'] }}</td>
                                                </tr>
                                                <tr>
                                                    <th>Tanggal Pembayaran</th>
                                                    <td>{{ $pembayaranspp->tanggal_pembayaran }}</td>
                                                </tr>
                                                <tr>
                                                    <th>Bulan Pembayaran</th>
                                                    <td>{{ $pembayaranspp->bulan }}</td>
                                                </tr>
                                                <tr>
                                                    <th>Status</th>
                                                    <td >
                                                        <i class="btn btn-success">{{$pembayaranspp->status}}</i>
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                        <!-- <a href="{{url('/pembayaran_spp_siswa')}}" class="btn btn-primary"><i class="	fas fa-arrow-left"></i> Kembali </a> -->
                                        <!-- <a href="" onclick="window.print()" class="btn btn-danger"  style="margin-left: 5px;"><i
                                                class="fas fa-print" ></i> Print</a> -->
                                        <!-- <a href="" onclick="window.pdf()" class="btn btn-primary" style="margin-left: 5px;"><i
                                                class="fas fa-download"></i> Generate PDF
                                        </a> -->
                                    </div>
                                </div>
                            </div>

                            <!-- this row will not appear when printing -->
                            <div class="row no-print" style="margin-top: 25px">
                            </div>
                        </div>
                        <!-- /.invoice -->
                    </div>
                </div>
                <!-- /.row -->
            </div>
            <!-- /.container-fluid -->
                   
            <!-- /.content -->
        </div>
    </section>
</div>
@endsection
