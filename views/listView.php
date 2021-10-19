<!-- List interventions -->
<?php

ob_start();
// ob_start() démarre la temporisation de sortie. Tant qu'elle est enclenchée, aucune donnée, hormis les en-têtes, n'est envoyée au navigateur, mais temporairement mise en tampon.
?>

<div class="table-responsive listInterventions">
    <table class="table table-hover">
        <thead class="table-dark table-head sticky-top">
            <tr>
                <th scope="col">N°</th>
                <th scope="col">Date intervention</th>
                <th scope="col">Étage intervention</th>
                <th scope="col">Tâche</th>
                <th scope="col">Actions</th>
            </tr>
        </thead>
        <tbody class="table-body">
            <?php
            foreach ($listInterventions as $key => $intervention) {
            ?>
                <tr>
                    <!-- Intervention number -->
                    <td><?= $key + 1 ?></td>
                    <!-- Intervention date -->
                    <td><?php
                        setlocale(LC_TIME, 'fr_FR.utf8', 'fra');
                        echo strftime("%A %#d %B %Y", strtotime($intervention['date_intervention']));
                        ?>
                    </td>
                    <!-- Intervention floor -->
                    <td><?= $intervention['etage_intervention']; ?></td>
                    <!-- Interventions name -->
                    <td><?= $intervention['libelle_tache']; ?></td>
                    <!-- Intervention update button -->
                    <td>
                        <button class="btn" data-bs-toggle="modal" data-bs-target="#updateModal<?= $intervention['id_intervention']; ?>"><img src="./assets/icons/update.svg" title="Modifier intervention"></button>
                        <!-- update intervention modal -->
                        <div class="modal fade" id="updateModal<?= $intervention['id_intervention']; ?>" tabindex="-1">
                            <form action="./index.php?update=<?= $intervention['id_intervention']; ?>" method="POST" class="formulaire row g-3">

                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title">Modifier une intervention</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            <div class="col-12">
                                                <label for="inputAddress" class="form-label">Date</label>
                                                <input type="date" class="form-control" name="date" value="<?= $intervention['date_intervention']; ?>" placeholder="Date intervention">
                                            </div>
                                            <div class="col-md-12">
                                                <label for="inputState" class="form-label">Étage</label>
                                                <input type="number" name="etage" class="form-control" min="0" max="12" value="<?= $intervention['etage_intervention'] ?>" />
                                            </div>
                                            <div class="col-md-12">
                                                <label for="inputState" class="form-label">Tâche</label>
                                                <select name="tache" class="form-select">
                                                    <?php
                                                    foreach ($listTaches as $tache) {
                                                    ?>
                                                        <option value="<?= $tache['id_tache']; ?>" <?php
                                                                                                    if ($tache['id_tache'] == $intervention['id_tache']) echo "selected=\"selected\"";                                                                                                    ?>><?= $tache['libelle_tache']; ?></option>
                                                    <?php
                                                    }
                                                    ?>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fermer</button>
                                            <button type="submit" class="btn btn-success">Modifier</button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <!-- End update intervention modal -->
                    
                        <!-- Delete intervention -->
                        <button class="btn" data-bs-toggle="modal" data-bs-target="#alertDeleteModal"><img src="./assets/icons/delete.svg" title="Supprimer intervention"></button>
                        <!-- update intervention modal -->
                        <div class="modal fade" id="alertDeleteModal" tabindex="-1">
                            <form action="./index.php?delete=<?= $intervention['id_intervention']; ?>" method="POST" class="formulaire row g-3">
                                <!--Confirm delete modal -->
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title">Voulez-vous vraiment supprimer l'intervention</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>

                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Annuler</button>
                                            <button type="submit" class="btn btn-danger">Supprimer</button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <!-- End confirm delete modal -->
                    </td>
                </tr>
            <?php
            }
            ?>
        </tbody>
    </table>
    <!-- End of list interventions -->
</div>
<?php
$loopInterventions =  ob_get_clean();
// ob_get_clean — Lit le contenu courant du tampon de sortie puis l'efface
require_once('skeleton.php');
?>