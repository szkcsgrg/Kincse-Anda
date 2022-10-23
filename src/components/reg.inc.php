<?php

// Vars
include_once 'db.php';
$id = $_POST['azonosito'];
$pw = $_POST['password'];
$pwRe = $_POST['passwordRe'];

if (isset($_POST['azonosito']) && isset($_POST['password']) && isset($_POST['passwordRe'])) {
    if ($pw == $pwRe) {
        $hashedpw = password_hash($pw, PASSWORD_DEFAULT);
        $conn->query("INSERT INTO `users` (`id`, `pw`) VALUES ('$id', '$hashedpw')");
        Header("Location: ../belepes.php");
    } else {
        echo 'A két jelszó nem egyezik.';
    }
}
