


<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-4">
            <h1>Autorisation passage salle</h1>
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
                    <h3 class="card-title">Liste des autorisations de passage dans les salles</h3>
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
                        <th>Nom</th>
                        <th>Prénom(s)</th>
                        <th>Téléphone</th>
                        <th>Motif</th>
                        <th>Date de la demande</th>
                        <th>Actions</th>
                    </tr>

                </thead>
                <tbody>

                    @foreach ($autorisations as $autorisation)
                    <tr>
                        <td style="padding-top:17px;">{{ $autorisation->nomDemandeur }}</td>

                        <td style="padding-top:17px;">{{ $autorisation->prenomDemandeur }}</td>
                        <td style="padding-top:17px;">{{ $autorisation->tel }}</td>
                        <td style="padding-top:17px;">{{ $autorisation->motif }}</td>
                        <td style="padding-top:17px;">{{ $autorisation->dateDemande }}</td>
                        <td>
                            <form action="{{ route('autorisationPSPrint') }}" method="post">
                                @csrf

                                <button type="submit" data-id="{{ $autorisation->idAutorisationPS }} " class="btn btn-success btn-sm"><i class="fa fa-print"></i></button>
                                <button type="button" data-id="{{ $autorisation->idAutorisationPS }} " data-toggle="modal" data-target="#confirm-modal" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></button>
                                <input type="hidden" name="id" value="{{ $autorisation->idAutorisationPS }} ">
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
        <form action="{{route('autorisationPSDelete')}}" method="post">
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
                            <div style="margin-top: 5px" class="form-group col-md-6">
                                <label for="fonction">Demandeurs</label>
                                <select id="demandeur" name="demandeur" class="form-control">
                                  <option selected></option>
                                  @foreach ($demandeurs as $demandeur)
                                        <option value="{{ $demandeur->idDemandeur }}"> {{ $demandeur->nomDemandeur }} {{ $demandeur->prenomDemandeur }} </option>
                                  @endforeach
                                </select>
                              </div>
                            <div class="form-group col-md-6">
                              <label for="dateD" class="col-form-label">Date de la demande</label>
                              <input type="date" class="form-control" name="dateD" id="dateD">
                            </div>

                            <div class="form-group col-md-6">
                                <label for="motif" class="col-form-label">Motif</label>
                                <input type="text" class="form-control" name="motif" id="motif">
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

        $('#personelmodal').on('show.bs.modal', function(event) {

        var button = $(event.relatedTarget);
        if (button.data('type') === "ajout") {
            $('.modal-title').text('Créer un personnel');
            $('#matricule').val('');
            $('#dateD').val('');
            $('#motif').val('');

            $("#form").attr('action', "{{route('autorisationPSSave')}}");
        } else {
        $('.modal-title').text('Modification');
        var id = button.data('id');
        var de = button.data('matri');
        var dateD = button.data('dated');
        var dateR = button.data('dater');
        var motif = button.data('motif');
        var datePriseEffet = button.data('dateps');
        var id = button.data('id');


        $('#demandeur').val(de);
        $('#dateD').val(dateD);
        $('#dateR').val(dateR);
        $('#motif').val(motif);
        $('#id').val(id);


        $("#form").attr('action', "{{route('autorisationPSUpdate')}}");


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








