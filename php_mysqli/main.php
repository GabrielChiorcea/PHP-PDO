<?php

$host = '176.126.172.208';
$user = 'gabi_remo';
$password = '//////';
$database = 'gabi_remote';

$mysqli = new mysqli($host, $user, $password, $database); 


if ($mysqli->connect_error) {  // Verifică erorile de conexiune
    die("Connection failed: " . $mysqli->connect_error);
} else {
    $result = $mysqli->query("SELECT * FROM users");  // Execută interogarea
    
    if ($result->num_rows > 0) {  // Verifică dacă există rânduri în rezultat
        while($row = $result->fetch_assoc()) {  // Parcurge și afișează fiecare rând
            print_r($row);
        }
    } else {
        echo "No results found.";
    }
    
    $mysqli->close();  // Închide conexiunea
}
