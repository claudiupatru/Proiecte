
<!DOCTYPE html>
<html>
<head>
    <title>My Website</title>
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

        table {
            border-collapse: collapse;
            width: 100%;
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
        <h1>Servicii Medicale la Tine Acasă</h1>
    </header>

    <nav>
        <a href="logout.php">Logout</a>
        <a href="index.php">Home</a>
    </nav>

    <section>
    <?php
include("connection.php");

// Procesare afișare programări
$sql = "SELECT * FROM clienti";
$result = mysqli_query($con, $sql);

if($result) {
    if (mysqli_num_rows($result) > 0) {
        echo "<table>";
        echo "<tr><th>ID Client</th><th>Nume</th><th>Prenume</th><th>Număr Telefon</th></tr>";

        while ($rowClienti = mysqli_fetch_assoc($result)) {
            echo "<tr>";
            echo "<td>".$rowClienti['client_id']."</td>";
            echo "<td>".$rowClienti['nume']."</td>";
            echo "<td>".$rowClienti['prenume']."</td>";
            echo "<td>".$rowClienti['nr_telefon']."</td>";
            echo "</tr>";
        }

        echo "</table>";
    } else {
        echo "Nu există programări în baza de date.";
    }
} else {
    echo 'Eroare la interogare: ' . mysqli_error($con);
}
?>

    </section>
    <div class="button-container">
        <a href="add_clienti.php"><button >Adauga</button></a>
        <a href="up_clienti.php"><button >Modifica</button></a>
        <a href="del_clienti.php"><button style="background-color: red;">Sterge</button></a>
    </div>
</body>
</html>
