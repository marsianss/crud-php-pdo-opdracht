<!DOCTYPE html>
<html>
<head>
    <title>Nieuwe auto toevoegen</title>
    <style>
        form {
            margin: 20px;
            padding: 20px;
            border: 1px solid #ccc;
            width: 300px;
        }
        input[type="text"],
        input[type="number"] {
            width: 100%;
            padding: 5px;
            margin-bottom: 10px;
        }
        input[type="submit"] {
            padding: 10px;
        }
    </style>
</head>
<body>

<h2>Nieuwe auto toevoegen</h2>

<form method="post" action="process_create.php">
    Merk: <input type="text" name="merk" required><br><br>
    Model: <input type="text" name="model" required><br><br>
    Topsnelheid: <input type="number" name="topsnelheid" required><br><br>
    Prijs: <input type="number" name="prijs" required><br><br>
    <input type="submit" name="submit" value="Voeg toe">
</form>

</body>
</html>
