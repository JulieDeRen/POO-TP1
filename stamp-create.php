<?php
require_once 'class/Crud.php';
require_once "header.php";

echo $header;

?>
            <h1 class="titre">Ajouter timbre</h1>
        </header>
    <main>
        <form action="stamp-index.php" method = "post">
            <ul class="form-style-1">
                <li>
                    <label for = "name">Nom<span class="required">*</span></label>
                    <input type="text" name = "name" placeholder="Nom du timbre" class="field-divided">
                    <input type="text" name = "condition" placeholder="Condition"class="field-divided">
                </li>
                <li>
                    <label for="price">Prix demandé<span class="required">*</span><span class="form-colonne-droite">Prix estimé</span><span class="required">*</span></label>
                    <input type="text" name = "priceStart" placeholder = "Prix de départ" class="field-divided">
                    <input type="text" name = "priceEstimation" placeholder = "Prix estimé" class="field-divided">
                </li>
                <li>
                    <label for = "date">Date de parution</label>
                    <input type="date" name = "date" placeholder = "Date de parution" class="field-divided">
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
                    <label for="description">Description</label>
                    <input type="text" name = "description" placeholder = "Description..." class="field-long">
                </li>
                <li>
                    <input type="submit" value = "save">
                </li>
            </ul>          
        </form>
    </main>
</body>
</html>