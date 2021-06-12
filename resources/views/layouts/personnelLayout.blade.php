


<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-4">
            <h1>Personnels</h1>
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
                    <h3 class="card-title">Liste du personnel</h3>
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
                  <th>Matricule</th>
                  <th>Nom</th>
                  <th>Prénom (s)</th>
                  <th>Adresse</th>
                  <th>Sexe</th>
                  <th>Fonction</th>
                  <th>Actions</th>

                </tr>
                </thead>
                <tbody>

                    @foreach ($personnels as $personnel)
                    <tr>
                        <td style="padding-top:17px;"> {{ $personnel->matricule }} </td>
                        <td style="padding-top:17px;">{{ $personnel->nom }}</td>
                        <td style="padding-top:17px;">{{ $personnel->prenom }}</td>
                        <td style="padding-top:17px;">{{ $personnel->adresse }}</td>
                        <td style="padding-top:17px;">{{ $personnel->sexe }}</td>
                        <td style="padding-top:17px;">{{ $personnel->libelleFonction }}</td>
                        <td>
                            <button type="button"
                                    id="edit"
                                    data-type="edit"
                                    data-matricule="{{ $personnel->matricule }} "
                                    data-nom="{{ $personnel->nom }}"
                                    data-prenom="{{ $personnel->prenom }}"
                                    data-adresse="{{ $personnel->adresse }}"
                                    data-sexe="{{ $personnel->sexe }}"
                                    data-fonction="{{ $personnel->idFonction }}"
                                    data-tel="{{ $personnel->telephone }}"
                                    data-email="{{ $personnel->email }}"
                                    data-diplome="{{ $personnel->diplome }}"
                                    data-datenaissance="{{ $personnel->dateNaissance }}"
                                    data-categorie="{{ $personnel->idCategorieP }}"
                                    data-echellon="{{ $personnel->idEchellon }}"
                                    data-toggle="modal"
                                    data-target="#personelmodal"
                                    class="btn btn-success btn-sm"><i class="fa fa-edit"></i>
                            </button>
                            <button type="button" data-matricule="{{ $personnel->matricule }} " data-toggle="modal" data-target="#confirm-modal" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></button>
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
          Voulez-vous vraiment supprimer ce personnel ?
        </div>
        <form action="{{route('personnelDelete')}}" method="post">
            @csrf
            <input type="hidden" id="matricule" name="matricule">
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
                  <form id="form" method="POST" action="">
                      @csrf
                      @method('post')

                      <input type="hidden" id="Oldmatricule" name="Oldmatricule">
                      <div class="row">
                          <div class="form-group col-md-4">
                              <label for="matricule" class="col-form-label">Numéro matricule</label>
                              <input type="text" class="form-control" name="matricule" id="matricule">
                            </div>
                            <div class="form-group col-md-4">
                              <label for="nom" class="col-form-label">Nom</label>
                              <input type="text" class="form-control" name="nom" id="nom">
                            </div>
                            <div class="form-group col-md-4">
                              <label for="prenom" class="col-form-label">Prénom (s)</label>
                              <input type="text" class="form-control" name="prenom" id="prenom">
                            </div>
                        </div>
                    <div class="row">
                      <div class="form-group col-md-4">
                          <label for="dateNaissance" class="col-form-label">Date de naissance</label>
                          <input type="date" class="form-control" name="dateNaissance" id="dateNaissance">
                        </div>
                        <div class="form-group col-md-4">
                          <label for="adresse" class="col-form-label">Adresse</label>
                          <input type="text" class="form-control" name="adresse" id="adresse">
                        </div>
                        <div class="form-group col-md-4">
                          <label for="sexe">Sexe</label>
                          <select id="sexe" name="sexe" class="form-control">
                            <option value="M">Masculin</option>
                            <option value="F">Feminin</option>
                            <option value="AUTRE">Autre</option>
                          </select>
                        </div>
                    </div>
                    <div class="row">
                      <div class="form-group col-md-4">
                          <label for="tel" class="col-form-label">Téléphone</label>
                          <input type="tel" class="form-control" name="tel" id="tel">
                        </div>
                        <div class="form-group col-md-4">
                          <label for="email" class="col-form-label">Adresse email</label>
                          <input type="email" class="form-control" name="email" id="email">
                        </div>
                        <div class="form-group col-md-4">
                          <label for="diplome" class="col-form-label">Diplome</label>
                          <input type="text" class="form-control" name="diplome" id="diplome">
                        </div>
                    </div>

                    <div class="row">
                      <div class="form-group col-md-4">
                          <label for="fonction">Fonction</label>
                          <select id="fonction" name="fonction" class="form-control">
                            <option selected>Choose...</option>
                            @foreach ($fonctions as $fonction)
                                  <option value="{{ $fonction->idFonction }}"> {{ $fonction->libelleFonction }} </option>
                            @endforeach
                          </select>
                        </div>
                        <div class="form-group col-md-4">
                          <label for="categorie">Catégorie</label>
                          <select id="categorie" name="categorie" class="form-control">
                                  <option selected> ... </option>
                            @foreach ($categories as $categorie)
                                  <option value="{{ $categorie->idCategorieP }}"> {{ $categorie->libelleCategorie }} </option>
                            @endforeach
                          </select>
                        </div>
                        <div class="form-group col-md-4">
                          <label for="echellon">Echellon</label>
                          <select id="echellon" name="echellon" class="form-control">
                            <option selected>...</option>
                            @foreach ($echellons as $echellon)
                                  <option value="{{ $echellon->idEchellon }}"> {{ $echellon->libelleEchelon }} </option>
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

        $('#personelmodal').on('show.bs.modal', function(event) {

        var button = $(event.relatedTarget);
        if (button.data('type') === "ajout") {
            $('.modal-title').text('Créer un personnel');
            $('#matricule').val('');
            $('#nom').val('');
            $('#prenom').val('');
            $('#dateNaissance').val('');
            $('#adresse').val('');
            $('#sexe').val('');
            $('#tel').val('');
            $('#email').val('');
            $('#diplome').val('');
            $('#fonction').val('');
            $('#categorie').val('');
            $('#echellon').val('');

           //Changement de la route dans l'action du formulaire
            $("#form").attr('action', "{{route('personnelSave')}}");
        } else {
        $('.modal-title').text('Modifier les information d\'un personnel');
        var matricule = button.data('matricule');
        var nom = button.data('nom');
        var prenom = button.data('prenom');
        var dateNaissance = button.data('datenaissance');
        var adresse = button.data('adresse');
        var sexe = button.data('sexe');
        var tel = button.data('tel');
        var email = button.data('email');
        var diplome = button.data('diplome');
        var fonction = button.data('fonction');
        var categorie = button.data('categorie');
        var echellon = button.data('echellon');

        $('#matricule').val(matricule);
        $('#Oldmatricule').val(matricule);
        $('#nom').val(nom);
        $('#prenom').val(prenom);
        $('#dateNaissance').val(dateNaissance);
        $('#adresse').val(adresse);
        $('#sexe').val(sexe);
        $('#tel').val(tel);
        $('#email').val(email);
        $('#diplome').val(diplome);
        $('#fonction').val(fonction);
        $('#categorie').val(categorie);
        $('#echellon').val(echellon);

        //Changement de la route dans l'action du formulaire
        $("#form").attr('action', "{{route('updatePersonnel', " + matricule + ")}}");
      }


    })

    //Fonction permettant d'ouvrir le modal de confirmation pour la suppression
    $('#confirm-modal').on('show.bs.modal', function(event) {
      var button = $(event.relatedTarget);
      var id = button.data('matricule');
      $('.modal-title').text('Confirmation');
      $('#matricule').val(id);
    })
    
    });

    
    //Fonction de validation des champs du formulaire à adapter en fonction des 
    //champs du formulaire
    $(function(){
        $('#form').validate({

        rules: {
        matricule: {
            required: true
        },
        nom: {
            required: true
        },
        prenom: {
            required: true
        },
        dateNaissance: {
            required: true
        },
        adresse: {
            required: true
        },
        sexe: {
            required: true
        },
        tel: {
            required: true
        },
        email: {
            required: true,
            email: true
        },
        diplome: {
            required: true
        },
        fonction: {
            required: true
        },
        categorie: {
            required: true
        },
        echellon: {
            required: true
        },
        
        
        },
        messages: {
            matricule: {
                required: "Le matricule est requis !",
            },
            nom: {
                required: "Le nom est requis !",
            },
            prenom: {
                required: "Le prenom est requis !",
            },
            dateNaissance: {
                required: "La date de naissance fournie !",
            },
            adresse: {
                required: "L'adresse doit être fournie !",
            },
            sexe: {
                required: "Le sexe est requis !",
            },
            tel: {
                required: "Le numéro de téléphone doit être fourni !"
            },
            email: {
                required: "L'adresse email est requis !",
                email: "Entrez une adresse valide !"
            },
            diplome: {
                required: "Le diplome est requis !"
            },
            fonction: {
                required: "La fonction est requis !"
            },
            categorie: {
                required: "La catégorie est requis !"
            },
            echellon: {
                required: "L'echellon est requis !"
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







