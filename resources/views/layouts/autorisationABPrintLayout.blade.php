<div style="margin-top: -90px" class="container">
    <div class="title">
        <h1 style="padding-top: 10px;padding-bottom: 12px; ">Autorisation d'absence</h1>
    </div>



    <div class="content" style="font-size: 14; line-height: 2">

        Nom :................... <b>{{$data->nom}}</b>....................   Prénom(s) :................ <b>{{$data->prenom}}</b>........................
        Fonction  :................ <b>{{$data->libelleFonction}}</b>...............  Matricule : .………. <b>{{$data->matricule}}</b>................. <br>
        Motif de l’absence : <b>{{$data->motifAbsence}}</b> <br>
        Destination : … ……………………………................…...................................... <br>
        Date de départ : ………<b>{{$data->dateDepart}}</b>……
        Date de retour : ………<b>{{$data->dateRetour}}</b>………
    </div>

    <b>    <p style="margin-left: 370px; font-size: 22px">Signature de l'intéressé(e)</p>    </b>

    <br>
    <div style="text-align: center">
        <b><p style="font-size: 20px; text-decoration: underline">Décision de l'administration</p>
        </b>
    </div>

<table border="1"  style="width: 100%">
    <thead>
        <tr>
            <th>Avis du Chef hiérarchique <br> direct de l’agent</th>
            <th>Avis du Directeur Adjoint <br> ou du  Secrétaire Principal</th>
            <th>Décision du Directeur</th>

        </tr>
    </thead>
    <tbody>
        <tr>
            <td style="padding: 55px"></td>
            <td> </td>
            <td> </td>
        </tr>
    </tbody>
</table><br>












<style>
    div.title{
        background-color: rgb(203, 203, 206);
        text-align: center;
        border-radius: 10px;
    }
</style>
