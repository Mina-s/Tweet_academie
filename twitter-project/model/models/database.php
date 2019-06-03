<?php


class DB {
    private $host ='localhost';
    private $user = 'root';
    private $password = 'root';
    private $dbname = 'tweet_academy';
    protected $db;


    function __construct($dbname = 'tweet_academy', $user = 'root',$password = 'root',$host = 'localhost')
    {
        $this->host = $host;
        $this->user = $user;
        $this->password = $password;
        $this->dbname = $dbname;

        $db= new PDO("mysql:host=localhost;dbname=tweet_academy; charset=utf8", "root", "root");
        $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $this->db = $db;
        return $db;  

    }

    public function query($sql) 
    {
        $query = $this->db->prepare($sql);
        $query->execute();
        return $query;
    }
}


?>