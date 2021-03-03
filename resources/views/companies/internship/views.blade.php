@extends('layouts.master')
@section('title_halaman', 'Daftar Magang')
@section('konten') 

<div class="row justify-content-center">
    <div class="row col-md-10 col-xl-10">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title" data-toggle="card-collapse">
                    <span class="bg-question">Daftar Magang</span>
                </h3>
            </div>
            <div class="card-body">
                <center>
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @elseif (session()->has('pesan'))
                    <div class="alert alert-success">
                        {{ session()->get('pesan') }}
                    </div>
                @endif
                    <table class="table table-hover table-bordered projects">
                        <thead>
                            <tr>
                                <td style="font-weight: bold; width:1%">#</td>
                                <td style="font-weight: bold">Title</td>
                                <td style="font-weight: bold">Kategori</td>
                                <td style="font-weight: bold">Kuota</td>
                                <td style="font-weight: bold">Deskripsi</td>
                                <td style="font-weight: bold">Aksi</td>
                            </tr>
                        </thead>
                        <tbody>
                                @php $no = 1; @endphp
                                @foreach ($perusahaan as $perusahaan)
                                <tr>
                                    <td class="align-middle text-center">{{ $no++ }}</td>
                                    <td class="align-middle text-center">{{ $perusahaan->title }}</td>
                                    <td class="align-middle text-center">{{ $perusahaan->kategori }}</td>
                                    <td class="align-middle text-center">{{ $perusahaan->apply }}/{{ $perusahaan->kuota }}</td>
                                    <td class="align-middle text-center">{{ $perusahaan->deskripsi }}</td>
                                    <td class="align-middle text-center">
                                        @if (\Auth::user()->role == "Admin")
                                            <li class="nav-item">
                                                <a href="javascript:void(0)" class="nav-link" data-toggle="dropdown"><i class="fa fa-cog"></i></a>
                                                <div class="dropdown-menu dropdown-menu-arrow">
                                                    <a href="{{ route('editInternshipViews', ['id' => $perusahaan->id]) }}" class="dropdown-item">Edit</a>
                                                    <div class="dropdown-divider"></div>
                                                    <a href="{{ route('deleteInternshipViews', ['id' => $perusahaan->id]) }}" class="dropdown-item">Hapus</a>
                                                </div>
                                            </li>
                                        @else
                                            <li class="nav-item">
                                                <a href="javascript:void(0)" class="nav-link" data-toggle="dropdown"><i class="fa fa-cog"></i></a>
                                                <div class="dropdown-menu dropdown-menu-arrow">
                                                    <a href="{{ route('mhsInternshipViews', ['id' => $perusahaan->id]) }}" class="dropdown-item">Daftar Mahasiswa</a>
                                                </div>
                                            </li>
                                        @endif
                                    </td>
                                </tr>
                                @endforeach
                        </tbody>
                    </table>
                </center><br>
                <div class="col-md-12">
                    <div class="float-left">
                        
                    </div>
                    <div class="float-right">
                        
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection