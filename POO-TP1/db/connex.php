<?php

try{
    $dbhost = 'localhost';
    $dbname = 'ecommerce';
    $dbuser = 'root';
    $dbpass = 'root';
    $dbport = '8889'; // sur webdeb c'est 3306
    // $pdo = $connec dans la documentation
    // si c'est sur webdev enlever le dbport = $dbport
    $pdo  = new PDO("mysql:host=$dbhost; dbname=$dbname; dbport = $dbport; charset=utf8", $dbuser, $dbpass); // important les double " sinon il faut concaténer utf8 permet de reconnaître les accents

}
catch(PDOException $e){
    echo "Error : " . $e -> getMessage() . "<br>";
    die();
}

?>