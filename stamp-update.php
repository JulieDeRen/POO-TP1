<?php
require_once 'class/Crud.php';

$Crud = new Crud;

$update = $Crud -> update('client', $_POST, $_POST['id'], 'client-index.php');

echo $update;
