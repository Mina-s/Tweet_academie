
<?php
session_start();

require_once ('../model/models/user.php');
require_once ('../model/models/twitt.php');
require_once ('../helpers/fonction.php');

$users = new User();
$twitt = new Twitt();
$message="";

$user = $users->UserDetails($_SESSION['id_user']); // get user details

if(!isset($_SESSION['id_user']))
{
    header('location: ../controleur/login.php');
}
if(!empty($_POST['disable'])){
    $disable=$users->disableUser($_SESSION['id_user'],'0');
    if($user->status_account == 0){
        session_destroy();
        header('location:login.php');
        exit();
    }
}



include ('../views/disable_html.php');


?>