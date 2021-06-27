<div style="margin-top: -230px" class="container">
    <div class="title">
        <h3 style="padding-top: 10px;padding-bottom: 12px; ">FICHE DE DEMANDE D’HEBERGEEMENT A LA MAISON DES HOTES DE L’UNIVERSITE JOSEPH KI-ZERBO</h3>
    </div>



    <div class="content" style="font-size: 14; line-height: 1.5">
        Date : {{$data->dateDemande}} ………….………………………………….…...…..……………. <br>
        Nom et prénom (s) du requérant : {{$data->nomPrenomRequerant}} ……………………………… <br>
        Titre/Fonction : {{$data->titreRequerant}}, {{$data->fonctionRequerant}} ……………………………… <br>
        Nom et prénom de l’occupant : {{$data->nomOccupant}} {{$data->prenomOccupant}} …………………….....……… <br>
        Provenance : {{$data->provenanceOccupant}}………………………………………...……..… <br>
        UFR/Institut bénéficiaire : IBAM …………..........…………………………………. <br>
        Motif du séjour : ……………………………………………………… <br>
        <div style="font-size: 14; line-height: 1">


            @if ($data->enseignement === 1)
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Mission d’enseignement <input style="font-size: 35px; margin-top: 5px" type="checkbox" name="" id="" checked> <br>
            @else
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Mission d’enseignement <input style="font-size: 35px; margin-top: 5px" type="checkbox" name="" id=""> <br>
            @endif
            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Volume horaire à dispenser : {{$data->volumeHoraireDispense}} H.............…………………..…………. <br>
            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Discipline : {{$data->disciplineEnseigne}} .....……………... <br>
            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Cadre: {{$data->cadre}}………………..………………… <br>

            @if ($data->participationJury === 1)
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Participation jury <input style="font-size: 35px; margin-top: 10px" type="checkbox" name="" id="" checked> <br>
            @else
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Participation jury <input style="font-size: 35px; margin-top: 10px" type="checkbox" name="" id=""> <br>
            @endif
            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Departement : {{$data->departement}} .............…………………..…………. <br>
            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Date soutenance: {{$data->dateSoutenance}} ……………... <br>
            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Thème {{$data->themeSoutenance}}..…………………
        </div>
        <p style="font-size: 15px">N.B. : Les demandes doivent être adressées au cabinet du Président 15 jours avant la mission ou le séjour.
        </p>
    </div>

<table  style="width: 100%">
    <thead>
        <tr>
            <th colspan="4">Décision du président</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td>Place disponible à la villa 1</td>
            <td></td>
            <td>Séjour payant</td>
            <td></td>
        </tr>
        <tr>
            <td>Place disponible à la villa 1 annexe</td>
            <td></td>
            <td>Séjour non payant</td>
            <td></td>
        </tr>
        <tr>
            <td>Place disponible à la villa 2</td>
            <td></td>
            <td>A loger exceptionnellement à l’hôtel en ville</td>
            <td></td>
        </tr>
        <tr>
            <td>Pas de place disponible </td>
            <td></td>
            <td></td>
            <td></td>
        </tr>
        <tr>
            <td>Autre décision</td>
            <td></td>
            <td></td>
            <td></td>
        </tr>
    </tbody>
</table><br>
<div style="margin-left: 500px">
    <h3>Visa du Président</h3>
</div>












<style>
    div.title{
        background-color: rgb(203, 203, 206);
        text-align: center;
        border-radius: 10px;
    }

    table, td, tr{
        border: 1px solid black;
    }
</style>
