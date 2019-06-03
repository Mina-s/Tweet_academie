<?php

//debug

function debug($variable) 
{
    echo'<pre>' . var_dump($variable, true) .'</pre>';
}

//verif balise et espace html et password

function clean($data) 
{
    if(!empty($data)) {
        $data = trim(strip_tags(stripslashes($data)));
        return $data;
    }
}

function verifyPassword($current_password, $password_hash)
{
    return password_verify($current_password, $password_hash);
}

 //birthday get age
function getAge($birthdate) {
    $now = new DateTime();
 
    $userbirthdate= new DateTime($birthdate);
  
    $dif= $now->diff($userbirthdate);
    $age= $dif->y;
 

     return $age;
}
// extension 

function extensionUpload($data){
    if(!empty($data)) {
        $data = strtolower(substr(strrchr($data,'.'),1));
        return $data;
    }

}





?>