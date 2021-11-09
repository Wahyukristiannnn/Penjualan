@extends('layouts.master')

@section('title')
    User
@endsection

@section('')
    
@endsection

@section('content')

<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h2 class="text-dark">User</h2>
        </div>

        <div class="section-body">
            <h2 class="section-title">D.Paragon</h2>
            <p class="section-lead">
              Halaman Data User
            </p>
            <div class="row">
                <div class="col-12">
                    <div class="card card-primary">
                        <div class="card-header">
                            <a href="{{ route('user.create')}}" class="btn btn-success"><i class="fas fa-plus"></i> Tambah</a>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-striped" id="table_user">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Foto</th>
                                            <th>Nama</th>
                                            <th>No HP</th>
                                            <th>Email</th>
                                            <th>Role</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse ($user as $user)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                             <td><img src="foto/{{$user->foto}}" width="100px"> </td>
                                            <td>{{$user->name}}</td>
                                            <td>{{$user->no_hp}}</td>
                                            <td>{{$user->email}}</td>
                                            <td>{{$user->role}}</td>
                                            <td>
                                                <a href="{{route('user.edit', $user->id)}}" class="btn btn-warning"><i class="fas fa-pen"></i></a>
                                                <a href="{{route('user.destroy', $user->id)}}" class="btn btn-danger" onclick="return confirm('Anda Yakin Ingin Menghapus ?')" ><i class="fas fa-trash-alt"></i></a>
                                            </td>
                                        </tr>
                                        @empty
                                        <tr>
                                            <td colspan="3" class="text-center">Tidak ada data</td>
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

@include('sweetalert::alert')

@endsection

@push('scripts')
    
	<script type="text/javascript" language="javascript" src="https://cdn.datatables.net/1.10.25/js/jquery.dataTables.min.js"></script>
	<script type="text/javascript" language="javascript" src="https://cdn.datatables.net/1.10.25/js/dataTables.bootstrap4.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#table_user').DataTable();
        } );
    </script>

@endpush
