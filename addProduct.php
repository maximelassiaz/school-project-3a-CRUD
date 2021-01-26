<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ajouter un produit</title>
</head>
<body>
    <h1>Ajouter un produit</h1>
    <button><a href="index.php">Retour accueil</a></button>

    <form action="registerProduct.php" method="POST">
    <label for="image">Image du jeu vidéo</label>
    <input type="text" name="image" id="image">
    <label for="name">Nom du jeu vidéo</label>
    <input type="text" name="name" id="name">
    <label for="genre">Genre du jeu vidéo</label>
    <input type="text" name="genre" id="genre">
    <label for="console">Console du jeu vidéo</label>
    <input type="text" name="console" id="console">
    <label for="description">Description du jeu vidéo</label>
    <textarea name="description" id="description" cols="30" rows="10" placeholder="Description du produit"></textarea>
    <label for="prix">Prix du jeu vidéo</label>
    <input type="number" name="prix" id="prix" step="any">
    <button type="submit" name="addProduct">Ajouter le jeu vidéo</button>
    </form>

    <button><a href="listProduct.php">Retour liste des produits</a></button>
</body>
</html>