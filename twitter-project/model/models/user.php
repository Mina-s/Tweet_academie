<?php 
require_once ('database.php');




class User extends DB
{

    function __construct() {
            parent::__construct();
    }

       //add user

    public function Register($email, $username, $display_name,$birthdate, $password,$avatar='https://pbs.twimg.com/media/C8RPRn6V0AABTxl.jpg' )
    {
    
        try {
            
            $query = $this->db->prepare("INSERT INTO users (email,username,display_name,birthdate, password) VALUES (:email,:username,:display_name,:birthdate,:password)");
            $query->bindParam("email", $email, PDO::PARAM_STR);
            $query->bindParam("username", $username, PDO::PARAM_STR);
            $query->bindParam("display_name", $display_name, PDO::PARAM_STR);
            $query->bindParam("birthdate", $birthdate, PDO::PARAM_STR);
            $enc_password = hash('ripemd160', $password);
            $query->bindParam("password", $enc_password, PDO::PARAM_STR);
            // $query->bindParam("valid",$valid, PDO::PARAM_STR);
            $query->execute();
             return $this->db->lastInsertId();  

        } catch (PDOException $e) {
            exit($e->getMessage());
        }
    }


     //   Check Username
   
     public function isUsername($username)
     {
         try {
             $query = $this->db->prepare("SELECT * FROM users WHERE username=:username");
             $query->bindParam("username", $username, PDO::PARAM_STR);
             $query->execute();
             if ($query->rowCount() > 0) {
                
                 return true;
             } else {
                 return false;
             }
         } catch (PDOException $e) {
             exit($e->getMessage());
         }
     }
  
     //  Check Email
    
     public function isEmail($email)
     {
         try {
             $query = $this->db->prepare("SELECT * FROM users WHERE email=:email");
             $query->bindParam("email", $email, PDO::PARAM_STR);
             $query->execute();
             if ($query->rowCount() > 0) {
                 return true;
             } else {
                 return false;
             }
         } catch (PDOException $e) {
             exit($e->getMessage());
         }
     }

 //Login
    public function Login($display_name,$password,$status_account=1)
    {
        try {
            $query = $this->db->prepare("SELECT id_user FROM users WHERE (display_name=:display_name OR email=:display_name) AND password=:password And status_account=:status_account");
            $query->bindParam("display_name", $display_name, PDO::PARAM_STR);
            $query->bindParam("status_account", $status_account, PDO::PARAM_STR);
            $enc_password = hash('ripemd160', $password);
            $query->bindParam("password", $enc_password, PDO::PARAM_STR);
            $result=$query->execute();
            debug($result);

            if ($query->rowCount() > 0) {
                $result = $query->fetch(PDO::FETCH_OBJ);
                return $result->id_user;
            } 
            else {
                return false;
            }
        } catch (PDOException $e) {
            exit($e->getMessage());
        }
    }

     //get User Details
    
     public function UserDetails($id_user)
     {
         try {
             $query = $this->db->prepare("SELECT * FROM users WHERE id_user=:id_user");
             $query->bindParam("id_user", $id_user, PDO::PARAM_STR);
             $query->execute();
             
             if ($query->rowCount() > 0) {
 
                 return $query->fetch(PDO::FETCH_OBJ);
             }
         } catch (PDOException $e) {
             exit($e->getMessage());
         }
     }

     // get users 
     public function getUsers($id_user) {

        try {
            $query = $this->db->prepare("SELECT * FROM users WHERE id_user != $id_user AND status_account='1' ORDER BY id_user DESC");
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



    //edit profile
    public function Update($id_user,$username,$display_name,$email,$phone,$bio, $birthdate,$website,$localisation,$password)
    {
    
        try {
            $query = $this->db->prepare("UPDATE users SET username=:username,display_name=:display_name, email=:email, phone=:phone, bio=:bio, birthdate=:birthdate,website=:website, localisation=:localisation, password=:password WHERE id_user=:id_user");
            $query->bindParam("username", $username, PDO::PARAM_STR);
            $query->bindParam("display_name", $display_name, PDO::PARAM_STR);
            $query->bindParam("email", $email, PDO::PARAM_STR);
            $query->bindParam("phone", $phone, PDO::PARAM_STR);
            $query->bindParam("bio", $bio, PDO::PARAM_STR);
            $query->bindParam("birthdate", $birthdate, PDO::PARAM_STR);
            $query->bindParam("website", $website, PDO::PARAM_STR);
            $query->bindParam("localisation", $localisation, PDO::PARAM_STR);
            $enc_password = hash('ripemd160', $password);
            $query->bindParam("password", $enc_password, PDO::PARAM_STR);
            $query->bindParam("id_user", $id_user, PDO::PARAM_STR);
            $query->execute();
        
        } catch (PDOException $e) {
            exit($e->getMessage());
        }
    }

    public function UpdateImg($id_user,$avatar) {
        try {
            $query = $this->db->prepare("UPDATE users SET avatar=:avatar WHERE id_user=:id_user");
            $query->bindParam("avatar", $avatar, PDO::PARAM_STR);
            $query->bindParam("id_user", $id_user, PDO::PARAM_STR);
           
            $query->execute();
           
        } catch (PDOException $e) {
            exit($e->getMessage());
        }

    }

    public function countFollower($id_follower) {

        try {
            $query = $this->db->prepare("SELECT count(id_follower)  FROM follow  WHERE id_follower=:id_follower ");
            $query->bindParam("id_follower", $id_follower, PDO::PARAM_STR);
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

    public function countFollowing($id_follower) {

        try {
            $query = $this->db->prepare("SELECT count(id_following)  FROM follow  WHERE id_following=:id_follower ");
            $query->bindParam("id_follower", $id_follower, PDO::PARAM_STR);
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

    
    public function getFollowing($id_user) {

        try {
            $query = $this->db->prepare("SELECT distinct* FROM follow LEFT JOIN users ON users.id_user=follow.id_follower WHERE follow.id_following=:id_user");
            $query->bindParam("id_user", $id_user, PDO::PARAM_STR);
            $query->execute();
            
            if ($query->rowCount() > 0) {

                $result=$query->fetchAll(PDO::FETCH_OBJ);
                // var_dump($result);
                return $result;
            }
            $query->closeCursor();
        } catch (PDOException $e) {
            exit($e->getMessage());
        }
    }


    public function getFollow($id_user) {

        try {
            $query = $this->db->prepare("SELECT distinct* FROM follow LEFT JOIN users ON users.id_user=follow.id_following WHERE follow.id_follower=:id_user");
            $query->bindParam("id_user", $id_user, PDO::PARAM_STR);
            $query->execute();
            
            if ($query->rowCount() > 0) {

                $result=$query->fetchAll(PDO::FETCH_OBJ);
                // var_dump($result);
                return $result;
            }
            $query->closeCursor();
        } catch (PDOException $e) {
            exit($e->getMessage());
        }
    }
    public function disableUser($id_user,$status_account){
      
        try {
            $query = $this->db->prepare("UPDATE users SET status_account=:status_account where id_user=:id_user");
            $query->bindParam("status_account", $status_account, PDO::PARAM_STR);
            $query->bindParam("id_user", $id_user, PDO::PARAM_STR);
            $result = $query->execute();
        } catch (PDOException $e) {
            exit($e->getMessage());
        }
    }


}
// $test= new User;
// $test->getFollow(1);
 
  



?>
