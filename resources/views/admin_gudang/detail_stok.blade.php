@extends('adminlte::page')

@section('title', 'Kasir || Omah Kunci')

@section('content_header')
    <link rel="stylesheet" href="{{ asset('css/toko_kunci/detail_stok.css') }}">
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
            <div class="col-6">
                <button type="button" class="btn">Tambah Data</button>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col">
            <h2 class="card-title font-weight-bold ml-3 mt-4">Hari Ini</h4>
        </div>
    </div>
    
    <div class="row">
        <div class="col">
            <div class="card bg-light">
                <table class="table table-borderless">
                    <thead class="thead">
                        <tr>
                            <th style="width:70px;">No</th>
                            <th style="width:180px;">Nama Produk</th>
                            <th style="width:70px;">Jumlah</th>
                            <th style="width:170px;">Kode Produk</th>
                            <th style="width:90px;">Status</th>
                            <th style="width:140px;">Kategori</th>
                            <th style="width:130px;">Merk</th>
                            <th style="width:250px;">Waktu</th>
                            <th>Status</th>
                        </tr>
                    </thead>
                    <tbody class="tbody">
                        <tr>
                            <td>001</td>
                            <td>Door Closed Black</td>
                            <td>100</td>
                            <td>983752934865</td>
                            <td><div class="status">Masuk</div></td>
                            <td>Door Closed</td>
                            <td>Kenmaster</td>
                            <td>27 Januari 2022, 09:00 WIB</td>
                            <td><div class="status2">Terverifikasi</div></td>
                        </tr>
                    </tbody>
                </table>
            </div>

            <div class="card bg-light">
                <table class="table table-borderless">
                    <thead class="thead">
                        <tr>
                            <th style="width:70px;">No</th>
                            <th style="width:180px;">Nama Produk</th>
                            <th style="width:70px;">Jumlah</th>
                            <th style="width:170px;">Kode Produk</th>
                            <th style="width:90px;">Status</th>
                            <th style="width:140px;">Kategori</th>
                            <th style="width:130px;">Merk</th>
                            <th style="width:250px;">Waktu</th>
                            <th>Status</th>
                        </tr>
                    </thead>
                    <tbody class="tbody">
                        <tr>
                            <td>001</td>
                            <td>Door Openn</td>
                            <td>300</td>
                            <td>98375254645</td>
                            <td><div class="status bg-danger">Keluar</div></td>
                            <td>Door Openn</td>
                            <td>Vivere</td>
                            <td>27 Januari 2022, 05:00 WIB</td>
                            <td><div class="status2">Terverifikasi</div></td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>


</section>
@stop
