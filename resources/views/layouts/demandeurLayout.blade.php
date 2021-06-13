


<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-4">
            <h1>Demandeurs</h1>
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
                    <h3 class="card-title">Liste des demandeurs</h3>
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
                  <th>Prénom (s)</th>
                  <th>Téléphone</th>
                  <th>Actions</th>

                </tr>
                </thead>
                <tbody>

                    @foreach ($demandeurs as $demandeur)
                    <tr>
                        <td style="padding-top:17px;">{{ $demandeur->nomDemandeur }}</td>
                        <td style="padding-top:17px;">{{ $demandeur->prenomDemandeur }}</td>

                        <td style="padding-top:17px;">{{ $demandeur->tel }}</td>
                        <td>
                            <button type="button"
                                    id="edit"
                                    data-type="edit"
                                    data-id="{{ $demandeur->idDemandeur }} "
                                    data-nom="{{ $demandeur->nomDemandeur }}"
                                    data-prenom="{{ $demandeur->prenomDemandeur }}"
                                    data-tel="{{ $demandeur->tel }}"
                                    data-toggle="modal"
                                    data-target="#personelmodal"
                                    class="btn btn-success btn-sm"><i class="fa fa-edit"></i>
                            </button>
                            <button type="button" data-id="{{ $demandeur->idDemandeur }} " data-toggle="modal" data-target="#confirm-modal" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></button>
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
          Voulez-vous vraiment supprimer ce demandeur ?
        </div>
        <form action="{{route('demandeurDelete')}}" method="post">
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
                      <input type="hidden" id="idD" name="idD">
                      <div class="row">

                            <div class="form-group col-md-12">
                              <label for="nom" class="col-form-label">Nom</label>
                              <input type="text" class="form-control" name="nom" id="nom">
                            </div>
                            <div class="form-group col-md-12">
                              <label for="prenom" class="col-form-label">Prénom (s)</label>
                              <input type="text" class="form-control" name="prenom" id="prenom">
                            </div>
                            <div class="form-group col-md-12">
                                <label for="tel" class="col-form-label">Téléphone</label>
                                <input type="tel" class="form-control" name="tel" id="tel">
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
            $('#nom').val('');
            $('#prenom').val('');
            $('#tel').val('');

            $("#form").attr('action', "{{route('demandeurSave')}}");

            $('#update-btn').hide();
            $('#save-btn').show();
        } else {
        $('.modal-title').text('Modifier les information d\'un personnel');
        var nom = button.data('nom');
        var prenom = button.data('prenom');
        var tel = button.data('tel');
        var id = button.data('id');



        $('#nom').val(nom);
        $('#prenom').val(prenom);
        $('#idD').val(id);

        $('#tel').val(tel);
        $("#form").attr('action', "{{route('demandeurUpdate', " + id + ")}}");


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







