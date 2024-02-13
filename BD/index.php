<?php 
session_start();

include("connection.php");
include("functions.php");

$user_data = check_login($con);

?>

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
    </style>
</head>
<body>

    <header>
        <h1>Servicii Medicale la Tine Acasă</h1>
    </header>

    <nav>
        <a href="logout.php">Logout</a>
    </nav>

    <section>
        <h2>Hello, <?php echo $user_data['username']; ?></h2>
        <br>
		<a href="programari.php"><button>Programari</button></a>
		<a href="clienti.php"><button>Clienti</button></a>
		<a href="servicii.php"><button>Servicii</button></a>
        <a href="angajati.php"><button>Angajati</button></a>
        <br>
        <a href="afisare_angajati.php"><button>Interogari angajati</button></a>
        <a href="afisare_clienti.php"><button>Interogari clienti</button></a>
        <a href="afisare_programari.php"><button>Interogari programari</button></a>

    </section>

</body>
</html>
