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

    $stmt = $conn->prepare("SELECT * FROM produit");
    $stmt->execute();

       while ($result = $stmt->fetch()) {
           echo "<tr>";
           echo "<td>" . $result['id'] . "</td>";
           echo "<td>" . $result['nom_produit'] . "</td>";
           echo "<td>" . $result['console_produit'] . "</td>";
           echo "<td>" . $result['prix_produit'] . "</td>"; 
           echo "<td><button><a href='showProduct.php?id=" . $result['id'] . "'>Détails</a></button></td>";
           echo "<td><button><a href='editProduct.php?id=" . $result['id'] . "'>Éditer</a></button></td>";
           echo "<td><button><a href='deleteProduct.php?id=" . $result['id'] . "'>Supprimer</a></button></td>";
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
        'nom_produit' => $_POST['name'],
        'genre_produit' => $_POST['genre'],
        'console_produit' => $_POST['console'],
        'description_produit' => $_POST['description'],
        'prix_produit' => $_POST['prix'],
        'image_produit' => $_POST['image']
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

    $stmt = $conn->prepare("SELECT * FROM produit WHERE id=" . (int)$_GET['id'] );
    $stmt->execute();

       while ($result = $stmt->fetch()) {
           echo "<tr>";
           echo "<td>" . $result['id'] . "</td>";
           echo "<td>" . $result['nom_produit'] . "</td>";
           echo "<td><img src='" . $result['image_produit'] . "'></td>";
           echo "<td>" . $result['genre_produit'] . "</td>";
           echo "<td>" . $result['console_produit'] . "</td>";
           echo "<td>" . $result['description_produit'] . "</td>";
           echo "<td>" . $result['prix_produit'] . "</td>"; 
           echo "<td><a href='showProduct.php?id=" . $result['id'] . "'</td>";
           echo "<td><a href='editProduct.php?id=" . $result['id'] . "'</td>";
           echo "<td><a href='deleteProduct.php?id=" . $result['id'] . "'</td>";
           echo "</tr>";
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

    $stmt = $conn->prepare("SELECT * FROM produit WHERE id=" . (int)$_GET['id']);
    $stmt->execute();

       while ($result = $stmt->fetch()) {
           echo "<form method='POST' action='edit.php?id=" . $result['id'] . "'>";
           echo "<label for='name_edit'>Nom du jeu vidéo :</label>";
           echo "<input type='text' id='name_edit' name='nom' value='" . $result['nom_produit'] . "'>";
           echo "<label for='image_edit'>Image du jeu vidéo :</label>";
           echo "<input type='text' id='image_edit' name='image' value='" . $result['image_produit'] . "'>";
           echo "<label for='genre_edit'>Genre du jeu vidéo :</label>";
           echo "<input type='text' id='genre_edit' name='genre' value='" . $result['genre_produit'] . "'>";
           echo "<label for='genre_edit'>Console du jeu vidéo :</label>";
           echo "<input type='text' id='console_edit' name='console' value='" . $result['console_produit'] . "'>";
           echo "<label for='description_edit'>Description du jeu vidéo :</label>";
           echo "<textarea id='description_edit' cols='30' rows='10' name='description'>" . $result['description_produit'] . "</textarea>";
           echo "<label for='prix_edit'>Console du jeu vidéo :</label>";
           echo "<input type='number' id='prix_edit' name='prix' value='" . $result['prix_produit'] . "'>";
           echo "<button type='submit' name='button_edit'>Valider les modifications</button>";
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
            WHERE id =" . (int)$_GET['id'];
    $stmt = $conn->prepare($sql);
    $stmt->execute(array(
        'nom_produit' => $_POST['nom'],
        'genre_produit' => $_POST['genre'],
        'console_produit' => $_POST['console'],
        'description_produit' => $_POST['description'],
        'image_produit' => $_POST['image'],
        'prix_produit' => $_POST['prix'])
    );
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

    $stmt = $conn->prepare("DELETE FROM produit WHERE id=" . (int)$_GET['id'] );
    $stmt->execute();

    echo "The item has been successfully deleted.";
}

?>