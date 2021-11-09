@extends('layouts.master')

@section('title')
    Create User
@endsection

@section('content')

<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h2 class="text-dark">Tambah User</h2>
        </div>

        <div class="section-body">
            <h2 class="section-title">D.Paragon</h2>
            <p class="section-lead">
              Halaman Tambah Data User
            </p>
            <div class="row">
                <div class="col-12">
                    <div class="card card-primary">
                        <form method="post" action="{{route('user.store')}}">
                            @csrf
                            <div class="card-body">
                                <div class="form-group">
                                    <label>Nama</label>
                                    <input type="text" name="name" class="form-control" required="" placeholder="Nama" required>
                                </div>
                                <div class="form-group">
                                 <label>Gender</label>
                                <select name="gender" class="form-control">
                                    <option >--Pilih--</option>
                                    <option name="laki-laki">Laki-Laki</option>
                                    <option name="perempuan">Perempuan</option>
                                </select>
                            </div>
                          
                            <div class="form-group">
                                <label>No Handphone</label>
                                <input type="text" name="no_hp" class="form-control" required="" placeholder="Masukkan no handphone">
                            </div>
                            
                                 <div class="form-group">
                                    <label>Email</label>
                                    <input type="email" name="email" class="form-control" required="" placeholder="Email" required>
                                </div>
                                <div class="form-group">
                                <label>Upload Foto</label>
                                <input type="file" name="foto" class="form-control" required="" required>
                            </div>
                                <div class="form-group">
                                    <label>Password</label>
                                    <input type="password" name="password" class="form-control" required="" placeholder="password" required>
                                </div>
                                <div class="form-group">
                                    <label>Role</label>
                                    <select class="form-control" name="role" required>
                                    	<option value="">Pilih Role</option>
                                    	<option value="admin">Admin</option>
                                    	<option value="customer">Customer</option>
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

@include('sweetalert::alert')