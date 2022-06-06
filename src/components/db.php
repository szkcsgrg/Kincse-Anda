<?php
require_once '../connect.inc.php';

$conn = new mysqli($DB_PATH, $DB_USERNAME, $DB_PASSWORD, $DB_NAME);
$conn->set_charset("UTF8");
