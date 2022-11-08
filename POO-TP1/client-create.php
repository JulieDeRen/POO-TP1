<?php
require_once 'class/Crud.php';
require_once "header.php";

$Crud = new Crud;
$country = $Crud->select("country", "countryName", "DESC");
extract($country);


echo $header;

?>
            <h1 class="titre">Nouveau client</h1>
        </header>
    <main>
        <form action="client-index.php" method = "post">
            <ul class="form-style-1">
                <li>
                    <label for = "lastName">Nom complet<span class="required">*</span></label>
                    <input type="text" name = "lastName" placeholder="Nom de famille" class="field-divided">
                    <input type="text" name = "firstName" placeholder="Prénom"class="field-divided">
                </li>
                <li>
                    <label for="email">Courriel<span class="required">*</span><span class="form-colonne-droite">Mot de passe</span><span class="required">*</span></label>
                    <input type="email" name = "email" placeholder = "Courriel*" class="field-divided">
                    <input type="password" name = "password" placeholder = "Mot de passe*" class="field-divided">
                </li>
                <li>
                    <label for = "birthday">Anniversaire</label>
                    <input type="date" name = "birthday" placeholder = "Date d'anniversaire" class="field-divided">
                    <select name="idCountry" class="field-divided">
                        <option value = "-1">- Choisissez un pays -</option>

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
                    <input type="text" name = "addresse" placeholder = "Adresse" class="field-long">
                </li>
                <li>
                    <input type="submit" value = "save">
                </li>
            </ul>          
        </form>
    </main>
</body>
</html>