<?php
require_once 'class/Crud.php';

$Crud = new Crud;
foreach($_POST as $key => $value){
    if($_POST['idCountry']== '-1'){
        $_POST['idCountry'] = null;
        //unset($_POST[$key]);
    }
    if($_POST[$key]==""){
        $_POST[$key]= null;
        // unset($_POST[$key]);
    }
}

$update = $Crud -> update('client', $_POST, $_POST['id'], 'client-index.php');

// echo $update;
