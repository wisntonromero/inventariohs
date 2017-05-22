<?php

$dsn = "mysql:host=localhost;dbname=[inventario]";
$username = "[root]";
$password = "[root]";

$pdo = new PDO($dsn, $username, $password);

$rows = array();
if(isset($_POST['fruitName'])) {
    $stmt = $pdo->prepare("SELECT variety FROM fruit WHERE name = ? ORDER BY variety");
    $stmt->execute(array($_POST['fruitName']));
    $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
}
echo json_encode($rows);

?>