<div style="margin-top: -10px" class="container">
    <div style="text-align: center">
        <h1 style="font-size: 60px">MUSESUP</h1>
        <p style="margin-top: -20px; font-size: 20px">
            Mutuelle de Santé des Enseignants des Etablissements <br> d’Enseignement Supérieur du Burkina Faso

        </p>
    </div>
    <div class="title">
        <h1 style="padding-top: 10px;padding-bottom: 12px; ">Autorisation de prélèvement sur salaire</h1>
    </div>

    <div class="content" style="font-size: 14; line-height: 2">
        Je soussigné
        Identité
        Nom et prénom(s)…………<b>{{$data->nom}} {{$data->prenom}}</b>………………… <br>
        Numéro matricule…………………<b>{{$data->matricule}}</b>………………….
        Université/Institut/Ecole…………..…IBAM…………………………………………………
        UFR/Département/………..………………………………………………………………
        Téléphones…<b>{{$data->telephone}}</b>…………Email…….<b>{{$data->email}}</b>…….....…….
        Date de naissance…<b>{{$data->dateNaissance}}</b>…………………date de départ à la retraite……………
        Autorise par la présente,
        M. l’Agent Comptable, à effectuer un prélèvement automatique sur mon salaire mensuel, en mon nom et pour mon compte, pour un montant de : <br>
        (en lettres)       ……………………<b>{{$data->montantLettre}}</b>…………………………….. <br>
        (en chiffres)        …………<b>{{$data->montantChiffer}}</b> …………………………………………………… <br>
        Qu’il versera à la MUSESUP au titre de ma cotisation mensuelle à ladite Mutuelle, à travers ECOBANK/Burkina Faso
    </div>


<table border="1"  style="width: 100%">
    <thead>
        <tr>
            <th>Code Banque</th>
            <th>Code Guichet</th>
            <th>N° de compte</th>
            <th>Clé RIB</th>
            <th>Devises</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td style="padding: 15px"></td>
            <td> </td>
            <td> </td>
            <td> </td>
            <td> </td>
        </tr>
    </tbody>
</table><br>

<div style="font-size: 14;">
    La présente procuration prend effet à compter du <b>{{$data->datePriseEffet}} </b>et vaut jusqu’à révocation expresse et écrite du mandat. <br>
    <p style="margin-left: 300px">Fait à……………………………le <b>{{$data->dateEtablissement}}</b></p>
    <p style="margin-left: 350px">Signature précédée du nom et prénom(s)
    </p>

</div>










<style>
    div.title{
        background-color: rgb(203, 203, 206);
        text-align: center;
        border-radius: 10px;
    }
</style>
