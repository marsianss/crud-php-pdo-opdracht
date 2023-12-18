<!DOCTYPE html>
<html>
<head>
    <title>Auto's - Gesorteerd op Prijs (Oplopend)</title>
</head>
<body>

<h2>De vijf duurste auto's ter wereld!</h2>

<!-- Knop om naar het formulier te gaan -->
<a href="create.php">Voeg een nieuwe auto toe</a>

<table border="1">
    <tr>
        <th>Merk</th>
        <th>Model</th>
        <th>Topsnelheid</th>
        <th>Prijs</th>
    </tr>

    <?php
    // Databaseconnectie
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "crud_php_pdo_opdracht";

    try {
        $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        // Query om auto's op te halen, gesorteerd op prijs (Oplopend)
        $sql = "SELECT * FROM Car ORDER BY Prijs ASC";
        $stmt = $conn->query($sql);

        // Check of er resultaten zijn
        if ($stmt->rowCount() > 0) {
            while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                echo "<tr>";
                echo "<td>".$row['Merk']."</td>";
                echo "<td>".$row['Model']."</td>";
                echo "<td>".$row['Topsnelheid']."</td>";
                echo "<td>".$row['Prijs']."</td>";
                echo "</tr>";
            }
        } else {
            echo "<tr><td colspan='4'>Geen auto's gevonden</td></tr>";
        }
    } catch(PDOException $e) {
        echo "Fout bij ophalen van auto's: " . $e->getMessage();
    }
    ?>
</table>

</body>
</html>
