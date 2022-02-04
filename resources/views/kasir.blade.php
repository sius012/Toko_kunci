@extends('adminlte::page')

@section('title', 'AdminLTE')

@section('content_header')
    <h1 class="m-0 text-dark">Kasir</h1>
@stop

@section('content')
<section class="content">
     <div class="container-fluid">
        <div class="row">
            <div class="col-6">
                <input class="search-box" type="text">
                <i class="fas fa-search ml-1 search-icon"></i>
            </div>
            <div class="col-6">
                <p class="times">Rabu, 03 Februari 2022 16 : 44 : 56 WIB</p>
            </div>
        </div>

        <div class="row">
            <h5 class="nomor-nota ml-4 mt-4 mb-2">Nota : 001</h5>
            <table class="table table-bordered">
                <tr>
                    <th>Item</th>
                    <th>Harga</th>
                    <th>Jumlah</th>
                    <th>Subtotal</th>
                    <th>Aksi</th>
                </tr>
                <tr>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                </tr>
            </table>
        </div>

        <div class="row">
            <div class="col-4">
                <div class="row"><input class="nama-pelanggan" type="text" placeholder="Nama Pelanggan"></div>
                <div class="row mt-3">
                    <div class="col-2">
                        <p class="subtotal">Subtotal</p>
                    </div>
                    <div class="col-2"> 
                        <input class="subtotal-input" type="text">
                    </div>
                </div>
                <div class="row">
                    <div class="col-2">
                        <p class="subtotal">Diskon</p>
                    </div>
                    <div class="col-2"> 
                        <input class="subtotal-input" type="text">
                    </div>
                </div>
                <div class="row">
                    <div class="col-2">
                        <p class="total">Total</p>
                    </div>
                    <div class="col-2"> 
                        <input class="total-input" type="text">
                    </div>
                </div>
            </div>
            <div class="col-4 payment-method">
                <div id="tunai" class="row mt-4">
                    <div class="col-2">
                        <input class="radio" type="radio">
                    </div>
                    <div class="col-2">
                        <p class="method-1">Tunai</p>
                    </div>
                </div>
                <div id="tunai" class="row">
                    <div class="col-2">
                        <p class="methods">Via</p>
                    </div>
                    <div class="col-2">
                        <input class="method-input" type="text">
                    </div>
                </div>
                
                <div id="kredit" class="row mt-2">
                    <div class="col-2">
                        <input class="radio" type="radio">
                    </div>
                    <div class="col-2">
                        <p class="method-1">Tunai</p>
                    </div>
                </div>
                <div id="kredit" class="row">
                    <div class="col-2">
                        <p class="methods">Via</p>
                    </div>
                    <div class="col-2">
                        <input class="method-input" type="text">
                    </div>
                </div>
            </div>

            <div class="col-4 option">
                <div class="row options">
                    <div class="col-2 mt-3">
                        <button class="selesai ml-4" href="#">Selesai</button>
                    </div>
                </div>
                <div class="row options">
                    <div class="col-2">
                        <button class="tunda ml-4" href="#">Tunda</button>
                    </div>
                </div>
                <div class="row options">
                    <div class="col-2">
                        <button class="reset ml-4" href="#">Reset</button>
                    </div>
                </div>
            </div>
        </div>
     </div>
</section>
@stop
