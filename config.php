<?php
$servername = "localhost";
$username = "jouw_gebruikersnaam";
$password = "jouw_wachtwoord";

try {
    $conn = new PDO("mysql:host=$servername", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $sql = "CREATE DATABASE IF NOT EXISTS crud_php_pdo_opdracht DEFAULT CHARSET latin1 COLLATE latin1_general_ci";
    $conn->exec($sql);

    $conn->exec("USE crud_php_pdo_opdracht");

    $sql = "CREATE TABLE IF NOT EXISTS Car (
        Id int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
        Merk varchar(200) NOT NULL,
        Model varchar(200) NOT NULL,
        Topsnelheid smallint(5) UNSIGNED NOT NULL,
        Prijs int(11) NOT NULL,
        PRIMARY KEY (Id)
    ) ENGINE=InnoDB DEFAULT CHARSET=latin1";
    $conn->exec($sql);
} catch(PDOException $e) {
    echo "Fout bij het aanmaken van de database en tabel: " . $e->getMessage();
}
?>

