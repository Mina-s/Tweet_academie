<?php

session_start();

require_once ('../model/models/user.php');
require_once ('../model/models/twitt.php');
require_once ('../model/models/search_model.php');
require_once ('../helpers/fonction.php');

$search_user = new Search();
$users = new User();
$twitt = new Twitt();

$message="";


$user = $users->UserDetails($_SESSION['id_user']); // get user details

if(!isset($_SESSION['id_user']))
{
    header('location: ../controleur/login.php');
}


if(isset($_POST['action'])) {
 
    $output ='';

    if($_POST['action'] == 'insert') {
        $share_content = clean($_POST['post_content']);
        $twitt->addTwitt($_SESSION['id_user'],$share_content);
    }

    if($_POST['action'] == 'fetch_post') {
        $result = $twitt->getTwitt();
        // echo json_encode($result);


        foreach($result as $row){
            if(!empty($row->avatar)) {
                $avatar= '<img src="../assets/membres/avatar/'.$row->avatar.'" class="img-thumbnail" width="150" />';

            }
            else {
                $avatar= '<img src="https://pbs.twimg.com/media/C8RPRn6V0AABTxl.jpg " class="img-thumbnail" width="150" />';
            }
            $output .='<div class= "panel panel-default" style="padding:24px 30px 24px 30px">
                            <div class="row">
                                <div class = "col-md-2">'.$avatar.'</div>
                                <div class = "col-md-8">
                                    <h4>'.$row->username.'</h4>
                                    <p>'.$row->content.'</p>
                                    <i>'.$row->tweet_date.'</i>
                                    <div align="right">
                                    <button type="button"class="btn btn-link post_comment" id="'.$row->id_tweet.'"data-user_id="'.$row->id_user.'">Comment</button>
                                    <div id="comment_form'.$row->id_tweet.'" style=display:none;">
                                    <span id="old_comment'.$row->id_tweet.'"></span>
                                    <div class="form-group"><textarea name="comment"class="form-controcomment'.$row->id_tweet.'"></textarea></div>
                                    <div class="form-group" align="right"><button type="button" name="scomment"class="btn btn-primary btn-xs submit_comment">Comment</button></div>
                                    </div>
                                    <button type="button"class="btn btn-secondary retweet" id="'.$row->id_tweet.'">Retweet</button>
                                    </div>
                                </div> 
                                
                            </div>  
                        </div>'; 
            // $output .= get_reply_comment($)          
                       
      
        }
       
        echo $output;
       die();
    }


    
    if($_POST['action'] == 'fetch_user_twitt') {
        $result = $twitt->getHisTwitt($_SESSION['id_user']);

    
        if(!empty($result)){
                foreach($result as $row){
                    if(!empty($row->avatar)) {
                        $avatar= '<img src="../assets/membres/avatar/'.$row->avatar.'" class="img-thumbnail"  />';
                        // var_dump($avatar);

                    }
                    else {
                        $avatar= '<img src="https://pbs.twimg.com/media/C8RPRn6V0AABTxl.jpg " class="img-thumbnail" />';
                    }
                    $output .='<div class= "panel panel-default" style="padding:24px 30px 24px 30px">
                                    <div class="row">
                                        <div class = "col-md-6">'.$avatar.'</div>
                                        <div class = "col-md-6">
                                            <h4>'.$row->username.'</h4>
                                            <p>'.$row->content.'</p>
                                            <i>'.$row->tweet_date.'</i>
                
                                            <div align="right">
                                            <button type="button"class="btn btn-link post_comment" id="'.$row->id_tweet.'"data-user_id="'.$row->id_user.'">Comment</button>
                                            <div id="comment_form'.$row->id_tweet.'" style=display:none;">
                                            <span id="old_comment'.$row->id_tweet.'"></span>
                                            <div class="form-group"><textarea name="comment"class="form-controcomment'.$row->id_tweet.'"></textarea></div>
                                            <div class="form-group" align="right"><button type="button" name="scomment"class="btn btn-primary btn-xs submit_comment">Comment</button></div>
                                            </div>
                                            <button type="button"class="btn btn-secondary retweet" id="'.$row->id_tweet.'">Retweet</button>
                                        </div>
                                        </div> 
                                        
                                    </div>  
                                </div>';                   
            
                }
        }else {
            $message = '<label>No tweets!</labe>';
            echo $message;

        }
       
        echo $output;
       die();

    }
    if($_POST['action'] == 'count_user_twitt') {
        $result = $twitt->countHisTwitt($_SESSION['id_user']);
       
        foreach($result as $key=>$row){
           
            $output .= $row[0];
        }
       
        echo $output;
       die();
    }

    if($_POST['action'] == 'count_follower') {
        $result = $users->countFollower($_SESSION['id_user']);
       
        foreach($result as $key=>$row){
           
            $output .= $row[0];
        }
       
        echo $output;
       die();
    }

    if($_POST['action'] == 'count_following') {
        $result = $users->countFollowing($_SESSION['id_user']);
       
        foreach($result as $key=>$row){
           
            $output .= $row[0];
        }
       
        echo $output;
       die();

    }
    if($_POST['action'] == 'get_following') {
        $result = $users->getFollowing($_SESSION['id_user']);

       if(!empty($result)) {
                foreach($result as $row){
                    $avatar= '<img src="../assets/membres/avatar/'.$row->avatar.'" class="img-thumbnail" width="150px" />';
                
                   $output .='<div class="row">
                                    <div class = "col-md-12">'.$avatar.'
                                    <h6>'.$row->username.'</h6>
                                    <span class="label label-success">Follow</span>
                            </div>    
                            </div>';                              
                }
        }
        else {
            $message .= '<label>No following</labe>';
            echo $message;
        }
        echo $output;
       die();

    }

    if($_POST['action'] == 'get_follow') {
        $result = $users->getFollow($_SESSION['id_user']);

       if(!empty($result)) {
                foreach($result as $row){
                    $avatar= '<img src="../assets/membres/avatar/'.$row->avatar.'" class="img-thumbnail" width="150px" />';
                
                   $output .='<div class="row">
                                    <div class = "col-md-12">'.$avatar.'
                                    <h6>'.$row->username.'</h6>
                                    <span class="label label-success">Follow</span>
                            </div>    
                            </div>';                              
                }
        }
        else {
            $message .= '<label>No follower</labe>';
            echo $message;
        }
        echo $output;
       die();

    }
  
  
    if($_POST['action'] == 'fetch_user') {
        $result = $users->getUsers($_SESSION['id_user']);
       

        foreach($result as $row){
            if(!empty($row->avatar)) {
                $avatar= '<img src="../assets/membres/avatar/'.$row->avatar.'" class="img-thumbnail" width="150" />';

            }
            else {
                $avatar= '<img src="https://pbs.twimg.com/media/C8RPRn6V0AABTxl.jpg " class="img-thumbnail" width="150" />';
            }
            $output .=' <div class="row">
                                <div class = "col-md-4">'.$avatar.'</div>
                                <div class = "col-md-8">
                                    <h4>'.$row->username.'</h4>
                                    <span class="label label-success">Follow</span>
                                </div>    
                        </div>';    
      
        }
        echo $output;
       die();
    }

    if($_POST['action']== 'rechercher'){
        if(!empty($_POST['search'])){

             $search = clean($_POST['search']);
             $result =$search_user->search_users($search);

            if(!empty($result)){
                foreach ($result as $row) {
                    $avatar= '<img src="../assets/membres/avatar/'.$row->avatar.'" class="img-thumbnail" width="150" />';
                    $output .=' <div class="row">
                            <div class = "col-md-2">'.$avatar.'</div>
                            <div class = "col-md-8">
                            <h4>'.$row->username.'</h4>
                            <span class="label label-success">Followers</span>
                            </div>    
                            </div>';    
                }
            }
            else{
                $message .= '<label>No result</labe>';
                echo $message;
               
            }
        }
        echo $output;
        die();  

    }

          

}





include ('../views/home_html.php');

?>