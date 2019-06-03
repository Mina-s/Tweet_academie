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
   
   <h3 align="center">Twitter </a></h3><br />
   <br />
   <div class="panel panel-default">
      <div class="panel-heading">Login</div>
    <div class="panel-body">

     <form method="post" action="../controleur/login.php">
      <p class="text-danger"><?php echo $message; ?></p>
      <div class="form-group">
       <label>Enter Email</label>
       <input type="text" name="email" class="form-control" required />
      </div>
      <div class="form-group">
       <label>Enter Password</label>
       <input type="password" name="password" class="form-control" required />
      </div>
      <div class="form-group">
       <input type="submit" name="login" class="btn btn-info" value="login" />
      </div>
      <div align="center">
       <a href="register.php">Register</a>
      </div>
     </form>
    </div>
   </div>
  </div>
    </body>  

</html>