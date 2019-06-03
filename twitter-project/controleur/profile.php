<?php

session_start();

require_once ('../model/models/user.php');
require_once ('../model/models/twitt.php');
require_once ('../helpers/fonction.php');



$new_user = new User();
$twitt = new Twitt();
$user = $new_user->UserDetails($_SESSION['id_user']); // get user details


$message = '';


if(!isset($_SESSION['id_user']))
{
    header('location:login.php');

}

   
 



include ('../views/profile_html.php'); 


?>

