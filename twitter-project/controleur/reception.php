
<?php
session_start();
require_once ('../model/models/user.php');
$new_user = new User();
$user = $new_user->UserDetails($_SESSION['id_user']); // get user details

$bdd = new PDO('mysql:host=localhost; dbname=tweet_academy', 'root', 'root');

if(isset($_SESSION['id_user'])AND !empty($_SESSION['id_user'])) {

$msg = $bdd->prepare('SELECT * FROM private_msg WHERE id_target = ?');
$msg->execute(array($_SESSION['id_user']));
$msg_nbr = $msg->rowCount();

 ?>


<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
        <meta charset="utf-8">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.form/4.2.2/jquery.form.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
    <title>Boîte de reception</title>
  </head>
  <body>

  <div class="container">
     <?php
            include ('../views/partials/menu_html.php');
      ?>
    <a href="envoi.php">Envoyer un message</a>
    <h3>Votre boîte de réception :</h3>
    <?php
    if($msg_nbr == 0){
      echo 'Aucun message...';
    }
    while($m=$msg->fetch()) {
      $pseudo_exp = $bdd->prepare('SELECT username FROM users WHERE id_user = ?');
      $pseudo_exp->execute(array($m['id_source']));
      $pseudo_exp = $pseudo_exp->fetch();
      $pseudo_exp = $pseudo_exp['username'];
      ?>
      <b><span style="color:blue"><?= $pseudo_exp ?></span> Vous a envoyé : </b><br/>
      <?= $m['text'] ?><br/>
       <span style="color:grey">-------------------------------------</span><br/>

    <?php } ?>
    </div>


  </body>
</html>
<?php
} ?>
