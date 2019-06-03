
       
       
                        <br />
   <nav class="navbar navbar-inverse">
    <div class="container-fluid">
     <div class="navbar-header">
      <a class="navbar-brand" href="../controleur/home.php">Twitter</a>
     </div>
     <ul class="nav navbar-nav navbar-right">
     <li><a href="../controleur/envoi.php">message</a></li>
      <li class="dropdown">
       <a class="dropdown-toggle" data-toggle="dropdown" href="#"><?php echo $user->display_name; ?>
       <span class="caret"></span></a>
       <ul class="dropdown-menu">
        <li><a href="../controleur/profile.php">Profile</a></li>
        <li><a href="../controleur/edit_profile.php">Edit Profile</a></li>
        <li><a href="../controleur/logout.php">Logout</a></li>
        <li role="separator" class="divider"></li>
        <li><a href="../controleur/disable.php">Disable count</a></li>
       </ul>
      </li>
     </ul>
    </div>
   </nav>