<?php
require_once('Database.php');
class InterventionModel extends Database
{
    /**
     * List interventions method
     *
     * This method list all interventions from intervention table
     * @param string $search Search Criteria from search engine form
     * @return array $result List of interventions
     */
    public function listInterventions($search)
    {
        try {
            $intervention = $this->connect()->prepare('
            SELECT id_intervention, 
            date_intervention, 
            etage_intervention, 
            intervention.id_tache, 
            libelle_tache 
            FROM intervention, tache 
            WHERE intervention.id_tache = tache.id_tache 
            ' . $search);
            $intervention->execute();
            //echo $intervention->debugDumpParams();
            $result = $intervention->fetchAll(PDO::FETCH_ASSOC); //PDO::FETCH_ASSOC to have the same keys as in the database
            $intervention->closeCursor();
            return $result;
        } catch (Exception $e) {
            die('Erreur : ' . $e->getMessage());
        }
    }
    /**
     * Delete intervention method
     *
     * This method deletes an intervention from the intervention table
     * @param integer $id id of intervention to delete
     */

    //Method pour supprimer une intervention
    public function deleteIntervention($id)
    {
        try {
            $sql = "DELETE FROM intervention WHERE id_intervention = :id";
            $intervention = $this->connect();
            $intervention = $intervention->prepare($sql);
            $intervention->bindValue(':id', $id, PDO::PARAM_INT);
            // echo $intervention->debugDumpParams();
            // die;
            $intervention->execute();
            $intervention->closeCursor();
        } catch (Exception $e) {
            die('Erreur : ' . $e->getMessage());
        }
    }

    /**
     * New intervention method
     *
     * This method add new intervention to intervention table
     * @param string $date New intervention date
     * @param integer $etage New intervention floor
     * @param integer $idTache idTache of new intervention : revoir cette méthode pour faire avec un integer!!!!!!!!
     *
     */

    public function newIntervention($date, $etage, $tache)
    {
        if ($date == null || $etage == null || $tache == null) {
            $GLOBALS['errorMessage'] = "Vous devez remplir le formulaire !";
        } else {
            $date = htmlspecialchars($date);
            $etage = htmlspecialchars($etage);
            $tache = htmlspecialchars($tache);
            try {
                $sql = "INSERT INTO intervention
                (date_intervention, etage_intervention, id_tache) VALUES
                (:date, :etage ,(SELECT id_tache FROM tache WHERE libelle_tache =:tache));";
                $intervention = $this->connect();
                $intervention = $intervention->prepare($sql);
                $intervention->bindValue(':date', $date, PDO::PARAM_STR);
                $intervention->bindValue(':etage', $etage, PDO::PARAM_INT);
                $intervention->bindValue(':tache', $tache, PDO::PARAM_STR);
                //echo $intervention->debugDumpParams();
                $intervention->execute();
                $intervention->closeCursor();
            } catch (Exception $e) {
                die('Erreur : ' . $e->getMessage());
            }
        }
    }
    
    /**
     * Update intervention method
     *
     * This method updates intervention in intervention table
     * @param integer $idIntervention id of intervention to update
     * @param string $date new date of intervention or the same if date does'nt change
     * @param string $etage new floor of intervention or the same if floor does'nt change
     * @param string $idTache id of new task of intervention or the same if task does'nt change
     */
    public function updateIntervention($idIntervention, $date, $etage, $idTache)
    {
        try {
            $sql = "UPDATE intervention SET date_intervention = '" . $date . "',
                                            etage_intervention = " . $etage . ",
                                            id_tache = " . $idTache . "
                                            WHERE id_intervention =" . $idIntervention . ";";
            $intervention = $this->connect();
            $intervention = $intervention->prepare($sql);
            //echo $intervention->debugDumpParams();
            $intervention->execute();
            $intervention->closeCursor();
        } catch (Exception $e) {
            die('Erreur : ' . $e->getMessage());
        }
    }
}
