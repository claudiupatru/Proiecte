<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Adăugare Serviciu Nou</title>
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
    </style>
</head>
<body>

    <header>
        <h1>Adăugare Serviciu Nou</h1>
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
    $tip_serviciu = $_POST["tip_serviciu"];
    $cost = $_POST["cost"];

    // SQL pentru inserarea datelor în tabela servicii
    $sql = "INSERT INTO servicii (tip_serviciu, cost) 
            VALUES ('$tip_serviciu', '$cost')";

    // Verificare dacă inserarea a fost realizată cu succes
    if (mysqli_query($con, $sql)) {
        echo "Serviciu adăugat cu succes!";
    } else {
        echo "Eroare la adăugarea serviciului: " . mysqli_error($con);
    }

    // Închiderea conexiunii la baza de date
    mysqli_close($con);
}
?>

    <form action="add_servicii.php" method="post">

        <label for="tip_serviciu">Tip Serviciu:</label>
        <input type="text" name="tip_serviciu" required>

        <label for="cost">Cost:</label>
        <input type="text" name="cost" required>
        <button type="submit">Adaugă Serviciu</button>
        
    </form>
</body>
</html>
