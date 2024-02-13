<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editare Serviciu</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f4f4f4;
            text-align: center;
        }

        header {
            background-color: #333;
            color: #fff;
            padding: 10px;
        }

        form {
            width: 50%;
            margin: 20px auto;
            padding: 20px;
            background-color: #fff;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        input {
            padding: 8px;
            margin: 5px;
            width: 100%;
            box-sizing: border-box;
        }

        button {
            background-color: #444;
            color: white;
            padding: 10px 20px;
            text-align: center;
            text-decoration: none;
            display: inline-block;
            font-size: 16px;
            margin-top: 10px;
            cursor: pointer;
            border-radius: 5px;
        }
        nav {
            background-color: #444;
            padding: 10px;
        }
        nav a {
            color: #fff;
            text-decoration: none;
            padding: 10px;
            margin: 0 5px;
        }
    </style>
</head>
<body>

    <header>
        <h1>Editare Serviciu</h1>
    </header>
    <nav>
        <a href="logout.php">Logout</a>
        <a href="index.php">Home</a>
        <a href="servicii.php">Servicii</a>
    </nav>
    <?php
include("connection.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Preia datele din formular
    $serviciu_id = $_POST["serviciu_id"];
    $tip_serviciu = $_POST["tip_serviciu"];
    $cost = $_POST["cost"];

    // SQL pentru actualizarea datelor în tabela servicii
    $sql = "UPDATE servicii
            SET tip_serviciu = '$tip_serviciu', cost = '$cost'
            WHERE serviciu_id = '$serviciu_id'";

    // Verificare dacă actualizarea a fost realizată cu succes
    if (mysqli_query($con, $sql)) {
        echo "Serviciu actualizat cu succes!";
    } else {
        echo "Eroare la actualizarea serviciului: " . mysqli_error($con);
    }

    // Închiderea conexiunii la baza de date
    mysqli_close($con);
}
?>

    <form action="up_servicii.php" method="post">
        <label for="serviciu_id">ID Serviciu:</label>
        <input type="text" name="serviciu_id" required>

        <label for="tip_serviciu">Tip Serviciu:</label>
        <input type="text" name="tip_serviciu" required>

        <label for="cost">Cost:</label>
        <input type="text" name="cost" required>

        <button type="submit">Editare Serviciu</button>
    </form>

</body>
</html>
