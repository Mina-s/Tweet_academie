<?php
session_start();

require_once ('../model/models/user.php');
require_once ('../helpers/fonction.php');

$new_user = new User();
$user = $new_user->UserDetails($_SESSION['id_user']); // get user details


$message = '';


if(!isset($_SESSION['id_user']))
{
    header('location: ../controleur/login.php');
}


if(isset($_POST['edit_profile']) && !empty($_POST['edit_profile'])) {

    $id_user= $_SESSION['id_user'];
    $username = clean($_POST["username"]);
    // $username = "@".$username;
    $display_name = clean($_POST["display_name"]);
    $email=clean($_POST['email']);
    $phone = clean($_POST['phone']);
    $bio = clean($_POST['bio']);
    $birthdate = $_POST['birthdate'];
    $website = clean($_POST['website']);
    $localisation = clean($_POST['localisation']);
    $password = $_POST['password'];
    $new_password = $_POST['new_password'];

    if (empty($username)) {  
        $message .= '<p><label>Username field is required!</label></p>';
    } 
    if (empty($display_name)) {  
        $message .= '<p><label>Display_name field is required!</label></p>';
    } 
    if (empty($email)) {  
        $message .= '<p><label>Email field is required!</label></p>';
    } 
    if (empty($password)) {
        $message .= '<p><label>Password field is required!</label></p>';
    } 
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $message .= ' Invalid email address!';
    }
    if ($new_user->isEmail($email) && $user->email !== $email ) {
        $message .= '<p><label>Email is already in use!</label></p>';
    
    } 
    if ($new_user->isUsername($username) && $user->username !== $username) {
        $message .= '<p><label>Username is already in use!</label></p>';
    }
    if (getAge($birthdate)< 12) {
        $message .= '<p><label>You are to young!</label></p>';
    }
    if(empty($new_password)) {
        $new_password = $password;
    }
    if(isset($_FILES['avatar']) && !empty($_FILES['avatar']['name'])) {

            $extensionValid= array('jpg','jpeg','gif','png');
            $extensionUpload = extensionUpload($_FILES['avatar']['name']);
    
            if(in_array($extensionUpload,$extensionValid)) {
                $chemin = "../assets/membres/avatar/".$id_user.".".$extensionUpload;
                $avatar = $id_user.".".$extensionUpload;
                $result = move_uploaded_file($_FILES['avatar']['tmp_name'],$chemin);
    
                if($result) {
                    $profile_img = $new_user->UpdateImg($id_user,$avatar);

                }
                else {
                    $message .= '<p><label>Error profile image not upload)!</label></p>';
                }
    
            }
            else {
                $message .= '<p><label>Profile image forma non valid!</label></p>';
            }
    }  
 

        $user =$new_user->Update($id_user,$username,$display_name,$email,$phone,$bio, $birthdate,$website,$localisation,$new_password);

        header("Location: ../controleur/home.php");
    
        

}
include ('../views/edit_profile_html.php'); 
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    

?>