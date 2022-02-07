@extends('adminlte::page')
@section('title', 'Transaksi || Omah Kunci')

@section('content_header')
    <h1 class="m-0 text-dark">Transaksi</h1>
@stop
@section('content')
        <div class="row">
            <div class="col-6">
                <input class="search-box" type="text" placeholder="Cari riwayat transaksi...">
                <i class="fas fa-search ml-1 search-icon"></i>
            </div>
            <div class="col-6">
                <i class="fa fa-calendar calendar-transaksi" aria-hidden="true"></i>
            </div>
        </div>

       
    
        <div class="row">
            <h5 class="date">Hari Ini</h5>
        </div>
    
       
            <div class="card">
                <table class="table">
                    <tr>
                        <th>No</th>
                        <th>Nama Pelanggan</th>
                        <th>Total Tagihan</th>
                        <th>DP</th>
                        <th>Tagihan 2</th>
                        <th>Tagihan 3</th>
                        <th>Status</th>
                        <th>Tanggal Transaksi</th>
                    </tr>
                    <tr>
                        <td>001</td>
                        <td>Johanes Sinalsal Purba</td>
                        <td>Rp.300.000</td>
                        <td><i class="fa fa-check-circle"></i></td>
                        <td>Rp.100.000</td>
                        <td>Rp.100.000</td>
                        <td>Belum Lunas</td>
                        <td>27 Januari 2022</td>
                    </tr>
                </table>
            </div>
            <div class="card">
                <table class="table">
                    <tr>
                        <th>No</th>
                        <th>Nama Pelanggan</th>
                        <th>Total Tagihan</th>
                        <th>DP</th>
                        <th>Tagihan 2</th>
                        <th>Tagihan 3</th>
                        <th>Status</th>
                        <th>Tanggal Transaksi</th>
                    </tr>
                    <tr>
                        <td>001</td>
                        <td>Dionisius Setya Hermawan 1234</td>
                        <td>Rp.300.000</td>
                        <td><i class="fa fa-check-circle"></i></td>
                        <td>Rp.100.000</td>
                        <td>Rp.100.000</td>
                        <td>Belum Lunas</td>
                        <td>27 Januari 2022</td>
                    </tr>
                </table>
            </div>
    </div>
        
        
@endsection