
<html>  
    <head>  
           <title> Twitter </title>
          <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
          <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
          <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.form/4.2.2/jquery.form.js"></script>
          <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
    </head>




          <div class="container">
               <br />
          <div class="container">
               <br />
   
          <h3 align="center">Twitter </a></h3><br />
          <br />
          <div class="panel panel-default">
               <div class="panel-heading">Register</div>
          <div class="panel-body">

          <form method="post" action='../controleur/register.php'>

          <span class="text-danger"><?php echo $message; ?></span>

               <div class="form-group">
                    <label>Enter Display name</label>
                    <input type="text" name="display_name" class="form-control" />
               </div>

               <div class="form-group">
                    <label>Enter Username</label>
                    <input type="text" name="username" class="form-control" />
               </div>

               
               <div class="form-group">
                    <label>Email</label>
                    <input type="email" name="email" class="form-control" /> 
               </div>   

               <div class="form-group">
                    <label>Birthday</label>
                    <input type="date" name="birthdate" class="form-control" /> 
               </div>   


               <div class="form-group">
                    <label>Enter Password</label>
                    <input type="password" name="password" id="password" class="form-control" />
               </div>

               <div class="form-group">
                    <label>Re-enter Password</label>
                    <input type="password" name="confirm_password" id="confirm_password" class="form-control" />
               </div>

               <div class="form-group">
                    <input type="submit" name="register" class="btn btn-info" value="Register" />
               </div>

               <div align="center">
               <a href="login.php">Login</a>
          </div>
          </form>
     </div>
     </div>
     </div>
     </body>  
</html>