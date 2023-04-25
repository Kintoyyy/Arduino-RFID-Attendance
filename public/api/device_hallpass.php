<?php
if (isset($_GET['get_hallpass'])) {
    $stmt = $pdo->prepare("SELECT * FROM hallpass WHERE id = ?");
    $stmt->execute([$_GET['edit_hallpass']]);
    echo json_encode($stmt->fetch(PDO::FETCH_ASSOC));
    die;
}