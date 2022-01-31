@extends('adminlte::page')

@section('content_header')
    <h1 class="m-0 text-dark">Petunjuk Penggunaan</h1>
@stop
@section('content')
<div class="row">
<div class="card">
<div class="card-header">
<h4>1. Menu Dashboard</h4>
</div>
<div class="card-body">


    

    <h3>Didalam menu dashboard terdapat 3 kotak indikator,<br></h3>
    <img class="elevation-3" src="{{asset('guide/dashboard.png')}}" alt="ss" class="mb-5"><br>
    
</div>
<div class="card-body">
<h5 class="">
  
        kotak yang berwarna <b style="color: cyan">biru</b> menunjukan transaksi hari ini,<br>
        kotak yang berwarna <b style="color: green">hijau</b> menunjukan transaksi hari ini,<br>
        kotak yang berwarna <b style="color: yellow"> kuning</b> menunjukan transaksi hari ini.
 </h5>
</div>
</div>

<div class="card">
<div class="card-header">
<h3>Menu Kasir</h3>
</div>
<div class="card-body">


    <h4>1. Menu Transaksi</h4>
    <hr>
    <h3>Ini adalah menu untuk melakukan transaksi dan pencetakan nota<br></h3>
    <img class="elevation-3" src="{{asset('guide/kasir.png')}}" alt="ss" class="mb-5"><br>
    
</div>
<div class="card-body">
<h5 class="">Berikut cara melakukan transaksi di program ini:</h5>
<div class="container-fluid m-3">
<ol class="list-group">
  <li class="list">Masukan Nama Pembeli.</li>
  <li class="list">Masukan Spesifikasi barang, kuantitas, dan harga satuan.</li>
  <li class="list">Daftar pembelian akan tampil di jendela sebelah kanan.</li>
  <li class="list">Untuk menyelesaikan transaksi, inputkan terlebih dahulu nominal pembayaran dan setelah itu bisa langsung diprint melalui printer dengan cara menekan tombol cetak .</li>
  <li>Jika Driver printer telah di instal, maka anda bisa langsung memilih printernya dan menekan tombol "Print" dalam jendela ini<br>
  <img src="{{asset('guide/print.png')}}" alt="" width="800">
  </li>
  <li><b>optional</b><br>
        <img src="{{asset('guide/setting.png')}}" alt="" width="200">
        <br><span>jika anda menekan tombol gear, maka anda bisa mengatur konfigurasi pencetakan. <br> untuk sekarang, jendela ini hanya bisa mengatur jumlah maksimal baris saat dicetak dan pengaturan dalam menyimpan nota kedalam local disk.</span>
  </li>
  <li>Jika transaksi dibatalkan, maka anda bisa menekan tombol "Batal" yang ada dikotak no 1</li>
  <li>Jika transaksi sudah selesai, maka anda bisa menekan tombol "Transaksi Baru" yang ada dikotak no 4</li>
</ul>
</ol>

 </h5>
</div>


</div>
    </div>
<div class="card">
<div class="card-header">
<h4>3. Transaksi</h4>
</div>
<div class="card-body">


    

    <h4>Ini adalah menu transaksi<br></h4>
    <img class="elevation-3" src="{{asset('guide/transaksi.png')}}" alt="ss" class="mb-5" width="800"><br>
    
</div>
<div class="card-body">
<h5 class="">
  
<ul class="list-group m-3">
  <li class="list">Daftar Transaksi ditampilkan disini.</li>
  <li class="list">Anda bisa menghapus transaksi yang sudah dilakukan(tidak berpengaruh pada nomer nota berikutnya).</li>
</ul>

 </h5>
</div>
</div>

</div>
@stop