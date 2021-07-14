<?php

$host = "localhost";
$user = "root";
$pass = "";
$dbname = "teste01";
$port = 3306;

$conn = new PDO("mysql:host=$host;port=$port;dbname=" . $dbname, $user, $pass);
