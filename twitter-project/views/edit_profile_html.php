
<?php

// session_start();

require_once ('../model/models/user.php');

$new_user = new User();

if(!isset($_SESSION['id_user']))
{
    header('location: ../controleur/login.php');
}

$user = $new_user->UserDetails($_SESSION['id_user']); // get user details


?>


<html>  
    <head>  
        <title></title>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.form/4.2.2/jquery.form.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
    </head>  
    <body>  
        <div class="container">
   <?php 
    include('../views/partials/menu_html.php');
   ?>
   <div class="row">
    <div class="col-md-3">
    
    </div>
    <div class="col-md-6">
     <div class="panel panel-default">
      <div class="panel-heading">
       <h3 class="panel-title">Edit Profile</h3>
      </div>
      <div class="panel-body">
       <?php
        echo $message;
       ?> 
       <form method="post" enctype="multipart/form-data" action="edit_profile.php">
            
            <div class="form-group">
                <label> Username</label>
                <input type="text" name="username" id="username" class="form-control" value="<?php echo $user->username; ?>" />
            </div>
            
            <div class="form-group">
                <label>Display name</label>
                <input type="text" name="display_name" id="display_name"  class="form-control" value="<?php echo $user->display_name; ?>" />
            </div>

            <div class="form-group">
                <label>Email</label>
                <input type="email" name="email" id="email" required class="form-control" value="<?php echo $user->email; ?>" />
            </div>

            <div class="form-group">
                <label>Phone</label>
                <input type="tel" name="phone" id="phone" class="form-control" value="<?php echo $user->phone; ?>"placeholder="Enter your numer phone" />
            </div>

            <div class="form-group">
                <label>birthdate</label>
                <input type="date" name="birthdate" id="birthdate" class="form-control" required value="<?php echo $user->birthdate; ?>" />
            </div>

            <div class="form-group">
                <label>Website</label>
                <input type="text" name="website" id="website" class="form-control" value="<?php echo $user->website; ?>" placeholder="Enter your website" />
            </div>

            <div class="form-group">
                <label>Localisation</label>
                <input type="text" name="localisation" id="localisation" class="form-control" value="<?php echo $user->localisation; ?>" placeholder="Enter your city" />
            </div>


            <div class="input-group">
                    <label>Password</label>
                    <input type="password" name="password" id="password" class="form-control" placeholder="Current Password" required> 
            </div>   
            <div class="input-group">
                    <label>New Password</label>
                    <input type="password" name="new_password" id="new_password"class="form-control" placeholder="New Password" > 
             </div>   
           
            <div class="form-group">
                <label>Profile Image</label>
                <input type="file" name="avatar" id="avatar"  />
              
                <?php
              
                    if($user->avatar != '')
                    {
                      echo '<img src="../assets/membres/avatar/'.$user->avatar.'" class="img-thumbnail" width="150" />';
                    //   echo '<input type="hidden" name="avatar" value="'.$user->avatar.'" />';
                    }
                ?>
            </div>

            <div class="form-group">
                <label>Short Bio</label>
                <textarea name="bio" id="bio" class="form-control" placeholder= "Enter your description"><?php echo $user->bio    ?></textarea>
            </div>

            <div class="form-group">
               <input type="submit" name="edit_profile" id="edit_profile" class="btn btn-primary" value="Save" />
            </div>
       </form>
       <?php
       
       ?>
      </div>
     </div>
    </div>
    <div class="col-md-3">
    
    </div>
   </div>
  </div>
    </body>  
</html>