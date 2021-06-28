


<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-4">
            <h1>Fonctions</h1>
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
                    <h3 class="card-title">Liste du fonction</h3>
                  </div>
                  <div class="col-md-2">
                    <button type="button" class="btn btn-info" data-type="ajout" data-toggle="modal" data-target="#fonctionmodal"><i class="fa fa-plus"></i> Ajouter</button>
                  </div>
              </div>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>Identiant</th>
                  <th>Fonction</th>
                  <th>Type de fonction</th>

                </tr>
                </thead>
                <tbody>

                    @foreach ($fonctions as $fonction)

                    <tr>
                        <td style="padding-top:17px;"> {{ $fonction->idFonction }} </td>
                        <td style="padding-top:17px;">{{ $fonction->libelleFonction }}</td>
                        <td style="padding-top:17px;">{{ $fonction->libelleTypeFonction }}</td>
                        <td>
                            <button type="button"
                                    id="edit"
                                    data-type="edit"
                                    data-idfonction="{{ $fonction->idFonction }} "
                                    data-libellefonction="{{ $fonction->libelleFonction }}"
                                    data-idfypefonction="{{ $fonction->idTypeFonction }}"
                                    data-toggle="modal"
                                    data-target="#fonctionmodal"
                                    class="btn btn-success btn-sm"><i class="fa fa-edit"></i>
                            </button>
                            <button type="button" data-idFonction="{{ $fonction->idFonction }} " data-toggle="modal" data-target="#confirm-modal" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></button>
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
          Voulez-vous vraiment supprimer cette fonction ?
        </div>
        <form action="{{route('fonctionDelete')}}" method="post">
            @csrf
            <input type="hidden" id="idFonction" name="idFonction">
            <div class="modal-footer">
                <button type="submit" class="btn btn-danger">Oui</button>
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Non</button>
            </div>
        </form>
      </div>
    </div>
  </div>

  <div class="modal fade" id="fonctionmodal" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
          <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">Enregistrement fonction</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <div class="container">
                  <form id="form" method="POST" action="">
                      @csrf
                      @method('post')

                      <input type="hidden" id="OldidFonction" name="OldidFonction">
                      <div class="row">
                            <div class="form-group col-md-4">
                              <label for="nom" class="col-form-label">Fonction</label>
                              <input type="text" class="form-control" name="libelleFonction" id="libelleFonction">
                            </div>
                            <div class="form-group col-md-4">
                              <label for="prenom" class="col-form-label">type de fonctions</label>
                              <select id="idTypeFonction" name="idTypeFonction" class="form-control">
                                <option selected>Choose...</option>
                                @foreach ($typefonctions as $typefonction)
                                      <option value="{{ $typefonction->idTypeFonction }}"> {{ $typefonction->libelleTypeFonction }} </option>
                                @endforeach
                              </select>
                            </div>
                        </div>


                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Fermer</button>
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

        $('#fonctionmodal').on('show.bs.modal', function(event) {

        var button = $(event.relatedTarget);
        if (button.data('type') === "ajout") {
            $('.modal-title').text('Créer une fonction');
            $('#idFonction').val('');
            $('#libelleFonction').val('');
            $('#idTypeFonction').val('');
           //Changement de la route dans l'action du formulaire
            $("#form").attr('action', "{{route('fonctionSave')}}");
        } else {
        $('.modal-title').text('Modifier les information d\'une fonction');
        var idFonction = button.data('idfonction');
        var libelleFonction = button.data('libellefonction');
        var idTypeFonction = button.data('idfypefonction');

        $('#idFonction').val(idFonction);
        $('#OldidFonction').val(idFonction);
        $('#libelleFonction').val(libelleFonction);
        $('#idTypeFonction').val(idTypeFonction);

        //Changement de la route dans l'action du formulaire
        $("#form").attr('action', "{{route('updateFonction', " + idFonction + ")}}");
      }


    })

    //Fonction permettant d'ouvrir le modal de confirmation pour la suppression
    $('#confirm-modal').on('show.bs.modal', function(event) {
      var button = $(event.relatedTarget);
      var id = button.data('idfonction');
      $('.modal-title').text('Confirmation');
      $('#idFonction').val(id);
    })

    });


    //Fonction de validation des champs du formulaire à adapter en fonction des
    //champs du formulaire
    $(function(){
        $('#form').validate({

        rules: {
        libelleFonction: {
            required: true
        },
        idTypeFonction: {
            required: true
        },


        },
        messages: {
            libelleFonction: {
                required: "Le nom de la fonction requis !",
            },
            idTypeFonction: {
                required: "Le type de la fonction est requis !",
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
