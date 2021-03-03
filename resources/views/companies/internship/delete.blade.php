@extends('layouts.master')
@section('title_halaman', 'Hapus Magang')
@section('konten') 
<div class="row justify-content-center">
    <div class="col-md-8">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Hapus Magang</h3>
                <div class="card-options">
                <a href="#" class="card-options-collapse" data-toggle="card-collapse"><i class="fe fe-chevron-up"></i></a>
                <a href="#" class="card-options-remove" data-toggle="card-remove"><i class="fe fe-x"></i></a>
                </div>
            </div>
            <div class="card-body">
            <form action="{{ route('deleteInternship', ['id' => $id] ) }}" method="POST">
                {{ csrf_field() }}
                    <div class="form-body">
                        @foreach ($intern as $intern)
                        <div class="alert alert-danger">
                            Ingin Menghapus <b>{{ $intern->title }}</b> Dari <b>{{ $intern->nama_perusahaan }}</b>?
                        </div>
                        @endforeach
                        <div class="col-md-12 col-sm-12 col-xs-12">
                            <input type="submit" class="btn round btn-primary btn-min-width mr-1 mb-1" value="Hapus Magang">
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection