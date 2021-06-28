
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-4">
            <h1>Signataires</h1>
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
                    <h3 class="card-title">Liste des signataires</h3>
                  </div>
                  <div class="col-md-2">
                    <button type="button" class="btn btn-info" data-type="ajout" data-toggle="modal" data-target="#signatairemodal"><i class="fa fa-plus"></i> Ajouter</button>
                  </div>
              </div>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>Identifiant</th>
                  <th>Nom Prénom (s)</th>
                  <th>Distinction</th>
                  <th>Fonction Signataire</th>
                  <th>Actions</th>

                </tr>
                </thead>
                <tbody>

                    @foreach ($signataires as $signataire)
                    <tr>
                        <td style="padding-top:17px;"> {{ $signataire->idSignataire}} </td>
                        <td style="padding-top:17px;">{{ $signataire->nomCompletSignataire }}</td>
                        <td style="padding-top:17px;">{{ $signataire->distinctionSignataire }}</td>
                        <td style="padding-top:17px;">{{ $signataire->libelleFonction }}</td>
                        <td>
                            <button type="button"
                                    id="edit"
                                    data-type="edit"
                                    data-idsignataire="{{ $signataire->idSignataire }} "
                                    data-nomsompletsignataire="{{ $signataire->nomCompletSignataire}}"
                                    data-distinctionsignataire="{{ $signataire->distinctionSignataire }}"
                                    data-idfonction="{{ $signataire->idFonctionSignataire }}"
                                    data-toggle="modal"
                                    data-target="#signatairemodal"
                                    class="btn btn-success btn-sm"><i class="fa fa-edit"></i>
                            </button>
                            <button type="button" data-idsignataire="{{ $signataire->idSignataire }} " data-toggle="modal" data-target="#confirm-modal" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></button>
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
          Voulez-vous vraiment supprimer ce signataire ?
        </div>
        <form action="{{route('signataireDelete')}}" method="post">
            @csrf
            <input type="hidden" id="idSignataire" name="idSignataire">
            <div class="modal-footer">
                <button type="submit" class="btn btn-danger">Oui</button>
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Non</button>
            </div>
        </form>
      </div>
    </div>
  </div>

  <div class="modal fade" id="signatairemodal" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
          <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">Enregistrement signataire</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <div class="container">
                  <form id="form" method="POST" action="">
                      @csrf
                      @method('post')

                      <input type="hidden" id="OldidSignataire" name="OldidSignataire">
                    <div class="row">
                            <div class="form-group col-md-12">
                              <label for="nom" class="col-form-label">Nom</label>
                              <input type="text" class="form-control" name="nomCompletSignataire" id="nomCompletSignataire">
                            </div>

                    </div>
                    <div class="row">
                      <div class="form-group col-md-12">
                          <label for="distinctionSignataire" class="col-form-label">Distinction Signataire</label>
                          <input type="text" class="form-control" name="distinctionSignataire" id="distinctionSignataire">
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-md-12">
                          <label for="Fonction Signataire" class="col-form-label">Fonction du Signataire</label>
                          <select id="idFonction" name="idFonction" class="form-control">
                            <option >Choisir...</option>
                            @foreach ($fonctions as $fonction)
                                  <option value="{{ $fonction->idFonction }}"> {{ $fonction->libelleFonction }} </option>
                            @endforeach
                          </select>

                        </div>

                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" name="envoyer" id="submit" class="btn btn-primary">Send message</button>
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

        $('#signatairemodal').on('show.bs.modal', function(event) {

        var button = $(event.relatedTarget);
        if (button.data('type') === "ajout") {
            $('.modal-title').text('Créer un signataire');

            $('#nomCompletSignataire').val('');
            $('#distinctionSignataire').val('');
            $('#idFonction').val('');


           //Changement de la route dans l'action du formulaire
            $("#form").attr('action', "{{route('signataireSave')}}");
        } else {
        $('.modal-title').text('Modifier les information d\'un signataire');
        var idSignataire = button.data('idsignataire');
        var nomCompletSignataire = button.data('nomsompletsignataire');
        var distinctionSignataire = button.data('distinctionsignataire');
        var idFonctionSignataire = button.data('idfonction');


        $('#idSignataire').val(idSignataire);
        $('#OldidSignataire').val(idSignataire);
        $('#nomCompletSignataire').val(nomCompletSignataire);
        $('#distinctionSignataire').val(distinctionSignataire);
        $('#idFonction').val(idFonctionSignataire);

         $('#save-btn').hide();
        $('#update-btn').show();

        //Changement de la route dans l'action du formulaire
        $("#form").attr('action', "{{route('updateSignataire', " + idSignataire + ")}}");
      }


    })

    //Fonction permettant d'ouvrir le modal de confirmation pour la suppression
    $('#confirm-modal').on('show.bs.modal', function(event) {
      var button = $(event.relatedTarget);
      var id = button.data('idsignataire');
      $('.modal-title').text('Confirmation');
      $('#idSignataire').val(id);
    })

    });


    //Fonction de validation des champs du formulaire à adapter en fonction des
    //champs du formulaire
    $(function(){
        $('#form').validate({

        rules: {
        nomCompletSignataire: {
            required: true
        },
        distinctionSignataire: {
            required: true
        },
        idFonction: {
            required: true
        },

        },
        messages: {
            nomCompletSignataire: {
                required: "Le nom est requis !",
            },
            distinctionSignataire: {
                required: "La distinction est requis !",
            },
            idFonction: {
                required: "La Fonction Signataire est requis !",
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
