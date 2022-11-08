<?php
require_once "class/Crud.php";

$Crud = new Crud;
// si valeur entrée par l'usager est une chaine nulle (aucune donnée entrée), attribué valeur null
foreach($_POST as $key => $value){
    if($_POST[$key]==""){
        $_POST[$key] = null;
    }
}

$insert = $Crud -> insert("client", $_POST);
$client = $Crud ->selectCountry("client", "lastName", "country", "idCountry", "idCountry", "ASC");


require_once "header.php";
echo $header;

?>
            <h1 class="titre">Liste des clients</h1>
        </header>
    <main>
        <table>
            <thead>
                <tr>
                    <th>Nom</th>
                    <th>Prénom</th>
                    <th>Adresse</th>
                    <th>Anniversaire</th>
                    <th>Courriel</th>
                    <th>Pays</th>
                </tr>
            </thead>
            <tbody>
                <?php
                    foreach($client as $row){
                ?>
                    <tr><!--ici c'est la donnée de la bd -->
                        <td><a href="client-edit.php?id=<?php echo $row['id'] ?>"><?php echo $row['lastName'] ?></a></td>
                        <td><a href="client-edit.php?id=<?php echo $row['id'] ?>"><?php echo $row['firstName'] ?></a></td>
                        <td><a href="client-edit.php?id=<?php echo $row['id'] ?>"><?php echo $row['addresse'] ?></a></td>
                        <td><a href="client-edit.php?id=<?php echo $row['id'] ?>"><?php echo $row['birthday'] ?></a></td>
                        <td><a href="client-edit.php?id=<?php echo $row['id'] ?>"><?php echo $row['email'] ?></a></td>
                        <td><a href="client-edit.php?id=<?php echo $row['id'] ?>"><?php echo $row['countryName'] ?></a></td>
                    </tr>
                   
                <?php       
                    }
                ?>
                
            </tbody>
        </table>
    </main>
</body>
</html>