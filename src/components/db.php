<?php
require_once realpath(__DIR__ . "../vendor/autoload.php");

use Dotenv\Dotenv;

$dotenv = Dotenv::createImmutable(__DIR__);
$dotenv->load();

$DB_PATH = $_ENV["DB_PATH"];
$DB_NAME = $_ENV["DB_NAME"];
$DB_USERNAME = $_ENV["DB_USERNAME"];
$DB_PASSWORD = $_ENV["DB_PASSWORD"];

$conn = new mysqli($DB_PATH, $DB_USERNAME, $DB_PASSWORD, $DB_NAME);
$conn->set_charset("UTF8");