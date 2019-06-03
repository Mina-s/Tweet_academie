<?php

session_start();

require_once ('../model/models/user.php');
require_once ('../helpers/fonction.php');

$user = new User();

$message = '';

if(!isset($_SESSION['id_user'])) {
    // header('location:login.php');
}

if(isset($_POST['login']) && !empty($_POST['login'])){
    

    $email=clean($_POST['email']);
    $password = clean($_POST["password"]);

    if (empty($email)) {  
        $message = '<p><label>Email field is required!</label></p>';
    }
    else if (empty($password)) {
        $message = '<p><label>Password field is required!</label></p>';
    } 
    else if($user->isEmail($email) == false){

        $message = '<label>Wrong Email</labe>';
    }
    else {
      
            $id_user = $user->Login($email,$password); 
            if($id_user > 0) {
                $_SESSION['id_user'] = $id_user;
                header("Location: ../controleur/home.php"); 
                print_r($_SESSION);
            }
            else 
            {
                $message = '<label>Wrong Password</label>';
            }
       
       }
    }


    include ('../views/login_html.php');
      
     

    
 
?>