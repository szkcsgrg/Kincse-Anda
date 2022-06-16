<?php

// Vars
include_once 'db.php';
session_start();
$id = $_POST['azonosito'];
$pw = $_POST['password'];

if (isset($_POST['azonosito']) && isset($_POST['password'])) {
    $result = $conn->query("SELECT * FROM `kincseanda`.`users` WHERE id like '$id'");
    while ($row = $result->fetch_assoc()) {
        if (password_verify($pw, $row['pw'])) {
            $_SESSION['azonosito'] = $id;
            Header("Location: ../kezelofelulet.php");
        } else {
            echo "Az azonosító vagy a jelszó nem egyezik.
            <a href='../belepes.php'>Vissza</a>";
        }
    }
}