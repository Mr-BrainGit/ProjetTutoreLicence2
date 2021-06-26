


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
              <table style="border: 2px solid rgb(182, 182, 182)" id="example1" class="table table-bordered ">
                <thead >
                <tr>
                  <th style="border-bottom: 1px solid rgb(180, 176, 176); padding: 7px">Matricule</th>
                  <th style="border-bottom: 1px solid rgb(180, 176, 176);; padding: 7px">Nom</th>
                  <th style="border-bottom: 1px solid rgb(180, 176, 176);; padding: 7px">Prénom (s)</th>
                  <th style="border-bottom: 1px solid rgb(180, 176, 176);; padding: 7px">Adresse</th>
                  <th style="border-bottom: 1px solid rgb(180, 176, 176);; padding: 7px">Sexe</th>
                  <th style="border-bottom: 1px solid rgb(180, 176, 176);; padding: 7px">Fonction</th>
                  <th style="border-bottom: 1px solid rgb(180, 176, 176);; padding: 7px">Actions</th>

                </tr>
                </thead>
                <tbody>

                    @foreach ($personnels as $personnel)
                    <tr>
                        <td style="padding: 7px"> {{ $personnel->matricule }} </td>
                        <td style="padding: 7px;">{{ $personnel->nom }}</td>
                        <td style="padding: 7px;">{{ $personnel->prenom }}</td>
                        <td style="padding: 7px;">{{ $personnel->adresse }}</td>
                        <td style="padding: 7px;">{{ $personnel->sexe }}</td>
                        <td style="padding: 7px;">{{ $personnel->libelleFonction }}</td>
                        <td style="padding: 7px;">
                            <button style="border-radius: 5px" type="button" id="matCert" data-matricule="{{ $personnel->matricule }} " data-toggle="modal" data-target="#certificat-modal"  class="btn btn-success btn-sm"> Documents</button>
                            <button style="border-radius: 50%" type="button"
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
                                    data-structure="{{ $personnel->structurePrecedente }}"
                                    data-fonctionp="{{ $personnel->fonctionPrecedente }}"
                                    data-decision="{{ $personnel->decision }}"
                                    data-echelon="{{ $personnel->idEchellon }}"
                                    data-datep="{{ $personnel->date }}"

                                    data-toggle="modal"
                                    data-target="#personelmodal"
                                    class="btn btn-success btn-sm"><i class="fa fa-edit"></i>
                            </button>
                            <button style="border-radius: 50%" type="button" data-matricule="{{ $personnel->matricule }} " data-toggle="modal" data-target="#confirm-modal" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></button>
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
          <h6>Voulez-vous générer le certificat de cessation de service de ce personnel ?</h6>
         <b> NB: la génération du certificat suppose que le personnel concerné travaille plus pour l'IBAM</b>
        </div>
        <form action="" method="post">
            @csrf
            <input type="hidden" id="matricule" name="matricule">
            <div class="modal-footer">
                <button type="button" data-toggle="modal" data-dismiss="modal" data-target="#cessationmodal" class="btn btn-danger">Oui</button>
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Non</button>
            </div>
        </form>
      </div>
    </div>
  </div>

  <div class="modal fade" id="certificat-modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Quel certificat ?</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          Choisissez le certificat que vous voulez visualiser
        </div>
        <div class="modal-footer">
            <form action="{{route('printCertificat')}}" method="post">
                @csrf
                <input type="hidden" id="matriculeCert1" name="matricule">
                <input type="hidden" id="typeCer" value="1" name="typeCer">
                <button type="submit" class="btn btn-primary">Certificat de prise de service</button>
            </form>

        </div>

      </div>
    </div>
  </div>

  <div class="modal fade" id="personelmodal" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-xl">
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
                          <div class="form-group col-md-3">
                              <label for="matricule" class="col-form-label">Numéro matricule</label>
                              <input type="text" class="form-control" name="matricule" id="mat">
                            </div>
                            <div class="form-group col-md-3">
                              <label for="nom" class="col-form-label">Nom</label>
                              <input type="text" class="form-control" name="nom" id="nom">
                            </div>
                            <div class="form-group col-md-3">
                              <label for="prenom" class="col-form-label">Prénom (s)</label>
                              <input type="text" class="form-control" name="prenom" id="prenom">
                            </div>
                            <div class="form-group col-md-3">
                                <label for="dateNaissance" class="col-form-label">Date de naissance</label>
                                <input type="date" class="form-control" name="dateNaissance" id="dateNaissance">
                            </div>
                        </div>
                    <div class="row">
                        <div class="form-group col-md-3">
                          <label for="adresse" class="col-form-label">Adresse</label>
                          <input type="text" class="form-control" name="adresse" id="adresse">
                        </div>
                        <div style="margin-top: 5px" class="form-group col-md-3">
                          <label for="sexe">Sexe</label>
                          <select id="sexe" name="sexe" class="form-control">
                            <option value="M">Masculin</option>
                            <option value="F">Feminin</option>
                            <option value="AUTRE">Autre</option>
                          </select>
                        </div>
                        <div class="form-group col-md-3">
                            <label for="tel" class="col-form-label">Téléphone</label>
                            <input type="tel" class="form-control" name="tel" id="tel">
                        </div>
                        <div class="form-group col-md-3">
                            <label for="email" class="col-form-label">Adresse email</label>
                            <input type="email" class="form-control" name="email" id="email">
                        </div>
                    </div>
                    <div class="row">

                        <div class="form-group col-md-3">
                          <label for="diplome" class="col-form-label">Diplome</label>
                          <input type="text" class="form-control" name="diplome" id="diplome">
                        </div>
                        <div style="margin-top: 5px" class="form-group col-md-3">
                          <label for="fonction">Fonction</label>
                          <select id="fonction" name="fonction" class="form-control">
                            <option selected>Choose...</option>
                            @foreach ($fonctions as $fonction)
                                  <option value="{{ $fonction->idFonction }}"> {{ $fonction->libelleFonction }} </option>
                            @endforeach
                          </select>
                        </div>
                        <div class="form-group col-md-3">
                          <label for="categorie">Catégorie</label>
                          <select id="categorie" name="categorie" class="form-control">
                                  <option> ... </option>
                            @foreach ($categories as $categorie)
                                  <option value="{{ $categorie->idCategorieP }}"> {{ $categorie->libelleCategorie }} </option>
                            @endforeach
                          </select>
                        </div>
                        <div class="form-group col-md-3">
                          <label for="echellon">Echellon</label>
                          <select id="echelon" name="echellon" class="form-control">
                            <option>...</option>
                            @foreach ($echellons as $echellon)
                                  <option value="{{ $echellon->idEchellon }}"> {{ $echellon->libelleEchelon }} </option>
                            @endforeach
                          </select>
                        </div>
                    </div>



                    <div class="row">
                        <div class="form-group col-md-3">
                            <label for="strucP" class="col-form-label">Structure précédente</label>
                            <input type="strucP" class="form-control" name="strucP" id="strucP">
                          </div>
                          <div class="form-group col-md-3">
                            <label for="foncP" class="col-form-label">Fonction précédente</label>
                            <input type="foncP" class="form-control" name="foncP" id="foncP">
                          </div>
                          <div class="form-group col-md-3">
                            <label for="datePS" class="col-form-label">Date de prise de service</label>
                            <input type="date" class="form-control" name="datePS" id="datePS">
                          </div>
                          <div class="form-group col-md-3">
                            <label for="decision" class="col-form-label">Décision</label>
                            <input type="text" class="form-control" name="decision" id="decision">
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

  <div class="modal fade" id="cessationmodal" tabindex="-1" role="dialog">
    <div class="modal-dialog">
      <div class="modal-content">
          <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">Générer le certificat</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <div class="container">
                  <form id="form" method="POST" action="{{route('personnelDelete')}}">
                      @csrf
                      @method('post')

                      <input type="hidden" id="matricule2" name="matricule">
                      <div class="row">
                            <div class="form-group col-md-12">
                              <label for="dateCess" class="col-form-label">Date de cessation de service</label>
                              <input type="date" class="form-control" name="dateCess" id="dateCess">
                            </div>
                            <div class="form-group col-md-12">
                                <label for="poste" class="col-form-label">Prochain poste</label>
                                <input type="text" class="form-control" name="poste" id="poste">
                              </div>
                            <div class="form-group col-md-12">
                              <label for="affectation" class="col-form-label">Lieu d'affectation (à laisser vide dans le cas d'une retraite)</label>
                              <input type="text" class="form-control" name="affectation" id="affectation">
                            </div>
                            <div class="form-group col-md-12">
                                <label for="decision" class="col-form-label">Décision</label>
                                <input type="text" class="form-control" name="decision" id="decision">
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

        $('#personelmodal').on('show.bs.modal', function(event) {

        var button = $(event.relatedTarget);
        if (button.data('type') === "ajout") {
            $('.modal-title').text('Créer un personnel');
            $('#mat').val('');
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
            $('#echelon').val('');

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
        var echellon = button.data('echelon');
        var structure = button.data('structure');
        var fonctionP = button.data('fonctionp');
        var decision = button.data('decision');
        var datePriseService = button.data('datep');


        $('#mat').val(matricule);
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
        $('#echelon').val(echellon);
        $('#strucP').val(structure);
        $('#foncP').val(fonctionP);
        $('#decision').val(decision);
        $('#datePS').val(datePriseService);




        //Changement de la route dans l'action du formulaire
        $("#form").attr('action', "{{route('updatePersonnel', " + matricule + ")}}");
      }


    })

        $('#certificat-modal').on('show.bs.modal', function(event) {
            var button = $(event.relatedTarget);
            var id = button.data('matricule');
            $('#matriculeCert1').val(id);
            $('#matriculeCert2').val(id);


        });

        //Fonction permettant d'ouvrir le modal de confirmation pour la suppression
        $('#confirm-modal').on('show.bs.modal', function(event) {
            var button = $(event.relatedTarget);
            var id = button.data('matricule');
            $('.modal-title').text('Confirmation');
            $('#matricule').val(id);
            $('#matricule2').val(id);
        });



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
        strucP: {
            required: true
        },
        foncP: {
            required: true
        },
        datePS: {
            required: true
        },
        decision: {
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
            strucP: {
                required: "Cette information est requise pour générer le certificat de prise de service"
            },
            foncP: {
                required: "Cette information est requise pour générer le certificat de prise de service"
            },
            datePS: {
                required: "Cette information est requise pour générer le certificat de prise de service"
            },
            decision: {
                required: "Cette information est requise pour générer le certificat de prise de service"
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







