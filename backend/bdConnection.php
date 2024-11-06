<?php
try {
    $pdo = new PDO('mysql:host=localhost;port=3306;dbname=portfolio', 'root', '');
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    // echo "Connection successful!";
} catch (PDOException $e) {
    $errors = "Backend Failed";
    header("Location: pages/error.php?error=" . urlencode($errors));
    exit();
}

?>
