<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta http-equiv="x-ua-compatible" content="ie=edge">

  <title>Document</title>
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
                    Unité – Progrès – Justice ! <br><br>
                    Le Directeur de l'IBAM
                </p><br>

            </div>
            <div class="divInfo">
                <p style="font-size: 13px">
                    UNIVERSITE JOSEPH KI-ZERBO <br>
                    -=-=-=-=-=-=- <br>
                    PRESIDENCE <br>
                    -=-=-=-=-=-=-<br>
                    DIRECTION DES AFFAIRES SOCIALES ET DU PATRIMOINE <br>
                    SERVICE DU PATRIMOINE <br>
                    =-=-=-=-=-=- <br>
                    MAISON DES HOTES
                </p><br>

            </div>


        </div>
    </div>


    @yield('content')
</body>
