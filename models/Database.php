<?php
class Database
{   
    // Connection to database method
    public function connect()
    {
        try
         {
        // utiliser singleton pour ne creer qu'un seul objet
            $bdd = new PDO('mysql:host=localhost;dbname=travaux;port=3306;charset=utf8', 'root', 'root');
            return $bdd; 
        }
        catch(Exception $e)
        {
            die('Erreur : '.$e->getMessage());
        }
    }    
}