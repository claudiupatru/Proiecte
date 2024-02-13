<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ștergere Angajat</title>
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
            background-color: #e74c3c;
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
        <h1>Ștergere Angajat</h1>
    </header>
    <nav>
        <a href="logout.php">Logout</a>
        <a href="index.php">Home</a>
        <a href="angajati.php">Angajati</a>
    </nav>
    <?php
include("connection.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Preia datele din formular
    $angajat_id = $_POST["angajat_id"];

    // SQL pentru ștergerea angajatului în funcție de ID
    $sql = "DELETE FROM angajati WHERE angajat_id = '$angajat_id'";

    // Verificare dacă ștergerea a fost realizată cu succes
    if (mysqli_query($con, $sql)) {
        echo "Angajat șters cu succes!";
    } else {
        echo "Eroare la ștergerea angajatului: " . mysqli_error($con);
    }

    // Închiderea conexiunii la baza de date
    mysqli_close($con);
}
?>

    <form action="del_angajati.php" method="post">
        <label for="angajat_id">ID Angajat:</label>
        <input type="text" name="angajat_id" required>

        <button type="submit">Șterge Angajat</button>
    </form>

</body>
</html>
