<?php 
    $title = "Ajouter un produit";
    require "header.php";
?>
<body>
    <?php
        require "navbar.php";
    ?>
    <h1>Ajouter un produit</h1>

    <button><a href="listProduct.php">Retour liste des produits</a></button>

    <form class='addForm' action="registerProduct.php" method="POST">
    <label for="image">Image du jeu vidéo</label><br>
    <input type="text" name="image" id="image" required><br>
    <label for="name">Nom du jeu vidéo</label><br>
    <input type="text" name="name" id="name" required><br>
    <label for="genre">Genre du jeu vidéo</label><br>
    <input type="text" name="genre" id="genre" required><br>
    <label for="console">Console du jeu vidéo</label><br>
    <input type="text" name="console" id="console" required><br>
    <label for="description">Description du jeu vidéo</label><br>
    <textarea name="description" id="description" cols="30" rows="10" placeholder="Description du produit" required></textarea><br>
    <label for="prix">Prix du jeu vidéo</label><br>
    <input type="number" name="prix" id="prix" step="any" required><br>
    <button type="submit" name="addProduct">Ajouter le jeu vidéo</button><br>
    </form>

</body>
</html>