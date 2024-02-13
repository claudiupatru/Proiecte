<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
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

        table {
            border-collapse: collapse;
            width: 50%;
            margin: auto;
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
    </style>
</head>
<body>

    <header>
        <h1>Afișare Clienti</h1>
    </header>

    <nav>
        <a href="logout.php">Logout</a>
        <a href="index.php">Home</a>
    </nav>

    <section>
        <?php
        include("connection.php");

        // Query pentru a obține clienții și numărul de programări
        $sql = "SELECT c.nume, c.prenume, COUNT(p.programare_id) AS numar_programari
                FROM clienti c
                LEFT JOIN programari p ON c.client_id = p.client_id
                GROUP BY c.client_id, c.nume, c.prenume";

        $result = mysqli_query($con, $sql);

        if ($result) {
            echo"<h2>Afisare clienti si numarul de programari</h2>";
            echo "<table>";
            echo "<tr><th>Nume</th><th>Prenume</th><th>Număr Programări</th></tr>";

            while ($row = mysqli_fetch_assoc($result)) {
                echo "<tr>";
                echo "<td>{$row['nume']}</td>";
                echo "<td>{$row['prenume']}</td>";
                echo "<td>{$row['numar_programari']}</td>";
                echo "</tr>";
            }

            echo "</table>";
        } else {
            echo "Eroare la interogare: " . mysqli_error($con);
        }

        // Închide conexiunea la baza de date
        mysqli_close($con);
        ?>
    </section>
    <section>
    <?php
            include("connection.php");

            $sql = "SELECT
                        c.nume AS client_nume,
                        c.prenume AS client_prenume,
                        a.nume AS angajat_nume,
                        a.prenume AS angajat_prenume
                    FROM
                        Programari p
                    JOIN
                        Clienti c ON p.client_id = c.client_id
                    JOIN
                        Angajati a ON p.angajat_id = a.angajat_id";

            $result2 = mysqli_query($con, $sql);

            if ($result2 && mysqli_num_rows($result2) > 0) {
                echo"<h2>Afisare clienti si angajatii care le au efectuat programarea</h2>";
                echo "<table>";
                echo "<tr><th>Client Nume</th><th>Client Prenume</th><th>Angajat Nume</th><th>Angajat Prenume</th></tr>";

                while ($row = mysqli_fetch_assoc($result2)) {
                    echo "<tr>";
                    echo "<td>{$row['client_nume']}</td>";
                    echo "<td>{$row['client_prenume']}</td>";
                    echo "<td>{$row['angajat_nume']}</td>";
                    echo "<td>{$row['angajat_prenume']}</td>";
                    echo "</tr>";
                }

                echo "</table>";
            } else {
                echo "Nu există programări în baza de date.";
            }

            mysqli_close($con);
        ?>
    </section>
    <section>
    <?php
include("connection.php");

$sql = "
    SELECT 
        clienti.nume, 
        clienti.prenume, 
        programari.data_programare, 
        feedback.nota,
        programari.ora_programare
    FROM 
        clienti
    JOIN 
        programari ON clienti.client_id = programari.client_id
    LEFT JOIN 
        feedback ON programari.programare_id = feedback.programare_id
    WHERE 
        feedback.nota = (
            SELECT MAX(nota) 
            FROM feedback 
            WHERE programare_id = programari.programare_id
        );
";

$result3 = mysqli_query($con, $sql);

if ($result3) {
    if (mysqli_num_rows($result3) > 0) {
        echo "<h2>Nota maximă asociată fiecărei programări:</h2>";
        echo "<table border='1'>
            <tr>
                <th>Nume</th>
                <th>Prenume</th>
                <th>Data Programare</th>
                <th>Nota</th>
                <th>Ora Programare</th>
            </tr>";

        while ($row = mysqli_fetch_assoc($result3)) {
            echo "<tr>";
            echo "<td>".$row['nume']."</td>";
            echo "<td>".$row['prenume']."</td>";
            echo "<td>".$row['data_programare']."</td>";
            echo "<td>".$row['nota']."</td>";
            echo "<td>".$row['ora_programare']."</td>";
            echo "</tr>";
        }

        echo "</table>";
    } else {
        echo "Nu există rezultate.";
    }
} else {
    echo 'Eroare la interogare: ' . mysqli_error($con);
}

mysqli_close($con);
?>
    </section>
</body>
</html>
