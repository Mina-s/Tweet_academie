<?php

session_start();

require_once ('../model/models/user.php');
require_once ('../helpers/fonction.php');

$new_user = new User();

$message = '';

if(!isset($_SESSION['id_user'])) {
//     header('location:register.php');
}

if(isset($_POST['register']) && !empty($_POST['register'])){

        $username = clean($_POST["username"]);
        $display_name = clean($_POST["display_name"]);
        $username = "@".$username;
        $email=clean($_POST['email']);
        $birthdate = $_POST['birthdate'];
        $password = clean($_POST["password"]);
        $confirm_password = clean($_POST["confirm_password"]);

        if (empty($diplay_name)) {  
            $message = '<p><label>Display_name field is required!</label></p>';
        } 
        if (empty($username)) {  
            $message = '<p><label>Username field is required!</label></p>';
        } 
        if (empty($email)) {  
            $message = '<p><label>Email field is required!</label></p>';
        } 
        else if (empty($password) || empty($confirm_password)) {
            $message = '<p><label>Password field is required!</label></p>';
        } 
        else if($password != $confirm_password){
            $message = '<p><label>Password not match</label></p>';
            }
        else if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $message = ' Invalid email address!';
        }
         else if ($new_user->isEmail($email)) {
            $message = '<p><label>Email is already in use!</label></p>';
        
        } 
        else if ($new_user->isUsername($username)) {
            $message = '<p><label>Username is already in use!</label></p>';
        }
        else if (getAge($birthdate)< 12) {
            $message = '<p><label>You are to young!</label></p>';

        }
        else {
            $user =$new_user->Register($email,$username,$display_name,$birthdate, $password);
            // set session et redirect 
            $_SESSION['id_user'] = $user;

            $message = '<label>Registration Completed</label>';

            header("Location: ../controleur/home.php");
        }
}
 
 



include ('../views/register_html.php');

?>