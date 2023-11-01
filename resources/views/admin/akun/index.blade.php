@extends('layout.app')
@section('title', 'dashboard')
@section('content')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-12">
                    <!--ini judul-->
                    <h3 class="text-center"> Manajemen Akun SAPMAS </h3>
                </div>
            </div>
        </div>
    </section>

    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <a href="{{ route('akun.create') }}" class="btn btn-md btn-success">Tambah Akun</a>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>Nama</th>
                                        <th>Email</th>
                                        <th>Password</th>
                                        <th>Role</th>
                                        <th class="text-center">Edit Akun</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($post as $akun)
                                        <tr>
                                            <td>{{ $akun->name }}</td>
                                            <td>{{ $akun->email }}</td>
                                            <td style="color: red">Terenkripsi</td>
                                            <td>{{ $akun->role }}</td>
                                            <td class="text-center">
                                                <form onsubmit="return confirm('Apakah Anda Yakin?');" action=""
                                                    method="POST">
                                                    <a href="" class="btn btn-sm btn-outline-primary">Edit</a>
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit"
                                                        class="btn btn-sm btn-outline-danger">Hapus</button>
                                                </form>
                                            </td>
                                        </tr>
                                    @empty
                                        <div class="alert alert-danger">
                                            Data Akun Belum Tersedia
                                        </div>
                                    @endforelse
                                </tbody>
                            </table>
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
            </div>
        </div>
        <!-- /.row -->
        </div><!-- /.container-fluid -->
    </section>
@endsection
