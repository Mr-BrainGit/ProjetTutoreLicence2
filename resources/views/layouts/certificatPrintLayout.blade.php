@if ($data[0]->idTypeCertificat === 1)
    <div style="margin-top: -10px" class="container">
        <div class="title">
            <h1 style="padding-top: 10px;padding-bottom: 12px; ">{{$data[0]->libelleTypeCertificat}}</h1>
        </div>

        <div class="content" style="font-size: 16; line-height: 2">
            Je soussigné, {{$data[0]->nomCompletSignataire }}, {{ $fonctionS[0]->libelleFonction }} de l’Institut Burkinabé des Arts et Métiers (IBAM),
            certifie que   Monsieur <b>{{$data[0]->nom}} {{$data[0]->prenom}}</b>,
            numéro matricule <b>{{$data[0]->matricule}}</b> , précédemment <b>{{$data[0]->fonctionPrecedente}}</b>, mis à la disposition
            de <b>{{$data[0]->structurePrecedente}}</b> et affecté à {{$data[0]->structureActuelle}}, par décision
            <b>{{$data[0]->decision}}</b> a effectivement pris service le <b>{{$data[0]->date}}</b> en temps que {{$data[0]->fonctionActuelle}}
        </div>

        <div style="margin-left: 450px">
            <h3 style="text-decoration: underline">{{$data[0]->nomCompletSignataire }}</h3>
            <p style="margin-top: -17px; font-style: italic; font-size: 12px">{{$data[0]->distinctionSignataire}}</p>
        </div>
        <div>
            <h3 style="text-decoration: underline">Ampliation</h3>
            <ul>
                <li>Présidence</li>
                <li>DRH</li>
                <li>DAF</li>
                <li>AC</li>
                <li>SP</li>
                <li>Interessé</li>
            </ul>
        </div>
    </div>
@else
    <div style="margin-top: -10px" class="container">
        <div class="title">
            <h1 style="padding-top: 10px;padding-bottom: 12px; ">{{$data[0]->libelleTypeCertificat}}</h1>
        </div>

        <div class="content" style="font-size: 16; line-height: 2">
            Je soussigné, {{$data[0]->nomCompletSignataire }}, {{ $fonctionS[0]->libelleFonction }} de l’Institut Burkinabé des Arts et Métiers (IBAM),
            certifie que   Monsieur <b>{{$data[0]->nom}} {{$data[0]->prenom}}</b>,
            numéro matricule <b>{{$data[0]->matricule}}</b> , précédemment <b>{{$data[0]->fonctionPrecedente}}</b>, mis à la disposition
            de <b>{{$data[0]->structurePrecedente}}</b> et affecté à {{$data[0]->structureActuelle}}, par décision
            <b>{{$data[0]->decision}}</b> a effectivement cessé service le <b>{{$data[0]->date}}</b> <br> <br>
            En foi de quoi le présent certificat est établi pour servir et valoir ce que de droit.
        </div>

        <div style="margin-left: 450px">
            <h3 style="text-decoration: underline">{{$data[0]->nomCompletSignataire }}</h3>
            <p style="margin-top: -17px; font-style: italic; font-size: 12px">{{$data[0]->distinctionSignataire }}</p>
        </div>
        <div>
            <h3 style="text-decoration: underline">Ampliation</h3>
            <ul>
                <li>Présidence</li>
                <li>DRH</li>
                <li>DAF</li>
                <li>AC</li>
                <li>SP</li>
                <li>Interessé</li>
            </ul>
        </div>
    </div>
@endif

<style>
    div.title{
        background-color: rgb(203, 203, 206);
        text-align: center;
        border-radius: 10px;
    }
</style>
