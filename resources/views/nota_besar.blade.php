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

        .container-wrapper {
            margin: 30px;
            margin-top: 0;
        }

        .container-wrapper .header {
            display: inline-flex;

            margin-bottom: 40px;
            margin-left: 80px;
        }

        .container-wrapper .header .brand-title {
            margin-bottom: 0;

            text-transform: uppercase;
        }

        .container-wrapper .header .brand-address {
            margin-top: 0;
        }

        .container-wrapper .header .date-times {
            margin-left: 800px;
        }

        .container-wrapper .big-title {
            text-align: center;

            margin-bottom: 60px;
        }

        .container-wrapper .big-title .title {
            margin: 0;
            margin-bottom: -12px;
        }

        .container-wrapper .big-title .hr {
            margin: 0;

            border: 1px solid black;
            width: 200px;

            display: inline-flex;
            align-items: center;
            justify-content: center;
        }

        .container-wrapper .big-title .no-nota {
            margin: 0;
        }

        .container-wrapper .content, .content h4{
            text-transform: uppercase;

            margin: 0;
            margin-left: 40px;
        }
        .container-wrapper .ttd .ttd-header{
            text-align: center;
        }

        .container-wrapper .ttd .wrappers{
            display: inline-flex;
        }
        .container-wrapper .ttd .wrappers .customer{
            margin-left: 200px;
        }
        .container-wrapper .ttd .wrappers .sales{
            margin-left: 700px;
        }
    </style>
</head>

<body>
    <div class="container-wrapper">
        <div class="header">
            <div class="address">
                <h4 class="brand-title">"Omah Kunci"</h4>
                <p class="brand-address">Jl. Agus Salim D no.10 <br> Telp/Fax (024) 3554929 <br> Semarang </p>
            </div>
            <h4 class="date-times">Semarang, 27 - 1 - 2022</h4>
        </div>

        <div class="big-title">
            <h2 class="title">TANDA TERIMA</h2>
            <div class="hr"></div>
            <h5 class="no-nota">NO.009357</h5>
        </div>

        <div class="content">
            <h4>Telah terima dari : </h4>
            <br>
            <h4>up : </h4>
            <br>
            <h4>uang sejumlah : </h4>
            <br>
            <br>
            <h4>berupa : </h4>
            <br>
            <h4>guna membayar : </h4>
            <br>
            <h4>total : </h4>
            <br>
            <br>
            <h4>ukuran(estimasi) : </h4>
        </div>

        <div class="ttd">
            <h4 class="ttd-header">Mengetahui,</h4>
            <div class="wrappers">
                <h4 class="customer">Customer,</h4>
                <h4 class="sales">Sales,</h4>
            </div>
        </div>
    </div>
</body>

</html>
