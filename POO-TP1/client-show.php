<?php
require_once "header.php";

if(isset($_GET['id'])){
    $id = $_GET['id'];
    require_once "class/Crud.php";
    $Crud = new Crud;
    $client = $Crud->selectId('client', $id);
    extract($client);
}else{
    header('Location: client-index.php');
}

echo $header;

?>
            <h1 class="titre">Modifier Client</h1>
        </header>
    <main>
    <body>
        <table>
            <tbody>
                    <tr>
                        <td>Nom</td>
                        <td><?php echo $lastName; ?></td>
                    </tr>
                    <tr>
                        <td>Prénom</td>
                        <td><?php echo $firstName; ?></td>
                    </tr>
                    <tr>
                        <td>Adresse</td>
                        <td><?php echo $addresse; ?></td>
                    </tr>
                    <tr>
                        <td>Anniversaire</td>
                        <td><?php echo $birthday; ?></td>
                    </tr>
                    <tr>
                        <td>Courriel</td>
                        <td><?php echo $email; ?></td>
                    </tr>
                    <tr>
                        <td colspan = "2"><a href="client-edit.php?id=<?php echo $id; ?>">Modifier</a></td>
                    </tr>
                

            </tbody>
        </table>
    </main>
</body>
</html>


