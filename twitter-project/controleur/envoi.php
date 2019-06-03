<?php
session_start();
require_once ('../model/models/user.php');
$new_user = new User();
$user = $new_user->UserDetails($_SESSION['id_user']); // get user details

$bdd = new PDO('mysql:host=localhost; dbname=tweet_academy', 'root', 'root');

if(isset($_SESSION['id_user'])AND !empty($_SESSION['id_user'])) {
if(isset($_POST['envoi_message'])) {
  if(isset($_POST['destinataire'],$_POST['message']) AND !empty($_POST['destinataire']) AND !empty($_POST['message'])) {
    $destinataire = htmlspecialchars($_POST['destinataire']);
    $message = htmlspecialchars($_POST['message']);

    $id_destinataire = $bdd->prepare('SELECT id_user FROM users WHERE username = ?');
    $id_destinataire->execute(array($destinataire));
    $id_destinataire = $id_destinataire->fetch();
    $id_destinataire = $id_destinataire['id_user'];

    $insert = $bdd->prepare('INSERT INTO private_msg(text,id_source,id_target,msg_date) VALUES(?,?,?,now())');
    $insert->execute(array($message,$_SESSION['id_user'],$id_destinataire));


    $error = "Message envoyé !";
  } else {
    $error = "Veuillez remplir tous les champs";
  }

}


$destinataires = $bdd->query('SELECT username FROM users ORDER BY username')
?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
  <meta charset="utf-8">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.form/4.2.2/jquery.form.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
    <title>Envoie de message</title>
  </head>
  <body>

  <div class="container">
     <?php
            include ('../views/partials/menu_html.php');
      ?>
     
    <form method="POST">
      <label>Destinataire :</label>
      <select name="destinataire">
        <?php while ($d = $destinataires->fetch()) { ?>
          <option><?= $d['username']?></option>
       <?php } ?>

      </select>
    <br/></br/>
    <textarea placeholder="écrire un message" name="message"></textarea>
    <br/></br/>
    <input type="submit" value="Envoyer" name="envoi_message"/>
    <br/><br/>

  <?php if(isset($error)) {
    echo '<span style="color:red">' .$error. '</span>';
  } ?>
  </form>
  </div>
  </body>
</html>
<?php } ?>
