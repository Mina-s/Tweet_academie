<?php 

require_once ('database.php');


class Twitt extends DB
{

    function __construct() {
            parent::__construct();
    }

    public function addTwitt($id_user,$content) {

        try {
            $tweet_date = date("Y-m-d") . ' ' . date("H:i:s", STRTOTIME(date('h:i:sa')));
            
            $query = $this->db->prepare("INSERT INTO tweets(id_user,content,tweet_date) VALUES (?,?,?)");
   
            $query->execute(array($id_user,$content,$tweet_date));
        } 
         catch (PDOException $e) {
            exit($e->getMessage());
        }
    }

    public function addTwittAnswer($id_parent,$id_user,$content,$id_child) {

        try {
            $tweet_date = date("Y-m-d") . ' ' . date("H:i:s", STRTOTIME(date('h:i:sa')));
            
            $query = $this->db->prepare("INSERT INTO tweets(id_user,content,tweet_date) VALUES (?,?,?)");
   
            $query->execute(array($id_user,$content,$tweet_date));

            $query2 = $this->db->prepare("INSERT INTO answers(id_parent,id_child) VALUES (?,?)");
            $query2->execute(array($id_parent,$id_child));
        } 
         catch (PDOException $e) {
            exit($e->getMessage());
        }
    }

    public function getTwitt() {

         try {
             $query = $this->db->prepare("SELECT * FROM tweets LEFT JOIN users ON users.id_user=tweets.id_user GROUP BY tweets.id_tweet ORDER BY id_tweet DESC");
             $query->bindParam("id_user", $id_user, PDO::PARAM_STR);
             $query->execute();
             
             if ($query->rowCount() > 0) {
 
                 $result=$query->fetchAll(PDO::FETCH_OBJ);
                 return $result;
             }
             $query->closeCursor();
         } catch (PDOException $e) {
             exit($e->getMessage());
         }
     }
     public function getHisTwitt($id_user) {

        try {
            $query = $this->db->prepare("SELECT * FROM tweets LEFT JOIN users ON users.id_user=tweets.id_user WHERE tweets.id_user=:id_user GROUP BY tweets.id_tweet ORDER BY id_tweet DESC");
            $query->bindParam("id_user", $id_user, PDO::PARAM_STR);
            $query->execute();
            
            if ($query->rowCount() > 0) {

                $result=$query->fetchAll(PDO::FETCH_OBJ);
                return $result;
            }
            $query->closeCursor();
        } catch (PDOException $e) {
            exit($e->getMessage());
        }
    }
    public function countHisTwitt($id_user) {

        try {
            $query = $this->db->prepare("SELECT count(id_tweet)  FROM tweets WHERE tweets.id_user=:id_user ");
            $query->bindParam("id_user", $id_user, PDO::PARAM_STR);
            $query->execute();
            
            if ($query->rowCount() > 0) {

                $result=$query->fetchAll();
                // var_dump($result);
                return $result;
            }
            $query->closeCursor();
        } catch (PDOException $e) {
            exit($e->getMessage());
        }
    }

     public function get_reply_comment($id_user,$id_tweet){

        try {
            $query = $this->db->prepare("SELECT * FROM tweets LEFT JOIN users ON users.id_user=tweets.id_user WHERE  tweets.id_tweet = $id_tweet");
            $query->bindParam("id_user", $id_user, PDO::PARAM_STR);
            $query->execute();
            
            if ($query->rowCount() > 0) {

                $result=$query->fetchAll(PDO::FETCH_OBJ);
           
              
                return $result;
            }
            $query->closeCursor();
        } catch (PDOException $e) {
            exit($e->getMessage());
        }

     }

    


}

// $twitt = new Twitt();
// $twitt->countHisTwitt(3);

