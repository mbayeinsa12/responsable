<?php
include 'db.php';

$sql = "SELECT p.nom, p.prenom, s.nom AS salle, m.nom AS materiel, pl.date_reservation, 
        DAYNAME(pl.date_reservation) AS jour_semaine
        FROM plannings pl
        JOIN Personne p ON pl.personne_id = p.id
        JOIN Salle s ON pl.salle_id = s.id
        JOIN Materiel m ON pl.materiel_id = m.id";
    
$result = mysqli_query($conn, $sql);

mysqli_close($conn);
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Planning des Réservations</title>

    
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f8f9fa;
            padding-top: 50px;
        }

        .container {
            background-color: white;
            padding: 30px;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            width: 100%;
            max-width: 1000px;
            margin: 0 auto;
        }

        .logo {
            margin-bottom: 30px;
        }

        .logo img {
            width: 150px;
            height: auto;
        }

        h1 {
            margin-bottom: 30px;
            font-size: 28px;
        }

        .table th, .table td {
            text-align: center;
        }

        .table th {
            background-color: #007bff;
            color: white;
        }

        .table-striped tbody tr:nth-of-type(odd) {
            background-color: #f2f2f2;
        }
    </style>
</head>
<body>

    <div class="container">
        
        <div class="logo">
            <img src="image.png" alt="Logo"> 
        </div>

        <h1>Planning des Réservations</h1>

        
        <table class="table table-bordered table-striped">
            <thead class="thead-dark">
                <tr>
                    <th>Nom</th>
                    <th>Prénom</th>
                    <th>Salle</th>
                    <th>Matériel</th>
                    <th>Date de Réservation</th>
                    <th>Jour de la Semaine</th>
                </tr>
            </thead>
            <tbody>
                <?php
                
                if (mysqli_num_rows($result) > 0) {
                    while ($row = mysqli_fetch_assoc($result)) {
                        echo "<tr>
                                <td>" . htmlspecialchars($row['nom']) . "</td>
                                <td>" . htmlspecialchars($row['prenom']) . "</td>
                                <td>" . htmlspecialchars($row['salle']) . "</td>
                                <td>" . htmlspecialchars($row['materiel']) . "</td>
                                <td>" . htmlspecialchars($row['date_reservation']) . "</td>
                                <td>" . htmlspecialchars($row['jour_semaine']) . "</td>
                              </tr>";
                    }
                } else {
                    echo "<tr><td colspan='6'>Aucune réservation trouvée</td></tr>";
                }
                ?>
            </tbody>
        </table>

       
        <br>
        <a href="index.php" class="btn btn-primary">Retour à l'index</a>
    </div>

    
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
