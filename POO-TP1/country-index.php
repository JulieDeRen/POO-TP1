<?php
require_once "class/Crud.php";

$Crud = new Crud;

$insert = $Crud -> insert("country", $_POST);
$country = $Crud->select("country", "countryName", "DESC");


require_once "header.php";
echo $header;

?>
            <h1 class="titre">Liste des pays</h1>
        </header>
    <main>
        <table>
            <thead>
                <tr>
                    <th>Nom des pays</th>
                </tr>
            </thead>
            <tbody>
                <?php
                
                    foreach($country as $row){

                ?>
                    <tr><!--ici c'est la donnée de la bd -->
                        <td><a href="country-edit.php?idCountry=<?php echo $row['idCountry'] ?>"><?php echo $row['countryName'] ?></a></td>
                    </tr>
                   
                <?php       
                    }
                ?>
                
            </tbody>
        </table>
    </main>
</body>
</html>