<?php
require_once "class/Crud.php";
$Crud = new Crud;
$insert = $Crud -> insert("client", $_POST);

$insert;
