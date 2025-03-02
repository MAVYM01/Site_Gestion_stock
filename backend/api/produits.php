<?php
include '../config/db.php';

header('Content-Type: application/json');

if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    $stmt = $conn->query("SELECT * FROM Produits");
    $produits = $stmt->fetchAll(PDO::FETCH_ASSOC);
    echo json_encode($produits);
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $data = json_decode(file_get_contents('php://input'), true);
    $nom = $data['nom'];
    $description = $data['description'];
    $prix = $data['prix'];
    $stock = $data['stock'];
    $categorie = $data['categorie'];

    $stmt = $conn->prepare("INSERT INTO Produits (nom, description, prix, stock, categorie) VALUES (?, ?, ?, ?, ?)");
    $stmt->execute([$nom, $description, $prix, $stock, $categorie]);
    echo json_encode(['success' => true, 'message' => 'Produit ajouté !']);
}
?>