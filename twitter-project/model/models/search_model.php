<?php 

require_once ('database.php');


class Search extends DB
{

    function __construct() {
            parent::__construct();
    }

    public function search_users($search) {
        try {
            $query = $this->db->prepare("SELECT * FROM users WHERE display_name LIKE ? OR username LIKE ?");
            $query->execute(array($search."%","".$search."%"));
            
            if ($query->rowCount() > 0) {

                $result=$query->fetchAll(PDO::FETCH_OBJ);
                return $result;
            }
            $query->closeCursor();
        } catch (PDOException $e) {
            exit($e->getMessage());
        } 

    }

    public function getUsers($search) {

        try {
            $query = $this->db->prepare("SELECT * FROM users WHERE display_name=$search ORDER BY display_name");
            $query->bindParam("username", $search, PDO::PARAM_STR);
            $query->bindParam("display_name", $search, PDO::PARAM_STR);
            $query->bindParam("id_user", $id_user, PDO::PARAM_STR);
         
            $query->execute(array($search));
            
            if ($query->rowCount() > 0) {

                $result=$query->fetchAll(PDO::FETCH_OBJ);
                print_r($result);
                return $result;
            }
            $query->closeCursor();
        } catch (PDOException $e) {
            exit($e->getMessage());
        }
    }

}

