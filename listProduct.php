<?php 
    $title = "Gestion de vos produits";
    require "header.php";
?>
<body>
    <?php 
    require "function.php";
    require "navbar.php";
    ?>

    <h1>Tableau de bord</h1>

    <button class="addProduct"><a href="addProduct.php">Ajouter un produit</a></button>

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