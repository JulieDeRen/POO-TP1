<?php
require_once "header.php";
if(isset($_GET['id'])){
    $id = $_GET['id'];
    require_once "class/Crud.php";
    $Crud = new Crud;
    $client = $Crud->selectIdClient('client', $id);
    extract($client);
    $country = $Crud->select("country", "countryName", "DESC");
    extract($country);

}else{
    header('Location: client-index.php');
}


echo $header;

?>
            <h1 class="titre">Modifier Client</h1>
        </header>
    <main>
        <form action="client-update.php" method="post">
            <ul class="form-style-1">
                <li>
                    <input type="hidden" name="id" value="<?php echo $id;?>">
                </li>
                <li>
                    <label for = "lastName">Nom Complet <span class="required">*</span></label>
                    <input type="text" name = "lastName" value="<?php echo $lastName;?>" class="field-divided">
                    <input type="text" name = "firstName" value="<?php echo $firstName;?>" class="field-divided">
                </li>
                <li>
                    <label for="email">Courriel<span class="required">*</span><span class="password">Mot de passe</span><span class="required">*</span></label>
                    <input type="email" name = "email" value="<?php echo $email;?>" class="field-divided">
                    <input type="password" name = "password" value="<?php echo $password;?>" class="field-divided">
                </li>
                <li>
                    <label for = "birthday">Anniversaire</label>
                    <input type="date" name = "birthday" value="<?php echo $birthday;?>" class="field-divided">
                    <select name="idCountry" class="field-divided">
                        <option value = "-1">- Choisissez -</option>
                <?php
                    foreach($country as $row){
                ?>
                        <option value="<?php echo $row['idCountry'];?>"<?php if(isset($_GET['idCountry']) == $row['idCountry']){echo "selected";}?>><?=$row['countryName']?></option>

                    <?php
                    }

                    ?>
                    </select>
                </li>
                <li>
                    <label for="addresse">Adresse</label>
                    <input type="text" name = "addresse" value="<?php echo $addresse;?>" class="field-long">
                </li>
                <li>
                    <input type="submit" value="Modifier">
                </li>
        </form>
        <form action="client-delete.php" method="post">
                <li>
                    <input type="hidden" name="id" value="<?php echo $id;?>">
                </li>
                <li>
                    <input type="submit" value="Effacer">
                </li>
            </ul>
        </form>
    </main>  
</body>
</html>