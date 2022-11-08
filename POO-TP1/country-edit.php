<?php
require_once "header.php";

if(isset($_GET['idCountry'])){
    $idCountry = $_GET['idCountry'];
    require_once "class/Crud.php";
    $Crud = new Crud;
    $country = $Crud->selectId('country', $idCountry);
    extract($country);
}else{
    header('Location: country-index.php');
}


echo $header;

?>
            <h1 class="titre">Modifier Pays</h1>
        </header>
    <main>
        <form action="country-update.php" method="post">
            <ul class="form-style-1">
                <li>
                    <input type="hidden" name="idCountry" value="<?php echo $idCountry;?>">
                </li>
                <li>
                    <label for = "countryName">Nom du pays <span class="required">*</span></label>
                    <input type="text" name = "countryName" value="<?php echo $countryName;?>" class="field-long">
                </li>
                <li>
                    <input type="submit" value="Modifier">
                </li>
        </form>
        <form action="country-delete.php" method="post">
                <li>
                    <input type="hidden" name="idCountry" value="<?php echo $idCountry;?>">
                </li>
                <li>
                    <input type="submit" value="Effacer">
                </li>
            </ul>
        </form>
    </main>  
</body>
</html>