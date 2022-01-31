@extends('adminlte::page')
@section('title', 'Transaksi')

@section('content_header')
    <h1 class="m-0 text-dark">Transaksi</h1>
@stop
@section('content')
<script src="{{ asset('vendor/jquery/jquery.min.js') }}"></script>
<script src="{{ asset('js/print.js') }}"></script>
<script src="{{ asset('js/sweetalert2.all.min.js')}}"></script>
<link rel="stylesheet" href="{{asset('css/sweetalert2.min.css')}}"> 

<script>
    $(document).ready(function(){
      $(".hapus").click(function(e){
        e.preventDefault();
        const url = $(this).attr('href');
        Swal.fire({
          title: 'Apakah Anda Yakin?',
          text: "Jika anda melakukannya sekarang, maka sesi transaksi yang sedang anda lakukan juga akan hilang",
          icon: 'warning',
          showCancelButton: true,
          confirmButtonColor: '#3085d6',
          cancelButtonColor: '#d33',
          confirmButtonText: 'OK!',
          cancelButtonText: 'Batal'
        }).then((result) => {
          if (result.isConfirmed) {
            window.location.href = url;
    

            }
          });

      });
       
    });
</script>
<div class="row">
<div class="col-12">
<div class="card">
  <div class="card-header">
    Transaksi Masuk
  </div>
  @php  $no = 1;@endphp
  <div class="card-body">
    <!-- <button class="btn btn-success mb-4"><i class="fa fa-file-excel mr-3"></i>Excel</button> -->
    <table class="table table-bordered table-striped">
    <thead>
    <tr>
        <th>No</th>
        <th>Tanggal</th>
        <th>Nama</th>
        <th>Nota</th>
        <th>Subtotal</th>
        <th align="center">Aksi</th>
        
    </tr>
    </thead>
    <tbody>
    
    @foreach($trans as $t)
    <tr>
        <td>{{$no}}</td>
        <td>{{$t->created_at}}</td>
        <td>{{$t->pelanggan}}</td>
        <td>{{$t->no_nota}}</td>
        <td>Rp. {{number_format($t->subtotal)}}</td>
        <td align="center"><a href="{{url('kasir/hapustrans/'.$t->id)}}" style="color:white;" class="hapus"><i class="fa fa-trash"><button class="btn btn-danger"></i></button></a></td>
       
    </tr>
    @php $no++ @endphp
    @endforeach
    </tbody>
    </table>
  </div>
</div>

</div>


</div>
@endsection