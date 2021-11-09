@extends('layouts.master')

@section('title')
    Update Profile
@endsection

@section('content')

<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h2 class="text-dark">Edit Profile</h2>
        </div>

        <div class="section-body">
            <h2 class="section-title">D.Paragon</h2>
            <p class="section-lead">
              Halaman Edit Data Profile
            </p>
            <div class="row">
                <div class="col-12">
                    <div class="card card-primary">
                    @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
                        <form method="post" action="{{route('user.updateprofile', Auth::user()->id)}}" enctype="multipart/form-data">
                            @csrf
                            @method('put')
                            <div class="card-body">
                                
                                <div class="form-group">
                                    <label>Nama</label>
                                    <input type="text" name="name" value="{{$user->name}}" class="form-control" required="" placeholder="Nama" required>
                                </div>
                                 <div class="form-group">
                                    <label>Email</label>
                                    <input type="email" name="email" value="{{$user->email}}" class="form-control" required="" placeholder="Email" required>
                                </div>
                                <div class="form-group">
                                    <label>No HP</label>
                                    <input type="text" name="no_hp" value="{{$user->no_hp}}" class="form-control" required="" placeholder="No HP" required>
                                </div>
                                <div class="form-group">
                                    <label>Gender</label>
                                    <select class="form-control" name="gender" required>
                                    	<option value="">Pilih</option>
                                    	<option value="laki-laki" <?php if($user->gender=='laki-laki'){ echo "selected"; } ?>>laki-laki</option>
                                    	<option value="perempuan" <?php if($user->gender=='perempuan'){ echo "selected"; } ?>>perempuan</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label>Foto</label>
                                    <input type="file" name="foto"  class="form-control" >
                                </div>
                                <div class="form-group">
                                    <label>Password</label>
                                    <input type="password" name="password" class="form-control" placeholder="password">
                                </div>
                              
                                <div class="form-group">
                                    <button type="submit" class="btn btn-warning"><i class="fas fa-sync"></i> Ubah</button>
                                    <a class="btn btn-primary" href="/user"><i class="fas fa-times-circle"></i> Batal</a>
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