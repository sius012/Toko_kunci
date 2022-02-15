<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <title>Document</title>
</head>
<body>
    <div class="container">
        <div class="row d-flex align-items-center justify-content-center mt-5">
            <img src="{{ asset('assets/Group 1.svg') }}" alt="">
            <i><b><h1 class="ml-4">Omah Kunci</h1></b></i>
        </div>

        <div class="row">
            <div style="margin-left: 145px; margin-top:50px; margin-bottom:20px;" class="col">
                <div class="row">
                    <h3>No Nota : </h3>
                </div>
                <div class="row">
                    <h3>Nama Pelanggan : </h3>
                </div>
                <div class="row">
                    <h3>Tanggal Pembayaran : </h3>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col d-flex align-items-center justify-content-center">
                <table class="table w-75">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama Barang</th>
                            <th>Harga Satuan</th>
                            <th>Jumlah</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>

        <div class="row">
            <div style="margin-left: 145px; margin-top:30px; margin-bottom:20px;" class="col">
                <div class="row">
                    <h3>Jumlah Total :</h3>
                </div>
                <div class="row">
                    <h3>Subtotal :</h3>
                </div>
                <div class="row">
                    <h3>Diskon :</h3>
                </div>
            </div>
        </div>
    </div>
</body>
</html>