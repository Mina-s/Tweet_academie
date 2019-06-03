
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

                    <div class="panel-body">
                    <div id="result"></div>
                                    
                    </div>

                    
                    <div class="row">
                        <div class="col-md-8">
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <h3 class="panel-title">Start Write Here</h3>
                                </div>

                                <div class="panel-body">

                                    <form method="post" id="post_form" >
                                        <div class="form-group">
                                            <textarea name="post_content" id="post_content" maxlength="140" class="form-control" placeholder="Write your twiit"></textarea>
                                        </div>
                                        <div class="form-group">
                                            <input type="hidden" name="action" value="insert" />
                                            <input type="submit" name="share_post" id="share_post" class="btn btn-primary" value="Share" />
                                        </div>
                                    </form>
                                </div>
                            

                            </div>
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <h3 class="panel-title">Trending Now</h3>
                                </div>
                                <div class="panel-body">
                                    <span id="comment_post"></span>
                                    <div id="post_list"></div>
                                    
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <h3 class="panel-title">User List</h3>
                                </div>
                                <div class="panel-body">
                                    <div id="user_list"></div>
                                </div>
                    
                            </div>
                        </div>
                    </div>
         </div>
        

    </body>  


    <script type="text/javascript" src="../assets/js/script_twitt.js"> </script>
</html>