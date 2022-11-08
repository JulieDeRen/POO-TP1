<?php
require_once 'class/Crud.php';
require_once "header.php";

echo $header;

?>
            <h1 class="titre">Ajout pays</h1>
        </header>
    <main>
        <form action="country-index.php" method = "post">
            <ul class="form-style-1">
                <li>
                    <label for = "countryName">Nom du pays<span class="required">*</span></label>
                    <input type="text" name = "countryName" placeholder="Nom du pays" class="field-long">
                </li>
                <li>
                    <input type="submit" value = "save">
                </li>
            </ul>          
        </form>
    </main>
</body>
</html>