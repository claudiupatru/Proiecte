<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editare Programare</title>
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
        <h1>Editare Programare</h1>
    </header>
    <nav>
        <a href="logout.php">Logout</a>
        <a href="index.php">Home</a>
        <a href="programari.php">Programari</a>
    </nav>
    <?php
include("connection.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Preia datele din formular
    $programare_id = $_POST["programare_id"];
    $noua_data_programare = $_POST["data_programare"];
    $noua_ora_programare = $_POST["ora_programare"];
    $stare= $_POST["stare_programare"];

    // SQL pentru actualizarea datelor în tabela programari
    $sql = "UPDATE programari 
            SET data_programare = '$noua_data_programare', ora_programare = '$noua_ora_programare', stare_programare = '$stare'
            WHERE programare_id = '$programare_id'";

    // Verificare dacă actualizarea a fost realizată cu succes
    if (mysqli_query($con, $sql)) {
        echo "Programare actualizată cu succes!";
    } else {
        echo "Eroare la actualizarea programării: " . mysqli_error($con);
    }

    // Închiderea conexiunii la baza de date
    mysqli_close($con);
}
?>

    <form action="up_programare.php" method="post">
        <label for="programare_id">ID Programare:</label>
        <input type="text" name="programare_id" required>

        <label for="data_programare">Noua Data Programare:</label>
        <input type="date" name="data_programare" required>

        <label for="ora_programare">Noua Ora Programare:</label>
        <input type="time" name="ora_programare" required>

        <label for="stare_programare">Stare:</label>
        <input type="text" name="programare_id" required>

        <button type="submit">Editare Programare</button>
    </form>

</body>
</html>
