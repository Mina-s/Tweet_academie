<?php


require_once ('../model/models/search_model.php');
require_once ('../helpers/fonction.php');
$search_user = new Search();

$message='';



// if(!empty($_POST['search']) AND $_POST['search']== "rechercher") {
//     var_dump($_POST);
  

//         $search = clean($_GET['search']);
      
     
//             $search = strtolower($search);
//             $search_user = $search_user->Search($search);
    

//     // if(isset($search)){
//     $result = $search_user->getUsers($_GET['search']);
//     var_dump($result);
//     foreach($result as $row){
//         echo $row->display_name;

//      }
       
//     }
//     else {
//         $message = "Vous devez entrer votre requete dans la barre de recherche";
//     }


    if(isset($_POST['action'])){
        


        $output='';

            if($_POST['action']== 'rechercher'){
                // var_dump($_POST);
                if(!empty($_POST['search'])){

                     $search = clean($_POST['search']);
                     $result =$search_user->search_users($search);

                     foreach ($result as $row) {
                        $avatar= '<img src="../assets/membres/avatar/'.$row->avatar.'" class="img-thumbnail" width="150" />';
                        $output .=' <div class="row">
                                <div class = "col-md-4">'.$avatar.'</div>
                                <div class = "col-md-8">
                                <h4>'.$row->username.'</h4>
                                <span class="label label-success">Followers</span>
                                </div>    
                                </div>';    
                     }
                }
               

            } 
            echo $output;
            die();     

}


  
  


   



// include ('../views/search_html.php'); 