<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta http-equiv="x-ua-compatible" content="ie=edge">

  <title>Certificat</title>
</head>

<body>

    <style>
        .row {
            display: flex;
            justify-content: space-between; /* or inline-flex */
        }

        .divLogo{
            width: 40%;
            margin-left: 400px;
        }
        .divInfo{
            width: 60%;
            text-align: center;
            height: 300px;
        }
        .divInfo p{
            font-weight: bold;
        }

        .devise{
            width: 40%;
            margin-left: 400px;
            text-align: center;
        }

        .logoUJKZ{
            width: 100px;
        }

        .logoIbam{
            width: 100px;
            margin-top: -12px;
        }
    </style>
    <div class="container" style=" height: 400px;">
        <div class="row">
            <div class="devise">
                <p>
                    BURKINA FASO <br>
                    -=-=-=-=-=- <br>
                    Unité – Progrès – Justice !
                </p><br>
                <img class="logoUJKZ" src="{{ public_path("img/logoUniv.jpg") }}">
                <div style="margin-top: -15px">
                    <p>Ouagadougou le.................................. </p>

                </div>
            </div>
            <div class="divInfo">
                <p style="font-size: 13px">
                    MINISTERE DE L’ENSEIGNEMENT SUPERIEUR, <br>
                    DE LA RECHERCHE SCIENTIFIQUE
                    <br> ET DE L’INNOVATION <br>
                    -=-=-=-=-=-=-=- <br>
                    SECRETARIAT GENERAL <br>
                    -=-=-=-=-=-=- <br>
                    UNIVERSITE JOSEPH KI-ZERBO <br>
                    -=-=-=-=-=-=-
                </p><br>

                <img class="logoIbam" src="{{ public_path("img/logoIbam.png") }}">

                <p style="margin-top: -10px; font-size: 12px">
                    Institut Burkinabè des Arts et  Métiers <br>
                    03 BP 7021 Ouagadougou 03 <br>
                    Tél. : (226) 25-35-67-31/62 <br>
                    Fax. : (226) 25-30-72-42 <br>
                    Télex : 5270 BF
                </p>
                <p>
                    N°2020-________________/MESRSI/SG/UJKZ/IBAM/D
                </p>
            </div>


        </div>
    </div>


    @yield('content')
</body>
