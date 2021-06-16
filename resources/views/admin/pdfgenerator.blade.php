<!DOCTYPE html>

<head>

    <meta charset="utf-8">
    <style>
        @page {
            size: a4 portarait;
        }

        body{
            border-style: dotted;
            margin: 20px;
        }

        .info-medc {
            display: inline-block;
            margin: 15px 30px;
            width: 460px;

        }

        .info-medc h2,
        .info-medc div {
            margin: 4px;
            color: rgb(22, 73, 121);
        }

        .info-medc div {
            font-size: 18px;
        }

        .date-ord {
            display: inline;
        }

        .info-pat {
            margin: 50px;
        }

        .nom-pat {
            width: 350px;
            display: inline-block;
        }

        .titre {
            margin-right: auto;
            margin-left: auto;
            text-align: center;
            border: 1px solid black;
            width: 50%;
        }

        .description {
            margin: 30px;
            height: 450px;
            text-align: justify;
        }

        .signature{
            margin-right: auto;
            margin-left: auto;
            text-align: center;
            font-size: 18px;
        }
    </style>
</head>

<body>
    <div class="info-medc">
        <h2>
            Dr
            <span class="text-uppercase">{{session('admin')->nom}}</span>
            <span class="text-capitalize">{{session('admin')->prenom}}</span>
        </h2>
        <div>Médcine géneral</div>
        <div>mobile: 0566661222</div>
        <div>{{session('admin')->email}}</div>
    </div>
    <div class="date-ord">le: {{date("d-m-Y")}}</div>

    <div class="info-pat">
        <span class="nom-pat">{{$data['nom_patient']}}</span>
        <span>Age: {{$data['age']}}</span>
    </div>

    <div class="titre">
        <h2>ORDONNANCE</h2>
    </div>

    <div class="description">{!!$data['description']!!}</div>

    <div class="signature">
        <h4>
            Dr
            <span class="text-uppercase">{{session('admin')->nom}}</span>
            <span class="text-capitalize">{{session('admin')->prenom}}</span>
        </h4>
    </div>
</body>

</html>