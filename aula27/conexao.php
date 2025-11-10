<?php
// Configurações de conexão com o banco de dados
$host = "localhost";
$user = "root";
$pass = "";
$dbname = "celke";
$port = "3306";

// Conexão com o banco de dados usando PDO
$pdo = new PDO ("mysql:host=$host;port=$port;dbname=$dbname", $user, $pass);

// Conexão  com obanco de dados sem porta
// $pdo = new PDO("mysql:host=$host;dbname=$dbname", $user, $pass);
?>