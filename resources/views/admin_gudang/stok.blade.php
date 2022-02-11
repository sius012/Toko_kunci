@extends('adminlte::page')

@section('title', 'Kasir || Omah Kunci')

@section('content_header')
    <link rel="stylesheet" href="{{ asset('css/toko_kunci/stok.css') }}">
    <link rel="stylesheet" href="{{ asset('css/open_sans.css') }}">
@stop

@section('content')
<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-6">
                <input class="search-box" type="text" placeholder="Scan atau cari item...">
                <i class="fas fa-search ml-1 search-icon"></i>
            </div>
        </div>
    </div>

    <br>
    <br>

    <div class="row d-flex align-items-center justify-content-center">
        <table class="table table-light table-striped table-bordered">
            <thead class="text-center">
                <tr>
                    <th>Kode Produk</th>
                    <th>Nama Produk</th>
                    <th>Stok</th>
                    <th>Pembaruan Terakhir</th>
                </tr>
            </thead>
            <tbody class="text-center">
                <tr>
                    <td>B2340</td>
                    <td>Kusen Kayu Jati</td>
                    <td>1020</td>
                    <td>27 Januari 2020</td>
                </tr>
                <tr>
                    <td>B2340</td>
                    <td>Kusen Kayu Jati</td>
                    <td>1020</td>
                    <td>27 Januari 2020</td>
                </tr>
            </tbody>
        </table>
    </div>
</section>
@stop
