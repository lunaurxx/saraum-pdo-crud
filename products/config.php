<?php

$servername = "localhost";
$username = "u593341949_dev_saraum";
$password = "u593341949_db_saraum";
$dbname = :"20212047Saraum";
/*
$host = 'localhost';
$dbname = 'u593341949_db_quidit';
$username = 'u593341949_dev_quidit';
$password = '20212014Quidit';
*/
try {   
 $pdo = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
 $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
 die("Database connection failed: " . $e->getMessage());
}

