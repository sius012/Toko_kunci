@extends('adminlte::page')
@include('sweetalert::alert')

@section('title', 'Kasir')

@section('content_header')
    <h1 class="m-0 text-dark">Kasir</h1>
@stop

@section('content')

@php
    $no = 1;
    $total = 0;
    $totalakhir = 0;
    $total = 0
@endphp

<script src="{{ asset('vendor/jquery/jquery.min.js') }}"></script>
<script src="{{ asset('js/print.js') }}"></script>
<script src="{{ asset('js/sweetalert2.all.min.js')}}"></script>
<script src="{{ asset('js/bootstrap.js')}}"></script>
<link rel="stylesheet" href="{{asset('css/sweetalert2.min.css')}}"> 
<script>

</script>
@if(session()->has('data'))
<script>
    $(document).ready(function(){
        $("#name").val("{{Session::get('data')['nama']}}");
        $(".no-nota").text("{{Session::get('data')['no_nota']}}");
        $("#btn-tambah").attr('class', "btn btn-danger mt-3");
        $("#btn-tambah").text("Hapus");

        
    });
</script>


@endif

<script>
 var total = "{{session()->has('data') ? $totalakhir : 0}}"; 
 var jumlahtrans = "{{session()->has('detail') ? count(Session::get('detail')) : 0  }}";
    $(document).ready(function(){
      $('#new').click(function(e){
          e.preventDefault();
          window.location = "/reload";
      });
      $(".cetak").prop('disabled', true);
      $("#new").prop('disabled', true);

      $(".validator").hide();

      @if(session()->has('detail'))

        $(".cetak").prop('disabled',  false);
      @endif
        
      function rp(bilangan){
	
        var	number_string = bilangan.toString(),
            sisa 	= number_string.length % 3,
            rupiah 	= number_string.substr(0, sisa),
            ribuan 	= number_string.substr(sisa).match(/\d{3}/g);
                
        if (ribuan) {
            separator = sisa ? '.' : '';
            rupiah += separator + ribuan.join('.');
        }

        // Cetak hasil
       return rupiah;
      }

        var no = 1;
        var id = parseInt("{{session()->has('data') ? Session::get('data')['id_trans'] : ''}}");
        var mulai = true;   

       
        $(".inputan").hide();
  
        $("#btn-tambah").click(function(){
            if($("#name").val() != ""){
            $(".inputan").slideDown();
            $(".nama_orang").val($("#name").val());
           
            
            
             $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                type : "POST",
                url : "{{url('/tambah')}}",
                data : {
                    data : $("#name").val(),
                },
                dataType: "JSON",
                success : function(data){   
                    $("#btn-tambah").hide();
                    $("#btn-tambah").append("<i class='fa fa-trash ml-2'></i>");
                    $(".buttoncont").append(`<button class="btn btn-danger shadow mt-3" id="btn-hapus"><i class="fa fa-trash mr-3"></i>BATALKAN</button>`);
                    $("#btn-tambah").text("BATALKAN");
                    $(".no-nota").text(data['no_nota']);
                    $(".nama-orang").text(data['nama']);
                    $(".nama-orang").slideDown();
                    id = data['id_trans'];
                },
                error: function(response){
                    alert(response.responseText);
                }
            });
            
            }


        });

      //  $(".foot-container").hide();

        $("#form-trans").submit(function(e){
            e.preventDefault();
            $(".foot-container").show();
            var fd = new FormData();
            var files = $('#file')[0].files;


           fd.append('billing_id', id);
           fd.append("nb",$("#nomor-barang").val());
           fd.append("bb",$("#berat").val());
           fd.append("hb",$("#nominal").val());
           fd.append("j",$("#jumlah").val());
           fd.append("jb",$("#jenis-barang").val());
           fd.append('file',files[0]);

            if(jumlahtrans < $("#makstrans").val()){
                $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                type : "POST",
                url : "{{url('/tambahbarang')}}",
                data : fd,
                contentType: false,
                processData: false,
                dataType: "JSON",
                success : function(data){
                    total = 0; 
                    jumlahtrans=0;
                no = 1;
                var isi = ""
                var row = "";
                for(var i = 0;i < data.length;i++){
                var image = data[i]["keterangan"];
                  row +=  
                     `
                     <tr>
                        <td>${no}</td>
                        <td>${data[i]["no_barang"]}</td>
                        <td>${data[i]["jns_barang"]}</td>
                        <td>${data[i]["berat"]} gr</td>
                        <td>${rp(data[i]["harga"])}</td>
                        <td align='center'>${data[i]["jumlah"]}</td>
                        <td><img src="{{asset('img/${image}')}}" alt="" width="75"></td>
                        <td><a href="/kasir/hapus/${data[i]["id"]}"><button class="btn btn-danger"><i class="fa fa-trash"></i></button></i></a></td>
                    </tr>
                                    `;
                   no++;

                   isi += `
    <li class="list-group-item d-flex justify-content-between align-items-center">
    ${data[i]['jns_barang']}
        <span class="badge badge-primary badge-pill">${rp(data[i]['jumlah'])}</span>
        <span class="badge badge-warning badge-pill">${rp(data[i]['jumlah'] * data[i]['harga'])}</span>
    </li>
 
`;
                total = parseInt(total) + data[i]['jumlah'] * data[i]['harga'];
                jumlahtrans = parseInt(jumlahtrans) + 1;

                }

             
                $("#list").html(isi);
                $(".foot-container").show();
                $(".cetak").prop('disabled', false);
                $("#data-trans").html(row);
                $("#totalharga").html("Rp. " + rp(total));
                },
                error: function(response){
                    alert(response.responseText);
                }
            });
            }else{
                Swal.fire(
                    "Melebihi batas maksmimum"
                );
            }
           

            $(".trans").val("");
        });


 












        
        function formatRupiah(angka, prefix){
			var number_string = angka.replace(/[^,\d]/g, '').toString(),
			split   		= number_string.split(','),
			sisa     		= split[0].length % 3,
			rupiah     		= split[0].substr(0, sisa),
			ribuan     		= split[0].substr(sisa).match(/\d{3}/gi);
 
			// tambahkan titik jika yang di input sudah menjadi angka ribuan
			if(ribuan){
				separator = sisa ? '.' : '';
				rupiah += separator + ribuan.join('.');
			}
 
			rupiah = split[1] != undefined ? rupiah + ',' + split[1] : rupiah;
			return prefix == undefined ? rupiah : (rupiah ? 'Rp. ' + rupiah : '');
		}

         $("#checkboxdetail").attr('checked', true);
        $("#checkboxdetail").click(function(){
     
            $(".foot-container").slideToggle();
        });
        
        $(document).on('click', '#btn-hapus',function (event) {
    event.preventDefault();
    const url = $(this).attr('href');

    Swal.fire({
  title: 'Apakah Anda Yakin?',
  text: "Transaksi tidak akan tersimpan",
  icon: 'warning',
  showCancelButton: true,
  confirmButtonColor: '#3085d6',
  cancelButtonColor: '#d33',
  confirmButtonText: 'OK!',
  cancelButtonText: 'Batal'
}).then((result) => {
  if (result.isConfirmed) {
    $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                type : "POST",
                url : "{{url('/hapustrans')}}",
                data : {
                    id: id
                },
                success : function(data){ 
                    Swal.fire(
                    'Terhapus!',
                    'Transaksi Berhasil Dihapus.',
                    'success'
                    );
                    window.location = "/kasir";
            
                },
                error: function(response){
                    alert(response.responseText);
                }
        });
    

  }
});
    
});
    
    });
</script>
@if(session()->has('data'))
<script>
    $(document).ready(function(){
        $(".inputan").show();
    });
</script>
@endif
@if(session()->has('detail'))
<script>
    $(document).ready(function(){
        $(".foot-container").show();
    });
</script>
@endif
<style>
    .card-footer{
        background: 
#d1d1d1
;
    }

    .lanjut{
        float: right;
    }

    .container .container-head{
        border: 1px solid lightgrey;
        padding: 20px;
        width: 100%;
        margin: 0;
        border-radius: 10px 10px 0px 0px;
    }

    .container .container-body{
        border: 1px solid lightgrey;
        padding: 10px;
        width: 100%;
        margin: 0;
        border-radius: 0px 0px 10px 10px;
    }

    .container-body input{
        margin: 20px;
        width: 80%;
    }

    .elevation-4{
        height: 10px;
    }

    .nota{

    }

    

</style>

<script>

</script>
<script>
$(document).ready(function(e){
    $("#form-bayar").submit(function(e){
        e.preventDefault();
        if($('#nominalbayar').val() == "" || $('#nominalbayar').val()  == null  ){
            $(".validator").slideDown();
        }else if(parseInt($('#nominalbayar').val().replace(/[.]/g ,'')) < $("#totalharga").text().replace("Rp.", "").replace(".","").replace(".","")){
            $(".validator").text("* Nominal yang dimasukan kurang");
            $(".validator").slideDown();
        }else{
            $(".validator").hide();
        $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                type : "POST",
                url : "{{url('/print')}}",
                data : {
                    bayar: $('#nominalbayar').val(),
                    save: $("input[type=checkbox][id=saved]:checked").val() == undefined ? 'tidak' : 'saved',
                    maks: $("#makstrans").val()
                },
                dataType: 'JSON',
                success : function(response){ 
                    printJS({printable: response['filename'], type: 'pdf', base64: true});
                    $("#new").attr('disabled', false);
                },
                error: function(response){
                    alert(response.responseText);
                }
        });
        }
    });
});
</script>


<div class="">
  <div class="row">
    <div class="col-4">
    <div class="row">
    <div class="col">
    <div class="card">
    <div class="card-body">
    <input type="text" class="form-control" placeholder="Nama Pelanggan" id="name">
   <div class="buttoncont">
   @if(session()->has('data'))
    <button class="btn btn-danger shadow mt-3" id="btn-hapus"><i class="fa fa-trash mr-3"></i>BATALKAN</button>
    @else
    <button class="btn btn-success shadow mt-3" id="btn-tambah"><i class="fa fa-plus mr-3"></i>Tambah Transaksi</button>
    @endif
   </div>
    
    </div>
    </div>
    </div>
    
    </div>
    <div class="row">
    <div class="col">
       <div class="card">
          <div class="card-body inputan">
             <form action="" id="form-trans" enctype="multipart/form-data">
                <input type="text" class="form-control mb-3 trans" placeholder="Jenis Barang" id="jenis-barang" name="jb">
                <input type="number" class="form-control mb-3 trans" placeholder="Nomor Barang" id="nomor-barang" name="nb">
                <input type="text" class="form-control mb-3 trans" placeholder="Berat" id="berat" name="bb">
                <input type="text" class="form-control mb-3 trans" placeholder="Harga" id="nominal" name="hb">
                <input type="number" class="form-control mb-3 trans" placeholder="Jumlah" id="jumlah" name="j">
                <label for="file">Keterangan</label>
                <input type="file" class="form-control-file trans" placeholder="Jumlah" id="file" name="img">
                <button class="btn btn-success shadow mt-3" id="submit"><i class="fa fa-plus mr-3"></i>Tambah</button>
            </form>
          </div>
       </div>
    </div>
    
    </div>
    
    <div class="row">
    <div class="col">
    <div class="card">
        <div class="card-header">
        <div class="d-flex justify-content-between">
            <h3>Bayar</h3>
            <div class="dropdown" style="display: inline;">
                <button class="btn btn-secondary dropdown-toggle pull-right" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="margin: 0px;">
                    <i class="fa fa-cog"></i>
                </button>
                <div class="dropdown-menu p-3" style="width: 20vw" aria-labelledby="dropdownMenuButton" >
                    <h4>Pengaturan Cetak</h4>
                    <table class="table">
                    <tr>
                        <th>Simpan Nota</th>
                        <td align="center"><input type="checkbox" class="form-check-input" id="saved" value="simpan"></td>
                    </tr>
                    <tr>
                        <th>Maksimal Order</th>
                        <td align="center"><input type="number" class="form-control" style="width: 100px" value="5" min="1" max="10" id="makstrans"></td>
                    </tr>
                    
                    </table>
                </div>
            </div>
        </div>
        
        </div>
        <form action="{{route('cetak')}}" method="post" id="form-bayar" enctype="multipart/form-data">
         @csrf
          <div class="card-body inputan">
            
                
                <label for="nominalbayar">Masukan Nominal Pembayaran</label>
                <input type="text" class="form-control mb-3 trans" id="nominalbayar" placeholder="Bayar"  name="bayar">
                <span class="validator"> * Masukan nominal pembayaran</span>
                
            
          </div>
          <div class="card-footer">
          <button class="btn btn-danger  shadow float-right cetak" id="submit"><i class="fa fa-print mr-2"></i>Cetak</button>
          </form>
          <button class="btn btn-warning shadow" id="new"><i class="fa fa-backward mr-3"></i>Transaksi Baru</button>
          </div>
          
       </div>
    </div>
    </div>
    
      
    </div>
    <div class="col-8">
      <div class="card nota p-3">
    <div class="card-body">
     <div class="row mb-3">
        <div class="cols-1">    
          {{"Nota :   "}} 
        </div>
        <div class="cols-1">
            <p class="no-nota ml-3">-</p> 
        </div>
     </div>
        <div class="row">
            <div class="cols-1"><i class="fa fa-user"></i></div>
            <div class="col">Nama Pelanggan</div>
            <div class="col"><p class="nama-orang">@if(session()->has('data')) {{Session::get('data')['nama']}} @endif</p></div>
        </div>
        <hr>
        <div id="">
        
        <table class="table">
  <thead>
    <tr>
      <th scope="col">No</th>
      <th scope="col">No. Barang</th>
      <th scope="col">Jns. Barang</th>
      <th scope="col">Berat</th>
      <th scope="col">Harga</th>
      <th scope="col">Jumlah</th>
      <th scope="col">Keterangan</th>
      <th scope="col">Aksi</th>
    </tr>
  </thead>
  <tbody id="data-trans">
  @if(session()->has('detail'))
    @foreach(Session::get('detail') as $d)
    <tr>
                        <td>{{$no}}</td>
                        <td>{{$d->no_barang}}</td>
                        <td>{{$d->jns_barang}}</td>
                        <td>{{$d->berat}} gr</td>
                        <td>{{number_format($d->harga,0,'.','.')}}</td>
                        <td align='center'>{{$d->jumlah}}</td>
                        <td><img src="{{asset('img/'.$d->keterangan)}}" alt="" width="75"></td>
                        <td><a href="{{route('hapus', ['id' => $d->id])}}"><button class="btn btn-danger"><i class="fa fa-trash"></i></button></i></a></td>
       </tr>
       @php $no++ @endphp
    @endforeach
@endif
  </tbody>
</table>
<label for="checkboxdetail">Tampilkan detail</label>
<input type="checkbox" id="checkboxdetail">
<div class="foot-container">

<h5>Subtotal: </h5>
<div class="subtotal">
@if(session()->has('detail'))
<ul class="list-group foot" id="list">
@foreach(Session::get('detail') as $datas)
    <li class="list-group-item d-flex justify-content-between align-items-center">
    {{$datas->jns_barang}}
        <span class="badge badge-primary badge-pill">{{$datas->jumlah}}</span>
        <span class="badge badge-warning badge-pill"> {{number_format($datas->jumlah * $datas->harga,"0",".",'.')}}</span>
    </li>
    @php $totalakhir += $datas->jumlah * $datas->harga; @endphp
    @endforeach
</ul>
@else
<ul class="list-group-foot" id="list"></ul>
@endif  

</div>


</div>
<div>
    
<h4 class="mt-3">Total: </h4>
<h3><b id="totalharga">Rp. {{number_format($totalakhir, 0,'.','.')}}</b></h3>
</div>
     
        </div>
    </div>
    </div>
    </div>
  </div>

</div>

<script>
        $(document).ready(function(){
            function formatRupiah(angka, prefix){
			var number_string = angka.replace(/[^,\d]/g, '').toString(),
			split   		= number_string.split(','),
			sisa     		= split[0].length % 3,
			rupiah     		= split[0].substr(0, sisa),
			ribuan     		= split[0].substr(sisa).match(/\d{3}/gi);
 
			// tambahkan titik jika yang di input sudah menjadi angka ribuan
			if(ribuan){
				separator = sisa ? '.' : '';
				rupiah += separator + ribuan.join('.');
			}
 
			rupiah = split[1] != undefined ? rupiah + ',' + split[1] : rupiah;
			return prefix == undefined ? rupiah : (rupiah ? 'Rp. ' + rupiah : '');
            }
            
            $("#nominal").keyup(function(){
                $("#nominal").val(formatRupiah($("#nominal").val(), "Rp. "))
            });

            $("#nominalbayar").keyup(function(){
                $(this).val(formatRupiah($(this).val()));
            });
        });
</script>
    
@stop