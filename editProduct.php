<?php 
    $title = "Modifier un produit";
    require "header.php";
?>
<body>
    <?php
        require "function.php";
        require "navbar.php";
    ?>
    <h1>Éditer un jeu vidéo</h1>
    <button><a href="listProduct.php">Retour liste des produits</a></button>
    <?php
        showEditProduct();
    ?>
</body>
</html>