<!-- on consrtuit le tableau html des interventions  -->
<?php

ob_start();
// ob_start() démarre la temporisation de sortie. Tant qu'elle est enclenchée, aucune donnée, hormis les en-têtes, n'est envoyée au navigateur, mais temporairement mise en tampon.
?>

<div class="table-responsive listInterventions">
    <!-- List interventions -->
    <table class="table">
        <thead class="table-dark">
            <tr>
                <th scope="col">N°</th>
                <th scope="col">Date intervention</th>
                <th scope="col">Etage intervention</th>
                <th scope="col">Tâche</th>
                <th scope="col">Action</th>
            </tr>
        </thead>
        <tbody>
            <?php
            // var_dump($allInterventions);
            foreach ($listInterventions as $key => $intervention) {
            ?>
                <tr>
                    <td><?= $key + 1 ?></td>
                    <td><?php
                        $originDate =  $intervention['date_intervention'];
                        // $timestamp = strtotime($originDate);
                        // $newDate = date("d-m-Y", $timestamp);
                        // echo $newDate;
                        setlocale(LC_TIME, 'fr_FR.utf8', 'fra');
                        echo strftime("%d %B %G", strtotime($originDate));
                        ?>
                    </td>
                    <td><?= $intervention['etage_intervention']; ?></td>
                    <td><?= $intervention['libelle_tache']; ?></td>
                    <td><button  class="btn" data-bs-toggle="modal" data-bs-target="#updateModal<?= $intervention['id_intervention']; ?>" type="button"><img src="./assets/icons/update_green.svg"></button>
                        <!-- update intervention modal -->
                        <div class="modal fade" id="updateModal<?= $intervention['id_intervention']; ?>" tabindex="-1">
                            <form action="/crud/index.php?update=<?= $intervention['id_intervention']; ?>" method="POST" class="formulaire row g-3">

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
                                                <label for="inputState" class="form-label">Etage</label>
                                                <input type="number" name="etage" class="form-control" min="0" value="<?= $intervention['etage_intervention'] ?>" />
                                            </div>
                                            <div class="col-md-12">
                                                <label for="inputState" class="form-label">Tache</label>
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
                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                            <button type="submit" class="btn btn-primary">Modifier</button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <!-- End update intervention modal -->
                        <button class="btn" type="submit" onclick="document.location='/crud/?delete=<?= $intervention['id_intervention']; ?>'"><img src="./assets/icons/delete_red.svg"></button>
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