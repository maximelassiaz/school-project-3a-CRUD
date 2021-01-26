<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Supprimer un produit</title>
</head>
<body>
    <h1>Supprimer un produit</h1>

    <?php 
        echo "<form method='POST' action='delete.php?id=" . $_GET['id'] . "'>";
    ?>
        <button type="submit" name="deletebutton">Supprimer définitivement</button>
    </form>
</body>
</html>