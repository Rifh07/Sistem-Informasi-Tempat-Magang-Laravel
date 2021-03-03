@extends('layouts.master')
@section('title_halaman', 'Tambah Magang')
@section('konten') 
<div class="row justify-content-center">
    <div class="col-md-8">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Tambah Magang</h3>
                <div class="card-options">
                <a href="#" class="card-options-collapse" data-toggle="card-collapse"><i class="fe fe-chevron-up"></i></a>
                <a href="#" class="card-options-remove" data-toggle="card-remove"><i class="fe fe-x"></i></a>
                </div>
            </div>
            <div class="card-body">
            <form action="{{ route('addInternship', ['id' => $id] ) }}" method="POST">
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
                                    <label for="projectinput5">Title<span class="form-required">*</span></label>
                                    <input class="form-control square @error('title') is-invalid @enderror" name="title" value="{{ old('title') }}" type="text"  require>
                                </div>
                            </div>
                            <div class="col-md-6 col-sm-6 col-xs-6">
                                <div class="form-group">
                                    <label for="userinput5">Kuota<span class="form-required">*</span></label>
                                    <input class="form-control square @error('kuota') is-invalid @enderror" name="kuota" value="{{ old('kuota') }}" type="number" require>
                                </div>
                            </div>
                        </div> 
                        <div class="row">
                            <div class="col-md-6 col-sm-6 col-xs-6">
                                <div class="form-group">
                                    <label for="userinput5">Kategori<span class="form-required">*</span></label>
                                    <input class="form-control square @error('kategori') is-invalid @enderror" name="kategori" value="{{ old('kategori') }}" type="text" require>
                                </div>
                            </div>
                            <div class="col-md-6 col-sm-6 col-xs-6">
                                <div class="form-group">
                                    <label for="userinput5">Deskripsi<span class="form-required">*</span></label>
                                    <textarea class="form-control square @error('deskripsi') is-invalid @enderror" name="deskripsi" value="{{ old('deskripsi') }}" require></textarea>
                                </div>
                            </div>
                        </div> 
                        <div class="col-md-12 col-sm-12 col-xs-12">
                            <input type="submit" class="btn round btn-primary btn-min-width mr-1 mb-1" value="Tambah Magang">
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection