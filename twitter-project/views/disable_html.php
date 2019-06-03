<html>  
    <head>  
        <title> Twitter </title>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.form/4.2.2/jquery.form.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
    </head>  
    <body>  
             <div class="container">
             <?php
            include ('partials/header.php');
        
            ?>
            
            <div class="container">
    
    
    <form method="post" action="disable.php">
        <p><strong>Are you sure you want disable your account?</strong></p>
        <div class="input-group">
        <button  type="submit" name ="disable" value="desactive" class="btn btn-danger">disable account</button>
        </div>  
    </form>  