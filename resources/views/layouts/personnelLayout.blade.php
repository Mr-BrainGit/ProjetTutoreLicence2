


<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Personnels</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Personnels</li>
            </ol>
          </div>
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
                  <th>Rendering engine</th>
                  <th>Browser</th>
                  <th>Platform(s)</th>
                  <th>Engine version</th>
                  <th>CSS grade</th>
                </tr>
                </thead>
                <tbody>


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
                  <form>
                      <div class="row">
                          <div class="form-group col-md-4">
                              <label for="matricule" class="col-form-label">Numéro matricule</label>
                              <input type="text" class="form-control" id="matricule">
                            </div>
                            <div class="form-group col-md-4">
                              <label for="nom" class="col-form-label">Nom</label>
                              <input type="text" class="form-control" id="nom">
                            </div>
                            <div class="form-group col-md-4">
                              <label for="prenom" class="col-form-label">Prénom (s)</label>
                              <input type="text" class="form-control" id="prenom">
                            </div>
                        </div>
                    <div class="row">
                      <div class="form-group col-md-4">
                          <label for="dateNaissance" class="col-form-label">Date de naissance</label>
                          <input type="date" class="form-control" id="dateNaissance">
                        </div>
                        <div class="form-group col-md-4">
                          <label for="adresse" class="col-form-label">Adresse</label>
                          <input type="text" class="form-control" id="adresse">
                        </div>
                        <div class="form-group col-md-4">
                          <label for="sexe">Sexe</label>
                          <select id="sexe" class="form-control">
                            <option value="M">Masculin</option>
                            <option value="F">Feminin</option>
                            <option value="AUTRE">Autre</option>
                          </select>
                        </div>
                    </div>
                    <div class="row">
                      <div class="form-group col-md-4">
                          <label for="tel" class="col-form-label">Téléphone</label>
                          <input type="tel" class="form-control" id="tel">
                        </div>
                        <div class="form-group col-md-4">
                          <label for="email" class="col-form-label">Adresse email</label>
                          <input type="email" class="form-control" id="email">
                        </div>
                        <div class="form-group col-md-4">
                          <label for="diplome" class="col-form-label">Diplome</label>
                          <input type="text" class="form-control" id="diplome">
                        </div>
                    </div>

                    <div class="row">
                      <div class="form-group col-md-4">
                          <label for="fonction">Fonction</label>
                          <select id="fonction" class="form-control">
                            <option selected>Choose...</option>
                            @foreach ($fonctions as $fonction)
                                  <option value="{{ $fonction->idFonction }}"> {{ $echellon->libelleFonction }} </option>
                            @endforeach
                          </select>
                        </div>
                        <div class="form-group col-md-4">
                          <label for="categorie">Catégorie</label>
                          <select id="categorie" class="form-control">
                                  <option selected> ... </option>
                            @foreach ($categories as $categorie)
                                  <option value="{{ $categorie->idCategorieP }}"> {{ $categorie->libelleCategorie }} </option>
                            @endforeach
                          </select>
                        </div>
                        <div class="form-group col-md-4">
                          <label for="echellon">Echellon</label>
                          <select id="echellon" class="form-control">
                            <option selected>...</option>
                            @foreach ($echellons as $echellon)
                                  <option value="{{ $echellon->idEchellon }}"> {{ $echellon->libelleEchellon }} </option>
                            @endforeach
                          </select>
                        </div>
                    </div>

                  </form>
              </div>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
              <button type="button" class="btn btn-primary">Send message</button>
            </div>
      </div>
    </div>
  </div>
  <script src="../plugins/jquery/jquery.min.js"></script>


<script type="text/javascript">
    $(document).ready(function(){

        $('#personelmodal').on('show.bs.modal', function(event) {

        })
    });
</script>







