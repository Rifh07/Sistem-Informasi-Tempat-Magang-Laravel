@extends('layouts.master')
@section('title_halaman', 'Daftar Perusahaan')
@section('konten') 

<div class="row justify-content-center">
    <div class="row col-md-10 col-xl-10">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title" data-toggle="card-collapse">
                    <span class="bg-question">Daftar Perusahaan</span>
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
                                <td style="font-weight: bold">Logo</td>
                                <td style="font-weight: bold">Nama Perusahaan</td>
                                <td style="font-weight: bold">Jenis Usaha</td>
                                <td style="font-weight: bold">Alamat</td>
                                <td style="font-weight: bold">Telepon</td>
                                <td style="font-weight: bold">Aksi</td>
                            </tr>
                        </thead>
                        <tbody>
                                @php $no = 1; @endphp
                                @foreach ($perusahaan as $perusahaan)
                                <tr>
                                    <td class="align-middle text-center">{{ $no++ }}</td>
                                    <td class="align-middle text-center"> <img src="{{ asset('assets/images/logo/'.$perusahaan->logo) }}" width="50px"></td>
                                    <td class="align-middle text-center">{{ $perusahaan->nama_perusahaan }}</td>
                                    <td class="align-middle text-center">{{ $perusahaan->jenis_usaha }}</td>
                                    <td class="align-middle text-center">{{ $perusahaan->alamat }}</td>
                                    <td class="align-middle text-center">{{ $perusahaan->telp }}</td>
                                    <td class="align-middle text-center">
                                        @if (\Auth::user()->role == "Admin")
                                            <li class="nav-item">
                                                <a href="javascript:void(0)" class="nav-link" data-toggle="dropdown"><i class="fa fa-cog"></i></a>
                                                <div class="dropdown-menu dropdown-menu-arrow">
                                                    <a href="{{ route('viewsInternship', ['id' => $perusahaan->id]) }}" class="dropdown-item">Daftar Magang</a>
                                                    <a href="{{ route('addInternshipViews', ['id' => $perusahaan->id]) }}" class="dropdown-item">Tambah Magang</a>
                                                    <div class="dropdown-divider"></div>
                                                    <a href="{{ route('detailCompanyViews', ['id' => $perusahaan->id]) }}" class="dropdown-item">Detail Perusahaan</a>
                                                    <div class="dropdown-divider"></div>
                                                    <a href="{{ route('deleteCompanyViews', ['id' => $perusahaan->id]) }}" class="dropdown-item">Hapus Perusahaan</a>
                                                </div>
                                            </li>
                                        @else
                                            <li class="nav-item">
                                                <a href="javascript:void(0)" class="nav-link" data-toggle="dropdown"><i class="fa fa-cog"></i></a>
                                                <div class="dropdown-menu dropdown-menu-arrow">
                                                    <a href="{{ route('viewsInternship', ['id' => $perusahaan->id]) }}" class="dropdown-item">Daftar Magang</a>
                                                    <div class="dropdown-divider"></div>
                                                    <a href="{{ route('detailCompanyViews', ['id' => $perusahaan->id]) }}" class="dropdown-item">Detail Perusahaan</a>
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