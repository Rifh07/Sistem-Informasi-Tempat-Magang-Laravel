@extends('layouts.master')
@section('title_halaman', 'Detail Perusahaan')
@section('konten') 
<div class="row justify-content-center">
    <div class="col-md-8">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Detail Perusahaan</h3>
                <div class="card-options">
                <a href="#" class="card-options-collapse" data-toggle="card-collapse"><i class="fe fe-chevron-up"></i></a>
                <a href="#" class="card-options-remove" data-toggle="card-remove"><i class="fe fe-x"></i></a>
                </div>
            </div>
            <div class="card-body">
            <form action="{{ route('editCompany', ['id' => $id]) }}" method="POST" enctype="multipart/form-data">
                {{ csrf_field() }}
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
                    <div class="form-body">
                        @foreach ($perusahaan as $perusahaan)
                        <div class="row">
                            <div class="col-md-6 col-sm-6 col-xs-6">
                                <div class="form-group">
                                    <label for="projectinput5">Nama Perusahaan<span class="form-required">*</span></label>
                                    <input class="form-control square @error('name') is-invalid @enderror" name="name" type="text"  value="{{ $perusahaan->nama_perusahaan }}" require>
                                </div>
                            </div>
                            <div class="col-md-6 col-sm-6 col-xs-6">
                                <div class="form-group">
                                    <label for="userinput5">E-mail<span class="form-required">*</span></label>
                                    <input class="form-control square @error('email') is-invalid @enderror" name="email" type="email" value="{{ $perusahaan->email }}" require>
                                </div>
                            </div>
                        </div> 
                        <div class="row">
                            <div class="col-md-6 col-sm-6 col-xs-6">
                                <div class="form-group">
                                    <label for="projectinput5">Nomor Telepon<span class="form-required">*</span></label>
                                    <input class="form-control square @error('telp') is-invalid @enderror" name="telp" type="number" value="{{ $perusahaan->telp }}" require>
                                </div>
                            </div>
                            <div class="col-md-6 col-sm-6 col-xs-6">
                                <div class="form-group">
                                    <label for="projectinput5">Jenis Usaha</label>
                                    <select name="jenis_usaha" class="form-control square @error('jenis_usaha') is-invalid @enderror" selected="{{ $perusahaan->jenis_usaha }}" require>
                                        <option value="0" selected disabled>== Silahkan Pilih ==</option>
                                        <option <?php if ($perusahaan->jenis_usaha =="UMKM") echo "selected" ?> value="UMKM">UMKM</option>
                                        <option <?php if ($perusahaan->jenis_usaha =="Pemerintahan") echo "selected" ?> value="Pemerintahan">Pemerintahan</option>
                                        <option <?php if ($perusahaan->jenis_usaha =="Industri Game Development") echo "selected" ?> value="Industri Game Development">Industri Game Development</option>
                                        <option <?php if ($perusahaan->jenis_usaha =="Industri Software Development") echo "selected" ?> value="Industri Software Development">Industri Software Development</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6 col-sm-6 col-xs-6">
                                <div class="form-group">
                                    <label for="userinput5">Alamat<span class="form-required">*</span></label>
                                    <textarea class="form-control square @error('alamat') is-invalid @enderror" name="alamat" require>{{ $perusahaan->alamat }}</textarea>
                                </div>
                            </div>
                            <div class="col-md-6 col-sm-6 col-xs-6">
                                <div class="form-group">
                                    <label for="projectinput5">Logo<span class="form-required">*</span></label>
                                    <input class="form-control square @error('logo') is-invalid @enderror" name="logo" type="file" require>
                                    <img src="{{ asset('assets/images/logo/'.$perusahaan->logo) }}" alt="">
                                </div>
                            </div>
                        </div> 
                        @endforeach
                        <div class="col-md-12 col-sm-12 col-xs-12">
                            <input type="submit" class="btn round btn-primary btn-min-width mr-1 mb-1" value="Simpan Detail Perusahaan">
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection