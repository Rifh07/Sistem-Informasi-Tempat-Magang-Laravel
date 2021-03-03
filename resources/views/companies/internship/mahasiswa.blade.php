@extends('layouts.master')
@section('title_halaman', 'Daftar Mahasiswa')
@section('konten') 

<div class="row justify-content-center">
    <div class="row col-md-10 col-xl-10">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title" data-toggle="card-collapse">
                    <span class="bg-question">Daftar Mahasiswa</span>
                </h3>
            </div>
            <div class="card-body">
                <center>
                @if ($errors->any())
                    <div class="alert alert-danger">
                            @foreach ($errors->all() as $error)
                                {{ $error }}
                            @endforeach
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
                                <td style="font-weight: bold">NIM</td>
                                <td style="font-weight: bold">Nama Lengkap</td>
                                <td style="font-weight: bold">Email</td>
                                <td style="font-weight: bold">Jurusan</td>
                                <td style="font-weight: bold">Alamat</td>
                                <td style="font-weight: bold">Status</td>
                                <td style="font-weight: bold">Aksi</td>
                            </tr>
                        </thead>
                        <tbody>
                                @php $no = 1; @endphp
                                @foreach ($mhs as $mhs)
                                <tr>
                                    <td class="align-middle text-center">{{ $no++ }}</td>
                                    <td class="align-middle text-center">{{ $mhs->username }}</td>
                                    <td class="align-middle text-center">{{ $mhs->name }}</td>
                                    <td class="align-middle text-center">{{ $mhs->email }}</td>
                                    <td class="align-middle text-center">{{ $mhs->jurusan }}</td>
                                    <td class="align-middle text-center">{{ $mhs->alamat }}</td>
                                    <td class="align-middle text-center">{{ $mhs->status }}</td>
                                    <td class="align-middle text-center">
                                        @if ($mhs->status == "Disetujui")
                                            <li class="nav-item">
                                                <a href="javascript:void(0)" class="nav-link" data-toggle="dropdown"><i class="fa fa-cog"></i></a>
                                                <div class="dropdown-menu dropdown-menu-arrow">
                                                    <a href="{{ route('mhsInternshipDisapprove', ['id' => $id, 'mhs' => $mhs->username]) }}" class="dropdown-item">Tolak</a>
                                                </div>
                                            </li>
                                        @elseif ($mhs->status == "Ditolak")
                                            <li class="nav-item">
                                                <a href="javascript:void(0)" class="nav-link" data-toggle="dropdown"><i class="fa fa-cog"></i></a>
                                                <div class="dropdown-menu dropdown-menu-arrow">
                                                    <a href="{{ route('mhsInternshipApprove', ['id' => $id, 'mhs' => $mhs->username]) }}" class="dropdown-item">Setujui</a>
                                                </div>
                                            </li>
                                        @else
                                            <li class="nav-item">
                                                <a href="javascript:void(0)" class="nav-link" data-toggle="dropdown"><i class="fa fa-cog"></i></a>
                                                <div class="dropdown-menu dropdown-menu-arrow">
                                                    <a href="{{ route('mhsInternshipApprove', ['id' => $id, 'mhs' => $mhs->username]) }}" class="dropdown-item">Setujui</a>
                                                    <div class="dropdown-divider"></div>
                                                    <a href="{{ route('mhsInternshipDisapprove', ['id' => $id, 'mhs' => $mhs->username]) }}" class="dropdown-item">Tolak</a>
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