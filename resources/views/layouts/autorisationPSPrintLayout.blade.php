<div style="margin-top: -200px" class="container">
    <div class="title">
        <h1 style="padding-top: 10px;padding-bottom: 12px; ">Autorisation de passage dans les salles</h1>
    </div>



    <div class="content" style="font-size: 14; line-height: 2">

        Nom :................... <b>{{$data->nomDemandeur}}</b>....................   Prénom(s) :................ <b>{{$data->prenomDemandeur}}</b>........................ <br>
        Qualité/Fonction  :...............................  Telephone: .………. <b>{{$data->tel}}</b>................. <br>
        Est autorisé à passer dans les classes pour: <b>{{$data->motif}}</b>
       <br>
       <b>NB : cette autorisation est conditionnée par l’accord de l’enseignant</b>

    </div>
    <div style="margin-left: 455px">
        <p>Ouagadougou le {{$data->dateDemande}} </p>

    </div>

    <b>    <p style="margin-left: 370px; font-size: 22px">Le sécrétaire principal de l'IBAM</p>    </b>

    <br>



<style>
    div.title{
        background-color: rgb(203, 203, 206);
        text-align: center;
        border-radius: 10px;
    }
</style>
