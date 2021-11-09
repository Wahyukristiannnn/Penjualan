@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Pendaftaran</div>

                <div class="card-body">
                    <form method="POST" enctype="multipart/form-data" action="{{ route('register') }}">
                        @csrf
                           
                            <div class="form-group">
                                <label>Nama</label>
                                <input type="text" name="name" class="form-control" required="" autocomplete="off" placeholder="Masukkan nama" required>
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
                                <input type="email" name="email" class="form-control" required="" autocomplete="off" placeholder="Masukkan email" required>
                            </div>
                            <div class="form-group">
                                <label>Upload Foto</label>
                                <input type="file" name="foto" class="form-control" required="" required>
                            </div>
                            <div class="form-group">
                                <label>Password</label>
                                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">
                                    @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                            </div>
                            <div class="form-group">
                                <label>Confirm Password</label>
                                    <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                            </div>
                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Register') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection



