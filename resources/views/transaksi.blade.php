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
                <table class="table table-borderless">
                    <tr>
                        <th><div style="width: 40px; margin-left:9px;">No</div></th>
                        <th><div style="width: 150px">Nama Pelanggan</div></th>
                        <th><div style="width: 130px">Total Tagihan</div></th>
                        <th><div style="width: 110px">DP</div></th>
                        <th><div style="width: 110px">Tagihan 2</div></th>
                        <th><div style="width: 110px">Tagihan 3</div></th>
                        <th><div style="width: 90px">Status</div></th>
                        <th><div style="width: 120px">Tanggal Transaksi</div></th>
                    </tr>
                    <tr>
                        <td><div style="width: 60px">001</div></td>
                        <td><div>Johanes Sinalsal Purba</div></td>
                        <td><div>Rp.300.000</div></td>
                        <td><div><i class="fa fa-check-circle"></i></div></td>
                        <td><div>Rp.100.000</div></td>
                        <td><div>Rp.100.000</div></td>
                        <td><div class="bg-danger rounded-pill">Belum Lunas</div></td>
                        <td><div>27 Januari 2022, 10:30 WIB</div></td>
                    </tr>
                </table>
            </div>
            <div class="card">
                <table class="table table-borderless">
                    <tr>
                        <th><div style="width: 40px; margin-left:9px;">No</div></th>
                        <th><div style="width: 150px">Nama Pelanggan</div></th>
                        <th><div style="width: 130px">Total Tagihan</div></th>
                        <th><div style="width: 110px">DP</div></th>
                        <th><div style="width: 110px">Tagihan 2</div></th>
                        <th><div style="width: 110px">Tagihan 3</div></th>
                        <th><div style="width: 90px">Status</div></th>
                        <th><div style="width: 120px">Tanggal Transaksi</div></th>
                    </tr>
                    <tr>
                        <td><div style="width: 60px">001</div></td>
                        <td><div>Johanes Sinalsal Purba</div></td>
                        <td><div>Rp.300.000</div></td>
                        <td><div><i class="fa fa-check-circle"></i></div></td>
                        <td><div><i class="fa fa-check-circle"></i></div></td>
                        <td><div><i class="fa fa-check-circle"></i></div></td>
                        <td><div style="background-color: #48BE00; border-radius:100px; color:white;">Lunas</div></td>
                        <td><div>27 Januari 2022, 10:30 WIB</div></td>
                    </tr>
                </table>
            </div>
</div>
        
        
@endsection