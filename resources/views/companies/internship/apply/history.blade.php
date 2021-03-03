@extends('layouts.master')
@section('konten') 
@section('title_halaman', 'History')

    <div class="row justify-content-center">
    @if(count($mhs) > 0)
        @foreach ($mhs as $mhs)
        @if ($mhs->kuota > $mhs->apply)
        <div class="col-md-8">
            <div class="card card card-collapsed">
                <div class="card-header">
                    <table width="100%">
                        <tr>
                            <td colspan="2">
                                <a href="{{ route('detailInternshipViews', ['id'=>$mhs->id]) }}" style="display: inline-block">
                                    <h3>{{ $mhs->title }} &nbsp;&nbsp;</h3>
                                </a>
                                @if ($mhs->status == "Disetujui")
                                    <span class="btn-success btn-sm">
                                @elseif ($mhs->status == "Ditolak")
                                    <span class="btn-danger btn-sm">
                                @else 
                                    <span class="btn-warning btn-sm">
                                @endif
                                        <small>{{ $mhs->status }}</small>
                                    </span>
                            </td>
                        </tr>
                        <tr>
                            <td><b>{{ $mhs->nama_perusahaan }}</b></td>
                        </tr>
                        <tr>
                            <td>{{ $mhs->jenis_usaha }}</td>
                            <td>Kuota: {{ $mhs->apply }} dari {{ $mhs->kuota }} Orang</td>
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