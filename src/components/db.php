<?php
$DB_PATH = "localhost";
$DB_NAME = "kincseanda";
$DB_USERNAME = "root";
$DB_PASSWORD = "";

$conn = new mysqli($DB_PATH, $DB_USERNAME, $DB_PASSWORD, $DB_NAME);
$conn->set_charset("UTF8");