<?php 
    $title = "Détails d'un produit";
    require "header.php";
?>
<body>
    <?php 
        require "function.php";
        require "navbar.php";
    ?>
    <h1>Détails du jeu vidéo</h1>

    <button><a href="listProduct.php">Retour liste des produits</a></button>

    <?php
        detailsProduct();
    ?>

</body>
</html>