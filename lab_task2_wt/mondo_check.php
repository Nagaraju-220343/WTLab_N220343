<?php
require __DIR__ . '/vendor/autoload.php';
try{
    $client=new MongoDB\Client("mongodb://localhost:27017/");
    $db=$client->cordmanDB;
    $users=$db->cordman;
    echo "connected successfully";

}catch(Exception $e){
    echo "connection failed: ".$e->getMessage();
}




?>