<?php
require_once 'class/Crud.php';

$Crud = new Crud;

$update = $Crud -> updateCountry('country', $_POST, $_POST['idCountry'], 'country-index.php');

echo $update;
