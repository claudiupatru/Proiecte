<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Afișare Programări</title>
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

        section {
            padding: 20px;
        }

        table {
            border-collapse: collapse;
            width: 100%;
            margin-top: 20px;
        }

        table, th, td {
            border: 1px solid black;
        }

        th, td {
            padding: 8px;
            text-align: left;
        }

        th {
            background-color: #444;
            color: white;
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
        <h1>Afișare Programări</h1>
    </header>
    <nav>
        <a href="logout.php">Logout</a>
        <a href="index.php">Home</a></nav>
    <section>
        <?php
        include("connection.php");

        // Execută query-ul
        $query = "SELECT servicii.tip_serviciu, angajati.nume AS nume_angajat, angajati.prenume AS prenume_angajat, programari.data_programare
                  FROM programari
                  JOIN servicii ON programari.serviciu_id = servicii.serviciu_id
                  JOIN angajati ON programari.angajat_id = angajati.angajat_id";

        $result = mysqli_query($con, $query);

        if ($result && mysqli_num_rows($result) > 0) {
            echo "<table>";
            echo "<tr><th>Tip Serviciu</th><th>Nume Angajat</th><th>Prenume Angajat</th><th>Data Programare</th></tr>";

            while ($row = mysqli_fetch_assoc($result)) {
                echo "<tr>";
                echo "<td>{$row['tip_serviciu']}</td>";
                echo "<td>{$row['nume_angajat']}</td>";
                echo "<td>{$row['prenume_angajat']}</td>";
                echo "<td>{$row['data_programare']}</td>";
                echo "</tr>";
            }

            echo "</table>";
        } else {
            echo "Nu există programări în baza de date.";
        }

        // Închide conexiunea la baza de date
        mysqli_close($con);
        ?>
    </section>
    <section>
    <?php
include("connection.php");

// Execută query-ul
$query = "SELECT clienti.nume, clienti.prenume, servicii.tip_serviciu, servicii.cost, programari.data_programare
          FROM programari
          JOIN clienti ON programari.client_id = clienti.client_id
          JOIN servicii ON programari.serviciu_id = servicii.serviciu_id
          ORDER BY servicii.cost";

$result2 = mysqli_query($con, $query);

if ($result2 && mysqli_num_rows($result2) > 0) {
    echo "<table>";
    echo "<tr><th>Nume Client</th><th>Prenume Client</th><th>Tip Serviciu</th><th>Cost Serviciu</th><th>Data Programare</th></tr>";

    while ($row = mysqli_fetch_assoc($result2)) {
        echo "<tr>";
        echo "<td>{$row['nume']}</td>";
        echo "<td>{$row['prenume']}</td>";
        echo "<td>{$row['tip_serviciu']}</td>";
        echo "<td>{$row['cost']}</td>";
        echo "<td>{$row['data_programare']}</td>";
        echo "</tr>";
    }

    echo "</table>";
} else {
    echo "Nu există programări în baza de date.";
}

// Închide conexiunea la baza de date
mysqli_close($con);
?>

    </section>
    <section>
        <?php
        include("connection.php");

        $query = "SELECT a.nume, a.prenume, 
                    (SELECT COUNT(*) FROM programari p WHERE p.angajat_id = a.angajat_id) AS numar_programari
                FROM angajati a
                WHERE (SELECT COUNT(*) FROM programari p WHERE p.angajat_id = a.angajat_id) > 0";

        $result = mysqli_query($con, $query);

        if ($result && mysqli_num_rows($result) > 0) {
            echo "<table>";
            echo "<tr><th>Nume</th><th>Prenume</th><th>Numar Programari</th></tr>";

            while ($row = mysqli_fetch_assoc($result)) {
                echo "<tr>";
                echo "<td>{$row['nume']}</td>";
                echo "<td>{$row['prenume']}</td>";
                echo "<td>{$row['numar_programari']}</td>";
                echo "</tr>";
            }

            echo "</table>";
        } else {
            echo "Nu există angajați cu programări în baza de date.";
        }

        // Închide conexiunea la baza de date
        mysqli_close($con);
        ?>
    </section>
</body>
</html>
