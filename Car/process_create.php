<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "crud_php_pdo_opdracht";

try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    if(isset($_POST['submit'])) {
        // Controleer of formuliervariabelen zijn ingesteld
        if(isset($_POST['merk']) && isset($_POST['model']) && isset($_POST['topsnelheid']) && isset($_POST['prijs'])) {
            // Haal waarden van het formulier op
            $merk = $_POST['merk'];
            $model = $_POST['model'];
            $topsnelheid = $_POST['topsnelheid'];
            $prijs = $_POST['prijs'];

            // Controleer of waarden niet leeg zijn
            if(!empty($merk) && !empty($model) && !empty($topsnelheid) && !empty($prijs)) {
                $sql = "INSERT INTO Car (Merk, Model, Topsnelheid, Prijs) VALUES (?, ?, ?, ?)";
                $stmt = $conn->prepare($sql);
                $stmt->execute([$merk, $model, $topsnelheid, $prijs]);

                echo "Nieuwe auto succesvol toegevoegd aan de database.";

                // Omleiden naar index.php
                header("Location: index.php");
                exit();
            } else {
                echo "Gelieve alle velden in te vullen.";
            }
        } else {
            echo "Er zijn ontbrekende formuliervariabelen.";
        }
    } else {
        echo "Er zijn geen gegevens verzonden om toe te voegen.";
    }
} catch(PDOException $e) {
    echo "Fout bij toevoegen van nieuwe auto: " . $e->getMessage();
}
?> 