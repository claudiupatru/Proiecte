<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Afisare Angajati</title>
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

    section {
        padding: 20px;
    }

    input[type="text"] {
        padding: 8px;
        margin: 5px;
        border: 1px solid #ccc;
        border-radius: 3px;
    }

    button {
        background-color: #444;
        color: white;
        padding: 10px 20px;
        text-align: center;
        text-decoration: none;
        display: inline-block;
        font-size: 16px;
        margin: 5px;
        cursor: pointer;
        border-radius: 5px;
    }
</style>

</head>
<nav>
        <a href="logout.php">Logout</a>
        <a href="index.php">Home</a>
    </nav>
    <?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST['ore_lucrate']) && !empty($_POST['ore_lucrate'])) {
        $ore_lucrate = $_POST['ore_lucrate'];

        // Verifică dacă input-ul este numeric și nu este gol
        if (is_numeric($ore_lucrate)) {
            include("connection.php");

            // Query pentru a obține angajații care au lucrat mai mult de numărul specificat de ore
            $sql = "SELECT nume, prenume
                    FROM Angajati
                    JOIN Ore_lucrate ON Angajati.angajat_id = Ore_lucrate.angajat_id
                    WHERE Ore_lucrate.nr_ore > $ore_lucrate";

            $result = mysqli_query($con, $sql);

            if ($result) {
                echo "<h2>Angajații care au lucrat mai mult de $ore_lucrate ore:</h2>";
                echo "<ul>";
                while ($row = mysqli_fetch_assoc($result)) {
                    echo "<li>{$row['nume']} {$row['prenume']}</li>";
                }
                echo "</ul>";
            } else {
                echo "Eroare la interogare: " . mysqli_error($con);
            }

            // Închide conexiunea la baza de date
            mysqli_close($con);
        } else {
            echo "Introduceți un număr valid de ore.";
        }
    } else {
        echo "Introduceți un număr valid de ore.";
    }
}
?>


<body>

    <div id="container">
        <form method="post" action="afisare_angajati.php">
            <label for="ore_lucrate">Introdu numărul de ore:</label>
            <input id="text" type="text" name="ore_lucrate" required><br>
            <input id="button" type="submit" value="Afișează Angajații">
        </form>
    </div>
</body>
<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST['data_programare'])) {
        $data_programare = $_POST['data_programare'];

        // Verifică dacă input-ul pentru data este valid
        if (!empty($data_programare)) {
            include("connection.php");

            // Query pentru a obține angajații cu programări la data specificată
            $sql = "SELECT angajati.nume, angajati.prenume, programari.data_programare
                    FROM angajati
                    JOIN programari ON angajati.angajat_id = programari.angajat_id
                    WHERE programari.data_programare = '$data_programare'";

            $result2 = mysqli_query($con, $sql);

            if ($result2) {
                echo "<h2>Angajații cu programări la data de $data_programare:</h2>";
                echo "<ul>";
                while ($row = mysqli_fetch_assoc($result2)) {
                    echo "<li>{$row['nume']} {$row['prenume']} - Data: {$row['data_programare']}</li>";
                }
                echo "</ul>";
            } else {
                echo "Eroare la interogare: " . mysqli_error($con);
            }

            // Închide conexiunea la baza de date
            mysqli_close($con);
        } else {
            echo "Introduceți o dată validă.";
        }
    } else {
        echo "Nu s-a primit data programării.";
    }
}
?>

<body>
    
    <div id="container">
        <form method="post" action="afisare_angajati.php">
            <label for="data_programare">Introdu data programării:</label>
            <input id="text" type="date" name="data_programare" required><br>
            <input id="button" type="submit" value="Afișează Programări">
        </form>
    </div>
</body>
<body>
    <?php
include("connection.php");

// Query pentru a obține clienții cu cea mai mare notă la o programare
$sql = "SELECT a.nume, a.prenume, (
    SELECT MAX(fe.nota) 
    FROM feedback fe
    WHERE fe.programare_id IN (
        SELECT p.programare_id
        FROM programari p
        WHERE p.angajat_id = a.angajat_id
    )
) AS cea_mai_mare_nota
FROM angajati a;

";

$result3 = mysqli_query($con, $sql);

if ($result3) {
    echo "<h2>Nota maxima obtinuta de fiecare angajat:</h2>";
    echo "<ul>";
    while ($row = mysqli_fetch_assoc($result3)) {
        echo "<li>{$row['nume']} {$row['prenume']} - Notă: {$row['cea_mai_mare_nota']}</li>";
    }
    echo "</ul>";
} else {
    echo "Eroare la interogare: " . mysqli_error($con);
}

// Închide conexiunea la baza de date
mysqli_close($con);
?>
</html>
