

<!DOCTYPE html>
<html lang="fr">
<head>
<html>  
    <head>  
            <title> Twitter </title>
            <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
            <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
            <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.form/4.2.2/jquery.form.js"></script>
            <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
            <link rel="stylesheet" href="../assets/css/profile.css">

    </head>
        
                <body>

                        <?php
                        include ('partials/header.php');

                        ?>

                        <div class="header">
                            <div class="header__bande">
                                <div class="header__banderole">
                                </div>
                                    <div class="header__tweet">
                                        <div class="header__tweet__box">
                                            <div class="header__tweet__tweets">
                                                <h4>tweets</h4>
                                                <h4 id="count_twitt"></h4>
                                            </div>
                                            <div class="header__tweet__following">
                                                <h4>following</h4>
                                                <h4 id="count_following"></h4>
                                            </div>
                                            <div class="header__tweet__followers">
                                                <h4>followers</h4>
                                                <h4 id="count_follower"></h4>
                                            </div>
                                        </div>
                                            <div class="header__tweet__follow">
                                                <button type="button" class="btn btn-primary btn-lg">Follow</button>
                                            </div>
                                    </div>
                                </div>
                                        <div class="header_profilepic">
                                                <label>Profile Image</label>
                                            
                                                <?php
                                            
                                                    // $avatar= '<img src="https://pbs.twimg.com/media/C8RPRn6V0AABTxl.jpg " class="img-thumbnail" />';
                                                    // echo $avatar;
                                                    $avatar= '<img src="../assets/membres/avatar/'.$user->avatar.'" class="rounded-circle" />';
                                                    echo $avatar;

                                                ?>
                                        </div>
                                </div>
                                        <div class="container">
                                            <div class="container__leftside">
                                            
                                                <p><?php echo $user->display_name?></p>
                                                <p><?php echo $user->username?></p>
                                                <h3>Bio<h3>
                                                <div class= "panel panel-default col-md-4">
                                                    <p><?php if(!empty($user->bio)){echo $user->bio;}else{echo'You having ';}?></p>
                                                </div>
                                           
                                            <div class="container">
                                        
                                            <div class="panel-body">
                                                <span id="comment_post"></span>
                                                <div id=""></div>   
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="panel panel-default">
                                            <div class="panel-heading">
                                                <h3 class="panel-title">Follower</h3>
                                            </div>
                                            <div class="panel-body">
                                                <div id="follower"></div>
                                            </div>
                                
                                        </div>
                                    </div>

                                                <div class="col-md-4">
                                                    <div class="panel panel-default">
                                                        <div class="panel-heading">
                                                            <h3 class="panel-title">Following</h3>
                                                        </div>
                                                        <div class="panel-body">
                                                            <div id="following"></div>
                                                        </div>
                                                    </div>
                                                </div>
                                    
                                                <div class="panel-body col-md-10">
                                                    <div class= "panel panel-default" style="padding:24px 30px 24px 30px">
                                                        <span id="comment_post"></span>
                                                        <div id="twitt_list"></div>
                                                        
                                                    </div>
                                                   
                                                </div>   
                                                
                                
                        </div>

                                


                </body>
<script type="text/javascript" src="../assets/js/script_twitt.js"> </script>
</html>