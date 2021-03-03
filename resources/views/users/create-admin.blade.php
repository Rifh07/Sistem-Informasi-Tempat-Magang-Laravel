@extends('layouts.master')
@section('title_halaman', 'Create Users')
@section('konten') 
<div class="row justify-content-center">
    <div class="col-md-8">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Create Users</h3>
                <div class="card-options">
                <a href="#" class="card-options-collapse" data-toggle="card-collapse"><i class="fe fe-chevron-up"></i></a>
                <a href="#" class="card-options-remove" data-toggle="card-remove"><i class="fe fe-x"></i></a>
                </div>
            </div>
            <div class="card-body">
            <form action="{{ route('createUsers') }}" method="POST">
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
                        <div class="row">
                            <div class="col-md-6 col-sm-6 col-xs-6">
                                <div class="form-group">
                                    <label for="projectinput5">Nama Lengkap<span class="form-required">*</span></label>
                                    <input class="form-control square @error('name') is-invalid @enderror" name="name" type="text"  require>
                                </div>
                            </div>
                            <div class="col-md-6 col-sm-6 col-xs-6">
                                <div class="form-group">
                                    <label for="userinput5">Username<span class="form-required">*</span></label>
                                    <input class="form-control square @error('username') is-invalid @enderror" name="username" type="text" require>
                                </div>
                            </div>
                        </div> 
                        <div class="row">
                            <div class="col-md-6 col-sm-6 col-xs-6">
                                <div class="form-group">
                                    <label for="projectinput5">E-mail  <span class="form-required">*</span></label>
                                    <input class="form-control square @error('email') is-invalid @enderror" name="email" type="email" require>
                                </div>
                            </div>
                            <div class="col-md-6 col-sm-6 col-xs-6">
                                <div class="form-group">
                                    <label for="projectinput5">Role</label>
                                    <select id="tipe" name="role" class="form-control square @error('role') is-invalid @enderror" require>
                                        <option value="0" selected disabled>== Silahkan Pilih ==</option>
                                        <option value="Admin">Admin</option>
                                        <option value="Kepala Program Studi">Kepala Program Studi</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6 col-sm-6 col-xs-6">
                                <div class="form-group">
                                    <label for="projectinput5">Nomor Telepon<span class="form-required">*</span></label>
                                    <input class="form-control square @error('telp') is-invalid @enderror" name="telp" type="text"  require>
                                </div>
                            </div>
                            <div class="col-md-6 col-sm-6 col-xs-6">
                                <div class="form-group">
                                    <label for="userinput5">Alamat<span class="form-required">*</span></label>
                                    <textarea class="form-control square @error('alamat') is-invalid @enderror" name="alamat" require></textarea>
                                </div>
                            </div>
                        </div> 
                        <div class="col-md-12 col-sm-12 col-xs-12">
                            <input type="submit" class="btn round btn-primary btn-min-width mr-1 mb-1" value="Create Users">
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection