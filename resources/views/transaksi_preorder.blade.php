@extends('adminlte::page')
@section('title', 'Transaksi || Omah Kunci')

@section('content_header')
    <h1 class="m-0 text-dark">Transaksi Pre-Order</h1>
    <link rel="stylesheet" href="{{ asset('css/toko_kunci/transaksi_preorder.css') }}">
    <link rel="stylesheet" href="{{ asset('css/open_sans.css') }}">
@stop
@section('content')
    <div class="row">
        <div class="col-6">
            <input class="search-box" type="text" placeholder="Cari riwayat transaksi...">
            <i class="fas fa-search ml-1 search-icon"></i>
        </div>
        <div class="col-6">
            <div class="row">
                <i class="fa fa-calendar calendar-transaksi" aria-hidden="true"></i>
                <p class="time">Jumat, 11 Februari 2022</p>
                <p class="times">16 : 44 : 56 WIB</p>
            </div>
        </div>
    </div>

    <div class="row mt-4">
        <h4 class="ml-3"><b>Hari Ini</b></h4>
    </div>

    <div class="row d-flex align-items-center justify-content-center mt-3">
        <div class="card">
            <table class="table table-borderless">
                <thead>
                    <tr class="text-center">
                        <th>No</th>
                        <th>Telah Diterima Dari</th>
                        <th>Total Tagihan</th>
                        <th>UP</th>
                        <th>Uang Sejumlah</th>
                        <th>Berupa</th>
                        <th>Guna Membayar</th>
                        <th>Waktu</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    <tr class="text-center">
                        <td id="addpad">005</td>
                        <td id="addpad">Johanes Sinalsal Purba</td>
                        <td id="addpad">Rp.300.000</td>
                        <td id="addpad">Rp.100.000</td>
                        <td id="addpad">Rp.100.000</td>
                        <td id="addpad">Tunai</td>
                        <td id="addpad">Belum Lunas</td>
                        <td id="addpad">27 Januari 2021, 10:30 WIB</td>
                        <td id="addpad"><a href="#"><i class="fa fa-list list-icon"></i></a></td>
                    </tr>
                </tbody>
            </table>
            {{--  --}}
        </div>
        <div class="card">
            <table class="table table-borderless">
                <thead>
                    <tr class="text-center">
                        <th>No</th>
                        <th>Telah Diterima Dari</th>
                        <th>Total Tagihan</th>
                        <th>UP</th>
                        <th>Uang Sejumlah</th>
                        <th>Berupa</th>
                        <th>Guna Membayar</th>
                        <th>Waktu</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    <tr class="text-center">
                        <td id="addpad">005</td>
                        <td id="addpad">Aurelio Theodhore Riyanto</td>
                        <td id="addpad">Rp.300.000</td>
                        <td id="addpad">Rp.100.000</td>
                        <td id="addpad">Rp.100.000</td>
                        <td id="addpad">Kredit</td>
                        <td id="addpad">Lunas</td>
                        <td id="addpad">27 Januari 2021, 10:30 WIB</td>
                        <td id="addpad"><i class="fa fa-list list-icon"></i></td>
                    </tr>
                </tbody>
            </table>
            {{--  --}}
        </div>
        
    </div>
@endsection