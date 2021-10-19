<?php
require_once('Database.php');

class TacheModel extends Database
{
    /**
     * New Task method
     *
     * This method adds new task to task table
     * @param string $tache Task name
     * @return integer id Last insert id task in task table 
     */
    public function newTache($tache)
    {
        try {
            $sql = 'INSERT INTO tache (libelle_tache) VALUES (:tache);';
            $base = $this->connect();
            $intervention = $base->prepare($sql);
            $intervention->bindValue(':tache', $tache, PDO::PARAM_STR);
            //echo $intervention->debugDumpParams();
            $intervention->execute();
            $intervention->closeCursor();
            return $base->lastInsertId();
        } catch (Exception $e) {
            $GLOBALS['errorMessage'] = 2;
            //die('Erreur : ' . $e->getMessage());
        }
    }

    /**
     * List task method
     *
     * This method lists all tasks from database 
     * @return array $result list tasks
     */
    public function listTaches()
    {
        try {
            $intervention = $this->connect()->prepare('SELECT * FROM tache;');
            $intervention->execute();
            $result = $intervention->fetchAll(PDO::FETCH_ASSOC);
            $intervention->closeCursor();
            return $result;
        } catch (Exception $e) {
            $GLOBALS['errorMessage'] = 2;
            //die('Erreur : ' . $e->getMessage());
        }
    }
}
