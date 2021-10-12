<!DOCTYPE html>
<html lang="fr">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="description" content="">

  <title>Interventions</title>
  <!-- Bootstrap core CSS -->
  <!-- CSS only -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-uWxY/CJNBR+1zjPWmfnSnVxwRheevXITnMqoEIeG1LJrdI0GlVs/9cVSyPYXdcSF" crossorigin="anonymous">
  <!-- JavaScript Bundle with Popper -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-kQtW33rZJAHjgefvhyyzcGF3C5TFyBQBA13V1RKPf4uH+bwyzQxZ6CmMZHmNBEfJ" crossorigin="anonymous"></script>

  <!-- Favicon -->
  <link rel="icon" type="image/gif" href="./assets/icons/favicon.svg" />
  <!-- CSS -->
  <link href="./assets/style.css" rel="stylesheet">
</head>

<body>
  <header>
    <!-- Messages d'erreurs -->
    <?php
    if (isset($GLOBALS['errorMessage'])) {
    ?>
      <div class="alert alert-warning alert-dismissible fade show" role="alert">
        <strong>Erreur !</strong> <?= $GLOBALS['errorMessage'] ?>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
      </div>
    <?php } ?>

    <!-- Nav bar -->
    <nav class="navbar navbar-light bg-light">
      <div class="container-fluid">

        <button class="btn btn-outline-success" data-bs-toggle="modal" data-bs-target="#newModal" type="button">Ajouter</button>

        <!-- Search engine form -->
        <form class="d-flex" method="POST" action="/crud/">
          <input class="form-control" type="date" name="dateSearch" placeholder="Date intervention">
          <input type="number" name="etageSearch" class="form-control" min="0" />
          <select name="tacheSearch" class="form-select">
          <option value="">---</option>
            <?php
            foreach ($listTaches as $tache) {
            ?>
              <option value="<?= $tache['id_tache']; ?>"><?= $tache['libelle_tache']; ?></option>
            <?php
            }
            ?>
          </select>
          <button class="btn" type="submit"><img src="./assets/icons/search.svg"></button>
        </form>
      </div>
    </nav>
    <!-- End nav bar -->
  </header>

  <!-- New intervention modal -->
  <div class="modal fade" id="newModal" tabindex="-1">
    <form action="/crud/index.php?new" method="POST" class="formulaire row g-3">

      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title">Ajouter une intervention</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">

            <div class="col-12">
              <label for="inputAddress" class="form-label">Date</label>
              <input type="date" class="form-control" name="date" placeholder="Date intervention">
            </div>
            <div class="col-md-12">
              <label for="inputState" class="form-label">Etage</label>
              <input type="number" name="etage" class="form-control" min="0" />
            </div>

            <div class="col-md-12">
              <label for="inputState" class="form-label">Tache</label>
              <select id="tache" name="tache" class="form-select" onchange="if(this.value=='newTache') document.getElementById('newTache').style ='visibility:visible';
                else  document.getElementById('newTache').style ='visibility:hidden';">
                <?php
                foreach ($listTaches as $tache) {
                ?>
                  <option><?= $tache['libelle_tache']; ?></option>
                <?php
                }
                ?>
                <option value="newTache">Nouvelle tâche : </option>
              </select>
              <input type="text" id="newTache" name="newTache" class="form-control" style="visibility:hidden;" />
            </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-primary">Ajouter</button>
          </div>
        </div>
      </div>
    </form>
  </div>
  <!-- End new intervention modal -->

  <?php if (!empty($loopInterventions)) {
    echo $loopInterventions;
  } ?>
  </div>
</body>

</html>