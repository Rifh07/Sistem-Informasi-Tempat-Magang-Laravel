@extends('layouts.master')
@section('konten') 
@section('title_halaman', 'Home')
    
    <div class="row justify-content-center">
        <div class="row col-md-8 col-xl-8">
            <div class="col-md-6  col-xl-6" >
                <div class="search-box m-r-30 d-none d-lg-block">
                    <form action="{{ route('searchType') }}" method="POST">
                        {{ csrf_field() }}
                        <div class="form-group">
                            <div class="input-group">
                                <select name="jenis_usaha" class="form-control square @error('jenis_usaha') is-invalid @enderror" require>
                                    <option value="0" selected disabled>== Silahkan Pilih ==</option>
                                    <option value="UMKM">UMKM</option>
                                    <option value="Pemerintahan">Pemerintahan</option>
                                    <option value="Industri Game Development">Industri Game Development</option>
                                    <option value="Industri Software Development">Industri Software Development</option>
                                </select>
                                <div class="input-group-append">
                                    <button class="btn btn-secondary btn-searchItem" type="submit"><i class="fe fe-search"></i></button>
                                </div>
                            </div>
                        </div>
                    </form>        
                </div>
            </div>
            <div class="col-md-6  col-xl-6 ">
                <div class="search-box m-r-30 d-none d-lg-block">
                    <form action="{{ route('search') }}" method="POST">
                        {{ csrf_field() }}
                        <div class="form-group">
                            <div class="input-group">
                                <input type="text" name="s" class="form-control @error('s') is-invalid @enderror" placeholder="Cari" value="{{ old('s') }}" required>
                                <div class="input-group-append">
                                    <button class="btn btn-secondary btn-searchItem" type="submit"><i class="fe fe-search"></i></button>
                                </div>
                            </div>
                        </div>
                    </form>        
                </div>
            </div>
        </div>
    </div> <br>

    <div class="row justify-content-center">
    @if(count($intern) > 0)
        @foreach ($intern as $intern)
        @if ($intern->kuota > $intern->apply)
        <div class="col-md-8">
            <div class="card card card-collapsed">
                <div class="card-header">
                    <table width="100%">
                        <tr>
                            <td cols="2"><a href="{{ route('detailInternshipViews', ['id'=>$intern->id]) }}"><h3>{{ $intern->title }}</h3></a> </td>
                        </tr>
                        <tr>
                            <td><b>{{ $intern->nama_perusahaan }}</b></td>
                        </tr>
                        <tr>
                            <td>{{ $intern->jenis_usaha }}</td>
                            <td width="20%">Kuota: {{ $intern->apply }} dari {{ $intern->kuota }} Orang</td>
                        </tr>
                    </table>
                    
                    
                </div>
            </div>
        </div>
        @endif
        @endforeach
    @else
        Data Tidak Ditemukan
    @endif
    <div class="col-md-12">
        <div class="float-right">
            
        </div>
    </div>
</div>
    
@endsection