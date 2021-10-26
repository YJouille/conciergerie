<?php include(__DIR__ . '/header.php');?>



    <!-- Nav bar -->
    <nav class="navbar navbar-light bg-light">
      <div class="container-fluid">
      <!-- Logout button -->
      <a href="?logout" class="btn btn-secondary" type="button">Logout</a>

        <!-- New intervention button -->
        <button class="btn btn-success" data-bs-toggle="modal" data-bs-target="#newModal" type="button">Ajouter une intervention</button>

        <!-- Search engine form -->
        <form class="search-form d-flex rounded" method="POST" action="./"><!--/crud/-->
          <div class="row">
            <div class="col-3">
              <input class="form-control" type="date" name="dateSearch" placeholder="Date intervention" title="Date de l'intervention">
            </div>
            <div class="col-2">
              <input type="number" name="etageSearch" class="form-control" min="0" max="12" title="Étage de l'intervention" />
            </div>
            <div class="col-4">
              <select name="tacheSearch" class="form-select" title="Tache de l'intervention">
                <option value="">---</option>
                <?php
                foreach ($listTaches as $tache) {
                ?>
                  <option value="<?= $tache['id_tache']; ?>"><?= $tache['libelle_tache']; ?></option>
                <?php
                }
                ?>
              </select>
            </div>
            <div class="col-3">
              <button class="btn btn-success btn-search" data-bs-toggle="tooltip" data-bs-placement="top" title="Rechercher une intervention" type="submit">Rechercher</button>
            </div>
          </div>
        </form>
        <!-- End search engine form -->
      </div>
    </nav>
    <!-- End nav bar -->
  </header>



  
  <p class="h3">Conciergerie</p>



  <!-- New intervention modal -->
  <div class="modal fade" id="newModal" tabindex="-1">
    <form action="./index.php?new" method="POST" class="formulaire row g-3">
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
              <label for="inputState" class="form-label">Étage</label>
              <input type="number" name="etage" class="form-control" min="0" max="12" value="0" />
            </div>

            <div class="col-md-12">
              <label for="inputState" class="form-label">Tâche</label>
              <select id="tache" name="tache" class="form-select" onchange="if(this.value=='newTache') document.getElementById('newTache').style ='visibility:visible';
                else  document.getElementById('newTache').style ='visibility:hidden';">
                <?php
                foreach ($listTaches as $tache) {
                ?>
                  <option value="<?= $tache['id_tache']; ?>"><?= $tache['libelle_tache']; ?></option>
                <?php
                }
                ?>
                <option value="newTache">Nouvelle tâche : </option>
              </select>
              <input type="text" id="newTache" name="newTache" class="form-control" style="visibility:hidden;" />
            </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fermer</button>
            <button type="submit" class="btn btn-success">Ajouter</button>
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