<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Détail du produit</title>
</head>
<body>
    <h1>Détails du jeu vidéo</h1>
    <button><a href="index.php">Retour accueil</a></button>

    <?php
        require "function.php";
        detailsProduct();
    ?>

    <button><a href="listProduct.php">Retour liste des produits</a></button>

</body>
</html>