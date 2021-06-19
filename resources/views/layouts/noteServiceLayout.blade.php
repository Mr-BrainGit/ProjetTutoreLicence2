


<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-4">
            <h1>Notes de service</h1>
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
                    <h3 class="card-title">Liste des notes de service</h3>
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
                  <th>Destinataire</th>
                  <th>Signataire</th>
                  <th>Description</th>
                  <th>Actions</th>

                </tr>
                </thead>
                <tbody>
                    @foreach ($noteService as $note)
                    <tr>
                        <td style="padding-top:17px;">{{ $note->libelleNoteS }}</td>
                        <td style="padding-top:17px;">{{ $note->nomCompletSignataire }}</td>

                        <td style="padding-top:17px;">{!! $note->corpsNoteS !!}</td>
                        <td>
                            <form action="{{ route('noteServPrint') }}" method="post">
                                @csrf
                                <input type="hidden" name="id" value="{{ $note->idNoteS }}">
                                <button type="submit"
                                    id="edit"
                                    data-type="edit"
                                    data-id="{{ $note->idNoteS }} "
                                    class="btn btn-success btn-sm"><i class="fa fa-print"></i>
                            </button>
                            <button type="button" data-id="{{ $note->idNoteS }} " data-toggle="modal" data-target="#confirm-modal" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></button>
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
          Voulez-vous vraiment supprimer cette note ?
        </div>
        <form action="{{route('noteServDelete')}}" method="post">
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
              <h5 class="modal-title" id="exampleModalLabel">Enregistrement d'une note de service</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <div class="container">
                  <form id="form" method="post" action="" enctype="multipart/form-data">
                      @csrf
                      <input type="hidden" id="idD" name="idD">
                      <div class="row">

                            <div class="form-group col-md-6">
                              <label for="destinataire" class="col-form-label">Destinataire</label>
                              <input type="text" class="form-control" name="destinataire" id="dest">
                            </div>
                            <div class="form-group col-md-6">
                                <label for="signataire">Signataire</label>
                                <select id="sign" name="signataire" class="form-control">
                                  <option>...</option>
                                    @foreach ($signataires as $signataire)
                                            <option value="{{ $signataire->idSignataire }}"> {{ $signataire->nomCompletSignataire }} </option>
                                    @endforeach
                                </select>
                              </div>
                        </div>

                        <div class="row">
                            <div class="form-group col-md-12">
                                <textarea class="ckeditor form-control" id="desc" name="description"></textarea>
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
                $('#dest').val('');
                $('#sign').val('');
                $('#desc').val('');

                $("#form").attr('action', "{{route('noteServSave')}}");

                $('#update-btn').hide();
                $('#save-btn').show();
            } else {
            $('.modal-title').text('Modifier les information d\'un personnel');

            var destinataire = button.data('dest');
            var sign = button.data('nom');
            var desc = button.data('prenom')
            $('#dest').val(destinataire);
            $('#sign').val(sign);
            $('#desc').val(desc);
            alert(desc);
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







