@extends('layouts.master')
@section('konten') 

@foreach ($intern as $intern)
@section('title_halaman', "$intern->title")

<div class="row justify-content-center">
    @if ($errors->any())
        <div class="row col-md-8 col-xl-8">
            <div class="alert alert-danger col-md-12 col-xl-12">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        </div>
    @elseif (session()->has('pesan'))
        <div class="row col-md-8 col-xl-8">
            <div class="alert alert-success col-md-12 col-xl-12">
                {{ session()->get('pesan') }}
            </div>
        </div>
    @endif
    <div class="row col-md-8 col-xl-8">
        <div class="card">
            <div class="card-header justify-content-center text-center">
                <h3 class="card-title">
                    <br>
                    <img src="{{ asset('assets/images/logo/'.$intern->logo) }}" width="200px" alt="">
                    <br><br>
                    <span class="bg-question"><b>{{ $intern->title }}</b></span><br>
                    <p><b>{{ $intern->nama_perusahaan }}</b><br>
                    {{ $intern->alamat }} <br>
                    Kuota: {{ $intern->apply }} dari {{ $intern->kuota }} Orang</p>
                </h3>
            </div>
            <div class="card-body">
                <b>Deskripsi:</b> <br>
                <div>{{ $intern->deskripsi }}</div> <br>
                @if ($intern->kuota > $intern->apply)
                <form action="{{ route('applyInternship', ['id'=>$id]) }}" method="POST" class="text-center">
                    {{ csrf_field() }}
                    <input type="submit" class="btn round btn-success btn-min-width mr-1 mb-1" value="Apply">
                </form>
                @else
                <div class="text-center">
                    <input type="submit" class="btn round btn-success btn-min-width mr-1 mb-1" value="Apply" disabled="disabled">
                </div>
                @endif
            </div>
        </div>
    </div>
</div>
@endforeach
@endsection