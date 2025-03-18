<?php
include 'db.php';
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Réservations</title>
    <style>
        
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        
        .logo {
            text-align: center;
            margin-top: 30px;
        }

        .logo img {
            width: 150px; 
            height: auto;
        }

        
        .container {
            margin-top: 50px;
            max-width: 800px;
            padding: 20px;
            border-radius: 8px;
            background-color: #fff;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            margin-left: auto;
            margin-right: auto;
        }

        
        table {
            width: 100%;
            margin-top: 30px;
            border-collapse: collapse;
        }

        table th, table td {
            padding: 12px;
            text-align: left;
            border: 1px solid #ddd;
        }

        table th {
            background-color: #f4f4f4;
        }

        table tr:hover {
            background-color: #f1f1f1;
        }

        /* Form Styling */
        form input[type="submit"] {
            background-color: #333;
            color: #fff;
            border: none;
            padding: 10px 15px;
            border-radius: 5px;
            cursor: pointer;
            margin-top: 20px;
        }hhhhhhh

        form input[type="submit"]:hover {
            background-color: #555;
        }
    </style>
</head>
<body>

    
    <div class="logo">
        <img src="image.png" alt="Logo">
    </div>

    <div class="container">
        <h1 class="mt-5 text-center">Bienvenue dans le système de réservation</h1>

        <h2 class="mt-4">Liste des Personnes</h2>
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nom</th>
                    <th>Prénom</th>
                    <th>Email</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $sql = "SELECT * FROM Personne";
                $result = mysqli_query($conn, $sql);
                if (mysqli_num_rows($result) > 0) {
                    while ($row = mysqli_fetch_assoc($result)) {
                        echo "<tr><td>" . $row['id'] . "</td><td>" . $row['nom'] . "</td><td>" . $row['prenom'] . "</td><td>" . $row['email'] . "</td></tr>";
                    }
                } else {
                    echo "<tr><td colspan='4'>Aucune personne trouvée</td></tr>";
                }
                ?>
            </tbody>
        </table>

        <h2 class="mt-4">Liste des Salles</h2>
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nom</th>
                    <th>Capacité</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $sql = "SELECT * FROM Salle";
                $result = mysqli_query($conn, $sql);
                if (mysqli_num_rows($result) > 0) {
                    while ($row = mysqli_fetch_assoc($result)) {
                        echo "<tr><td>" . $row['id'] . "</td><td>" . $row['nom'] . "</td><td>" . $row['capacite'] . "</td></tr>";
                    }
                } else {
                    echo "<tr><td colspan='3'>Aucune salle trouvée</td></tr>";
                }
                ?>
            </tbody>
        </table>
    </div>

</body>
</html>
