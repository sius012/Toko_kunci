<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>

    <style>
        * {
            font-family: Arial, Helvetica, sans-serif;
        }

        .container .header .logo-img {
            height: 70px;
        }

        .container .header {
            display: flex;
            align-items: center;
            justify-content: center;

            margin-top: 35px;
        }

        .container .address {
            text-align: center;

            margin-bottom: 40px;
        }

        .container .data-wrapper {
            display: flex;
            align-items: center;
            justify-content: center;

            text-align: center;
        }
        .container .data-wrapper .table tbody tr td, th{
            padding: 15px;
        }

        .container .data-wrapper .table{
            border-collapse: collapse;
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="header">
            <img class="logo-img" src="{{ asset('assets/logo.svg') }}" alt="">
        </div>
        <p class="address">
            Jl. Agus Salim D no.10 <br> Telp/Fax. (024) 3554929 / 085712423453 <br> Semarang <br>
        </p>

        <div class="data-wrapper">
            <table class="table" border="1px solid black">
                <thead>
                    <tr>
                        <th style="width: 70px;">No</th>
                        <th style="width: 150px;">Kode Produk</th>
                        <th style="width: 170px;">Nama Produk</th>
                        <th style="width: 70px;">Jumlah</th>
                        <th style="width: 170px;">Tanggal Dibuat</th>
                        <th style="width: 170px;">Tanggal Diperbarui</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>1</td>
                        <td>1212431324</td>
                        <td>Gembok Pixel</td>
                        <td>200 pcs</td>
                        <td>27 Januari 2022</td>
                        <td>3 Februari 2022</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</body>

</html>
