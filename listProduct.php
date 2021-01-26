<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Liste des produits</title>
</head>
<body>
    <?php 
    require "function.php";
    ?>

    <h1>Tableau de bords</h1>
    <button><a href="index.php">Retour accueil</a></button>

    <h2>Liste des produits</h2>

    <button><a href="addProduct.php">Ajouter un produit</a></button>

    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Nom</th>
                <th>Console</th>
                <th>Prix</th>
                <th colspan="3">Gestion des produits</th>
            </tr>
        </thead>
        <tbody>
        <?php
            listProduct();
        ?>
        </tbody>
    </table>
</body>
</html>