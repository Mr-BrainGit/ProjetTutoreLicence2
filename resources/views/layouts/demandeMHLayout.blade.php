


<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-4">
            <h1>Demandes d'hebergement</h1>
          </div>
          @isset ($success)
            <div class="alert alert-success alert-dismissible fade show col-sm-8" role="alert" style="margin-bottom: -15px; width: 50px; background-color: rgba(41, 199, 101, 0.795)">
                <strong>Success !!</strong> {{ $success }}
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
          @endisset

        </div>
      </div><!-- /.container-fluid -->
    </section>



    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-12">
          <div class="card">
            <div class="card-header">
              <div class="row">
                  <div class="col-md-10" style="margin-top: 10px">
                    <h3 class="card-title">Liste des demandes d'hebergement</h3>
                  </div>
                  <div class="col-md-2">
                    <button type="button" class="btn btn-info" data-type="ajout" data-toggle="modal" data-target="#personelmodal"><i class="fa fa-plus"></i> Ajouter</button>
                  </div>
              </div>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>Nom occupant</th>
                        <th>Prénom occupant</th>
                        <th>Debut du sejour</th>
                        <th>Fin du sejour</th>
                        <th>Motif du sejour</th>
                        <th>Actions</th>
                    </tr>

                </thead>
                <tbody>

                    @foreach ($demandes as $demande)
                    <tr>
                        <td style="padding-top:17px;">{{ $demande->nomOccupant }}</td>
                        <td style="padding-top:17px;">{{ $demande->prenomOccupant }}</td>

                        <td style="padding-top:17px;">{{ $demande->dateDebutSejour }}</td>
                        <td style="padding-top:17px;">{{ $demande->dateFinSejour }}</td>
                        <td style="padding-top:17px;">{{ $demande->motifSejour }}</td>
                        <td>
                            <form action="{{ route('demandeMHPrint') }}" method="post">
                                @csrf

                           <!-- <button type="button"
                                    id="edit"
                                    data-type="edit"
                                    data-id="{{ $demande->idOccupant }} "
                                    data-dated="{{ $demande->dateDemande }}"
                                    data-nomr="{{ $demande->nomRequerant }}"
                                    data-prenomr="{{ $demande->prenomRequerqnt }}"
                                    data-dateps="{{ $demande->datePriseEffet }}"
                                    data-datee="{{ $demande->dateEtablissement }}"
                                    data-toggle="modal"
                                    data-target="#personelmodal"
                                    class="btn btn-success btn-sm"><i class="fa fa-edit"></i>
                            </button> -->
                            <button type="submit" data-id="{{ $demande->idDemandeH }} " class="btn btn-success btn-sm"><i class="fa fa-print"></i></button>
                            <button type="button" data-id="{{ $demande->idDemandeH }} " data-toggle="modal" data-target="#confirm-modal" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></button>
                            <input type="hidden" name="id" value="{{ $demande->idDemandeH }} ">
                            </form>
                        </td>
                      </tr>
                    @endforeach

                </tbody>

              </table>
            </div>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->
  </div>

  <div class="modal fade" id="confirm-modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          Voulez-vous vraiment supprimer cette autorisation ?
        </div>
        <form action="{{route('demandeMHDelete')}}" method="post">
            @csrf
            <input type="hidden" id="idDel" name="idD">
            <div class="modal-footer">
                <button type="submit" class="btn btn-danger">Oui</button>
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Non</button>
            </div>
        </form>
      </div>
    </div>
  </div>

  <div class="modal fade" id="personelmodal" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
          <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">Enregistrement personnel</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <div class="container">
                  <form id="form" method="post" action="">
                      @csrf
                      <div class="row">
                            <input type="hidden" id="id" name="id">
                            <div style="margin-top: 5px" class="form-group col-md-8">
                                <label for="idO">Occupant</label>
                                <select id="idO" name="idO" class="form-control">
                                  <option selected></option>
                                  @foreach ($occupants as $personnel)
                                        <option value="{{ $personnel->idOccupant }}"> {{ $personnel->nomOccupant }} {{ $personnel->prenomOccupant }} </option>
                                  @endforeach
                                </select>
                              </div>
                            <div class="form-group col-md-4">
                              <label for="dateD" class="col-form-label">Date demande</label>
                              <input type="date" class="form-control" name="dateD" id="dateD">
                            </div>
                            <div class="form-group col-md-4">
                                <label for="nomR" class="col-form-label">Nom du requerant</label>
                                <input type="text" class="form-control" name="nomR" id="nomR">
                              </div>
                            <div class="form-group col-md-4">
                                <label for="prenomR" class="col-form-label">Prénom du réquerant</label>
                                <input type="text" class="form-control" name="prenomR" id="prenomR">
                            </div>
                            <div class="form-group col-md-4">
                                <label for="titreR" class="col-form-label">Titre du requerant</label>
                                <input type="text" class="form-control" name="titreR" id="titreR">
                            </div>
                            <div class="form-group col-md-4">
                                <label for="foncR" class="col-form-label">Fonction du requerant</label>
                                <input type="text" class="form-control" name="foncR" id="foncR">
                            </div>
                            <div class="form-group col-md-4">
                                <label for="dateDS" class="col-form-label">Date de debut du séjour</label>
                                <input type="date" class="form-control" name="dateDS" id="dateDS">
                            </div>
                            <div class="form-group col-md-4">
                                <label for="dateFS" class="col-form-label">Date de fin du séjour</label>
                                <input type="date" class="form-control" name="dateFS" id="dateFS">
                            </div>
                            <div class="form-group col-md-12">
                                <label for="motif" class="col-form-label">Motif</label><br>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="motif" id="inlineRadio1" value="MS">
                                    <label class="form-check-label" for="inlineRadio1">Mission d'enseignement</label>
                                  </div>
                                  <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="motif" id="inlineRadio2" value="PJ">
                                    <label class="form-check-label" for="inlineRadio2">Participation jury</label>
                                  </div>
                                  <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="motif" id="inlineRadio3" value="AM">
                                    <label class="form-check-label" for="inlineRadio3">Autre motif</label>
                                  </div>
                            </div>

                               <div class="container">
                                    <div class="row" id="mission">
                                        <div class="form-group col-md-4" >
                                            <label for="volumeH" class="col-form-label">Volume horaire</label>
                                            <input type="text" class="form-control" name="volumeH" id="volumeH">
                                        </div>
                                        <div class="form-group col-md-4">
                                            <label for="discipline" class="col-form-label">Discipline</label>
                                            <input type="text" class="form-control" name="discipline" id="discipline">
                                        </div>
                                        <div class="form-group col-md-4">
                                            <label for="cadre" class="col-form-label">cadre</label>
                                            <input type="text" class="form-control" name="cadre" id="cadre">
                                        </div>
                                    </div>
                               </div>
                        </div>
                        <div class="container">
                            <div class="row" id="participation">
                                <div class="form-group col-md-4" >
                                    <label for="departement" class="col-form-label">Departement</label>
                                    <input type="text" class="form-control" name="departement" id="departement">
                                </div>
                                <div class="form-group col-md-4">
                                    <label for="dateSou" class="col-form-label">Date de soutenance</label>
                                    <input type="date" class="form-control" name="dateSou" id="dateSou">
                                </div>
                                <div class="form-group col-md-4">
                                    <label for="theme" class="col-form-label">Thème</label>
                                    <input type="text" class="form-control" name="theme" id="theme">
                                </div>
                            </div>
                       </div>
                       <div class="container">
                        <div class="row" id="autre">
                            <div class="form-group col-md-12" >
                                <label for="autre" class="col-form-label">Entrez le motif</label>
                                <input type="text" class="form-control" name="autre" id="autre">
                            </div>
                        </div>
                   </div>


                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Annuler</button>
                        <button type="submit" name="envoyer" id="submit" class="btn btn-primary">Enregistrer</button>
                      </div>
                  </form>
              </div>
            </div>

      </div>
    </div>
  </div>
  <script src="../plugins/jquery/jquery.min.js"></script>


<script type="text/javascript">
    $(document).ready(function(){
        $('#mission').hide();
        $('#participation').hide();
        $('#autre').hide();
        $('#personelmodal').on('show.bs.modal', function(event) {

        var button = $(event.relatedTarget);
        if (button.data('type') === "ajout") {
            $('.modal-title').text('Créer un personnel');
            $('#idO').val('');
            $('#dateE').val('');
            $('#dateps').val('');
            $('#montantChiffre').val('');
        $('#montantLettre').val('');

            $("#form").attr('action', "{{route('demandeMHSSave')}}");

            $('#update-btn').hide();
            $('#save-btn').show();
        } else {
        $('.modal-title').text('Modifier les information d\'un personnel');
        var id = button.data('id');



        $('#idO').val(id);



        $("#form").attr('action', "{{route('autorisationPUpdate')}}");


        $('#save-btn').hide();
        $('#update-btn').show();
      }


    });

    //Fonction permettant d'ouvrir le modal de confirmation pour la suppression
    $('#confirm-modal').on('show.bs.modal', function(event) {
        var button = $(event.relatedTarget);
        var id = button.data('id');
        $('.modal-title').text('Confirmation');
        $('#idDel').val(id);
    })

    $('#inlineRadio1').click(function (e) {
        $('#mission').show();
        $('#participation').hide();
        $('#autre').hide();
        $('#inlineRadio2').prop('checked', false)
        $('#inlineRadio3').prop('checked', false)


    });
    $('#inlineRadio2').click(function (e) {
        $('#participation').show();
        $('#mission').hide();
        $('#autre').hide();
        $('#inlineRadio1').prop('checked', false)
        $('#inlineRadio3').prop('checked', false)



    });
    $('#inlineRadio3').click(function (e) {
        $('#autre').show();
        $('#mission').hide();
        $('#participation').hide();
        $('#inlineRadio1').prop('checked', false)
        $('#inlineRadio2').prop('checked', false)


    });





    });
    $(function(){
        $('#form').validate({

        rules: {
            nom: {
                required: true
            },
            prenom: {
                required: true
            },
            tel: {
                min: 0,
                required: true
            },

        },
        messages: {

            nom: {
                required: "Le nom est requis !",
            },
            prenom: {
                required: "Le prenom est requis !",
            },
            tel: {
                required: "Le téléphone est requis !",
            },


        },
        errorElement: 'span',
        errorPlacement: function(error, element) {
        error.addClass('invalid-feedback');
        element.closest('.form-group').append(error);
        },
        highlight: function(element, errorClass, validClass) {
        $(element).addClass('is-invalid');

        },
        unhighlight: function(element, errorClass, validClass) {
        $(element).removeClass('is-invalid');
        }
        });
    })


</script>








