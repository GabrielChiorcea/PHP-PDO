<?php

$server = "///";
$db="gabi_remote";
$user="gabi_remo";
$pass= "/////";

try {
    $handler = new PDO("mysql:host=$server;dbname=$db", $user, $pass);
    $handler->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    echo "COIA". $e->getMessage();
}

// select all users
$stmt = $handler->query("SELECT * FROM users");


$data = $handler->query("SELECT * FROM users")->fetchAll(); // fetchALL when having multiple rows
foreach ($data as $row) {
    echo $row['name']."<br />\n";
}

// select a particular user by id
$stmt = $pdo->prepare("SELECT * FROM users WHERE id=?");
$stmt->execute([$id]); 
$user = $stmt->fetch(); //fetch for 1 row


$sql = "INSERT INTO users (name, surname, sex) VALUES (?,?,?)";
$stmt= $pdo->prepare($sql);
$stmt->execute([$name, $surname, $sex]);

//or

$data = [
    'name' => $name,
    'surname' => $surname,
    'sex' => $sex,
];
$sql = "INSERT INTO users (name, surname, sex) VALUES (:name, :surname, :sex)";
$stmt= $pdo->prepare($sql);
$stmt->execute($data);