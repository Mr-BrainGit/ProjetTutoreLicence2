<div style="margin-top: -10px" class="container">

    @isset($data->idNoteI)
        <div class="title">
            <h1 style="padding-top: 10px;padding-bottom: 12px; ">NOTE D'INFORMATION</h1>
            <p style="margin-top: -30px; font-size: 30px; text-decoration: underline; font-style: italic">A l'intention des {{ $data->destinataire }}</p>
            <p></p>
        </div>
    @endisset

    @isset($data->idNoteS)
        <p style="font-size: 25px; text-decoration: underline; text-align: center; font-style: italic">A l'intention des {{ $data->libelleNoteS }}</p>
        <div class="title2">
            <h2 style="padding-top: 5px;padding-bottom: 2px; ">NOTE DE SERVICE N° 2021-_________/MESRSI/SG/U-JKZ/IBAM/D</h2>
        </div>

    @endisset

    @isset($data->idNoteI)
        <div class="content" style="font-size: 23; line-height: 2">
            {!! $data->description !!}
        </div>
    @endisset

    @isset($data->idNoteS)
        <div class="content" style="font-size: 20; line-height: 0.5">
            {!! $data->corpsNoteS !!}
        </div>
    @endisset

    <div style="margin-left: 450px">
        <h3 style="text-decoration: underline">{{ $data->nomCompletSignataire }}</h3>
        <p style="margin-top: -17px; font-style: italic; font-size: 12px">{{ $data->distinctionSignataire }}</p>
    </div>
</div>

<style>
    div.title{
        background-color: rgb(203, 203, 206);
        text-align: center;
        border-radius: 10px;
    }

    div.title2{
        text-align: center;
        border-radius: 10px;
        border: 5px solid black;
        border-style: double;
    }
</style>
