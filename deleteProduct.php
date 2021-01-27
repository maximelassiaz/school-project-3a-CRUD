<?php 
    $title = "Supprimer un produit";
    require "header.php";
?>
<body>
    <?php
        require "function.php";
        require "navbar.php";
    ?>

    <h1>Supprimer un produit</h1>

    <button><a href="listProduct.php">Retour liste des produits</a></button>  

    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Nom</th>
                <th>Console</th>
                <th>Prix</th>
            </tr>
        </thead>
        <tbody>
        <?php
            showDeleteProduct();
        ?>
        </tbody>
    </table>

    <div class="delete-warning">
        <p>Attention !</p>
        <p>Vous souhaitez supprimer le produit ci-dessus.</p>
        <p>La suppression d'un produit est définitive.</p>
    </div>

    <button class='delete' type="submit" name="deletebutton"><a href="<?php echo "delete.php?id=" . htmlspecialchars($_GET['id']);?>">Supprimer définitivement</a></button>
</body>
</html>