<?php

function listProduct() {
    $db = "ecommerce";
    $host = "localhost";
    $user = "root";
    $password = "";
    try {
       $conn = new PDO("mysql:host=$host;dbname=$db", $user, $password);
       $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    } catch (Exception $e) {
        die("Erreur : " . $e->getMessage());
    }

    $stmt = $conn->prepare("SELECT * FROM produit ORDER BY id DESC");
    $stmt->execute();

       while ($result = $stmt->fetch()) {
           echo "<tr>";
           echo "<td>" . $result['id'] . "</td>";
           echo "<td>" . $result['nom_produit'] . "</td>";
           echo "<td>" . $result['console_produit'] . "</td>";
           echo "<td>" . $result['prix_produit'] . "</td>"; 
           echo "<td><button><a href='showProduct.php?id=" . $result['id'] . "'>Détails</a></button></td>";
           echo "<td><button><a href='editProduct.php?id=" . $result['id'] . "'>Éditer</a></button></td>";
           echo "<td><button class='delete'><a href='deleteProduct.php?id=" . $result['id'] . "'>Supprimer</a></button></td>";
           echo "</tr>";
       }
    
}

function addProduct() {
    $db = "ecommerce";
    $host = "localhost";
    $user = "root";
    $password = "";
    try {
       $conn = new PDO("mysql:host=$host;dbname=$db", $user, $password);
       $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    } catch (Exception $e) {
        die("Erreur : " . $e->getMessage());
    }

    $stmt = $conn->prepare("INSERT INTO produit(nom_produit, genre_produit, console_produit, description_produit, prix_produit, image_produit) VALUES(:nom_produit, :genre_produit, :console_produit, :description_produit, :prix_produit, :image_produit)");
    $stmt->execute(array(
        'nom_produit' => htmlspecialchars($_POST['name']),
        'genre_produit' => htmlspecialchars($_POST['genre']),
        'console_produit' => htmlspecialchars($_POST['console']),
        'description_produit' => htmlspecialchars($_POST['description']),
        'prix_produit' => htmlspecialchars($_POST['prix']),
        'image_produit' => htmlspecialchars($_POST['image'])
    ));
}

function detailsProduct() {
    $db = "ecommerce";
    $host = "localhost";
    $user = "root";
    $password = "";
    try {
       $conn = new PDO("mysql:host=$host;dbname=$db", $user, $password);
       $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    } catch (Exception $e) {
        die("Erreur : " . $e->getMessage());
    }

    $stmt = $conn->prepare("SELECT * FROM produit WHERE id=" . (int)htmlspecialchars($_GET['id']));
    $stmt->execute();

       while ($result = $stmt->fetch()) {
           echo "<div class='product-card'>";
           echo "<h2>Id : " . $result['id'] . "</h2>";
           echo "<h3>" . $result['nom_produit'] . "</h3>";
           echo "<img src='" . $result['image_produit'] . "'><br>";
           echo "<p><span class='category'>Genre : </span><br>" . $result['genre_produit'] . "</p><br>";
           echo "<p><span class='category'>Console : </span><br>" . $result['console_produit'] . "</p><br>";
           echo "<p><span class='category'>Description : </span><br>" . $result['description_produit'] . "</p><br>";
           echo "<p><span class='category'>Prix : </span><br>" . $result['prix_produit'] . "</p><br>"; 
           echo "<button><a href='editProduct.php?id=" . $result['id'] . "'>Éditer</a></button>";
           echo "<button class='delete'><a href='deleteProduct.php?id=" . $result['id'] . "'>Supprimer</a></button>";
           echo "<div>";
       }
}

function showEditProduct() {
    $db = "ecommerce";
    $host = "localhost";
    $user = "root";
    $password = "";
    try {
       $conn = new PDO("mysql:host=$host;dbname=$db", $user, $password);
       $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    } catch (Exception $e) {
        die("Erreur : " . $e->getMessage());
    }

    $stmt = $conn->prepare("SELECT * FROM produit WHERE id=" . (int)htmlspecialchars($_GET['id']));
    $stmt->execute();

       while ($result = $stmt->fetch()) {
           echo "<form class='editForm' method='POST' action='edit.php?id=" . $result['id'] . "'>";
           echo "<label for='name_edit'>Nom du jeu vidéo :</label><br>";
           echo "<input type='text' id='name_edit' name='nom' value='" . $result['nom_produit'] . "'><br>";
           echo "<label for='image_edit'>Image du jeu vidéo :</label><br>";
           echo "<img src='" . $result['image_produit'] . "'><br>";
           echo "<input type='text' id='image_edit' name='image' value='" . $result['image_produit'] . "'><br>";
           echo "<label for='genre_edit'>Genre du jeu vidéo :</label><br>";
           echo "<input type='text' id='genre_edit' name='genre' value='" . $result['genre_produit'] . "'><br>";
           echo "<label for='genre_edit'>Console du jeu vidéo :</label><br>";
           echo "<input type='text' id='console_edit' name='console' value='" . $result['console_produit'] . "'><br>";
           echo "<label for='description_edit'>Description du jeu vidéo :</label><br>";
           echo "<textarea id='description_edit' cols='30' rows='10' name='description'>" . $result['description_produit'] . "</textarea><br>";
           echo "<label for='prix_edit'>Prix du jeu vidéo :</label><br>";
           echo "<input type='number' step='any' id='prix_edit' name='prix' value='" . $result['prix_produit'] . "'><br>";
           echo "<button type='submit' name='button_edit'>Valider les modifications</button><br>";
           echo "</form>";         
       }
}

function editProduct() {
    $db = "ecommerce";
    $host = "localhost";
    $user = "root";
    $password = "";
    try {
       $conn = new PDO("mysql:host=$host;dbname=$db", $user, $password);
       $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    } catch (Exception $e) {
        die("Erreur : " . $e->getMessage());
    }

    $sql = "UPDATE produit
            SET nom_produit = :nom_produit,
            genre_produit = :genre_produit,
            console_produit = :console_produit,
            description_produit = :description_produit,
            image_produit = :image_produit,
            prix_produit = :prix_produit
            WHERE id =" . (int)htmlspecialchars($_GET['id']);
    $stmt = $conn->prepare($sql);
    $stmt->execute(array(
        'nom_produit' => htmlspecialchars($_POST['nom']),
        'genre_produit' => htmlspecialchars($_POST['genre']),
        'console_produit' => htmlspecialchars($_POST['console']),
        'description_produit' => htmlspecialchars($_POST['description']),
        'image_produit' => htmlspecialchars($_POST['image']),
        'prix_produit' => htmlspecialchars($_POST['prix'])
        )
    );
}

function showDeleteProduct() {
    $db = "ecommerce";
    $host = "localhost";
    $user = "root";
    $password = "";
    try {
       $conn = new PDO("mysql:host=$host;dbname=$db", $user, $password);
       $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    } catch (Exception $e) {
        die("Erreur : " . $e->getMessage());
    }

    $stmt = $conn->prepare("SELECT * FROM produit WHERE id=" . (int)htmlspecialchars($_GET['id']));
    $stmt->execute();

       while ($result = $stmt->fetch()) {
           echo "<tr>";
           echo "<td>" . $result['id'] . "</td>";
           echo "<td>" . $result['nom_produit'] . "</td>";
           echo "<td>" . $result['console_produit'] . "</td>";
           echo "<td>" . $result['prix_produit'] . "</td>"; 
           echo "</tr>";
       }
    
}



function deleteProduct() {
    $db = "ecommerce";
    $host = "localhost";
    $user = "root";
    $password = "";
    try {
       $conn = new PDO("mysql:host=$host;dbname=$db", $user, $password);
       $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    } catch (Exception $e) {
        die("Erreur : " . $e->getMessage());
    }

    $stmt = $conn->prepare("DELETE FROM produit WHERE id=" . (int)htmlspecialchars($_GET['id'] ));
    $stmt->execute();

    echo "The item has been successfully deleted.";
}

?>