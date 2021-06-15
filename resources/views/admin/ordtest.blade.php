<!DOCTYPE html>
<head>
    <meta charset="utf-8">
    <style>
        table {
            width: 920px;
            height: 1100px;
            margin-right: auto;
            margin-left: auto;
            border-style: dotted;
            background-color: #fff;
        }

        .desig {
            padding-left: 50px;
            vertical-align: top;
        }

        .text-uppercase {
            text-transform: uppercase;
        }

        .text-capitalize {
            text-transform: capitalize;
        }

        .info-medc td {
            color: rgb(32, 49, 148);
            width: 90%;
            padding-left: 40px
        }

        .info-pat td {
            padding-left: 50px;
        }

        .nom-pat {
            width: 500px;
            display: inline-block;
        }

        .ord h2 {
            width: 500px;
            padding: 25px;
            text-align: center;
            border: 1px solid black;
            margin-right: auto;
            margin-left: auto;
        }

        .info-medc-b td {
            text-align: center
        }
    </style>
</head>

<body>
    <table>
        <tr class="info-medc">
            <td>
                <h2 class="text-primary">Dr
                    <span class="text-uppercase">{{session('admin')->nom}}</span>
                    <span class="text-capitalize">{{session('admin')->prenom}}</span>
                </h2>
                Médcine génereal<br />
                mobile: 0566661222 <br />
                {{session('admin')->email}}
            </td>
            <td>
                <div>le: {{date('d-m-Y')}}</div>
            </td>
        </tr>

        <tr class="info-pat">
            <td colspan="2">
                <span class="nom-pat">Nom & préenom: abc</span>
                <span>Age: 99</span>
            </td>
        </tr>

        <tr class="ord">
            <td colspan="2">
                <h2>ORDONNANCE</h2>
            </td>
        </tr>

        <tr>
            <td colspan="2" class="desig">
                <p>Nom int&eacute;gral du produit, du m&eacute;dicament ou du pansement;</p>
                <ul>
                    <li>La posologie, y compris la forme pharmaceutique, la concentration s&rsquo;il y a lieu et le
                        dosage;
                    </li>
                    <li>La voie d&rsquo;administration; &bull; La dur&eacute;e de traitement ou la quantit&eacute;
                        prescrite;</li>
                    <li>La masse corporelle du patient, s&rsquo;il y a lieu de l&rsquo;indiquer;</li>
                    <li>Le nom du m&eacute;dicament dont le patient doit cesser l&rsquo;usage, s&rsquo;il y a lieu;</li>
                    <li>L&rsquo;indication du m&eacute;dicament si requis (condition : le patient doit y consentir).
                    </li>
                </ul>
                <p>&nbsp;</p>
                <p>Nom de l&rsquo;infirmi&egrave;re ou de l&rsquo;infirmier : ____________________________</p>
                <p>No de permis (OIIQ) :________________</p>
                <p>No de prescripteur : ________________(6 premiers chiffres du num&eacute;ro d&eacute;sign&eacute; par
                    la
                    RAMQ suivi de &laquo; inf &raquo;)</p>
                <p>Signature : ____________________________________________</p>
            </td>
        </tr>
        <tr class="info-medc-b">
            <td colspan="2">
                <h4>Dr
                    <span class="text-uppercase">{{session('admin')->nom}}</span>
                    <span class="text-capitalize">{{session('admin')->prenom}}</span>
                </h4>
            </td>
        </tr>
    </table>
</body>
</html>