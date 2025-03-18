<?php
include 'db.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $personne_id = $_POST['personne_id'];
    $materiel_id = $_POST['materiel_id'];
    $date_reservation = $_POST['date_reservation'];

    $sql = "INSERT INTO ReserverMateriel (personne_id, materiel_id, date_reservation) 
            VALUES ('$personne_id', '$materiel_id', '$date_reservation')";

    if (mysqli_query($conn, $sql)) {
        echo "<div class='alert alert-success fadeIn' role='alert'>Matériel réservé avec succès</div>";
    } else {
        echo "<div class='alert alert-danger fadeIn' role='alert'>Erreur : " . mysqli_error($conn) . "</div>";
    }
}

$sql_personne = "SELECT * FROM Personne";
$sql_materiel = "SELECT * FROM Materiel";
$result_personne = mysqli_query($conn, $sql_personne);
$result_materiel = mysqli_query($conn, $sql_materiel);

mysqli_close($conn);
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Réserver du Matériel</title>

    <!-- Bootstrap CSS for styling -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    
    <style>
        body {
            background-color: #f8f9fa;
            padding-top: 50px;
            animation: fadeIn 2s ease-out;
        }

        .container {
            background-color: white;
            padding: 30px;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            width: 100%;
            max-width: 600px;
            margin: 0 auto;
            animation: slideIn 1s ease-out;
        }

        h1 {
            margin-bottom: 30px;
            font-size: 28px;
            text-align: center;
            animation: fadeInUp 1s ease-out;
        }

        .form-group label {
            font-weight: bold;
            animation: fadeIn 1s ease-out;
        }

        .form-group select, .form-group input {
            width: 100%;
            padding: 8px;
            margin-bottom: 15px;
            border: 1px solid #ced4da;
            border-radius: 4px;
            animation: fadeIn 1.5s ease-out;
        }

        .btn {
            width: 100%;
            padding: 10px;
            background-color: #007bff;
            color: white;
            border: none;
            border-radius: 4px;
            font-size: 16px;
            transition: background-color 0.3s ease;
            animation: bounceIn 1s ease-out;
        }

        .btn:hover {
            background-color: #0056b3;
        }

        .back-link {
            display: block;
            text-align: center;
            margin-top: 15px;
        }

        /* Animations */
        @keyframes fadeIn {
            0% {
                opacity: 0;
            }
            100% {
                opacity: 1;
            }
        }

        @keyframes fadeInUp {
            0% {
                opacity: 0;
                transform: translateY(20px);
            }
            100% {
                opacity: 1;
                transform: translateY(0);
            }
        }

        @keyframes slideIn {
            0% {
                transform: translateX(-100%);
            }
            100% {
                transform: translateX(0);
            }
        }

        @keyframes bounceIn {
            0% {
                transform: scale(0.5);
                opacity: 0;
            }
            60% {
                transform: scale(1.1);
            }
            100% {
                transform: scale(1);
                opacity: 1;
            }
        }
    </style>
</head>
<body>

    <div class="container">
        <h1>Réserver du Matériel</h1>

        <form method="POST" action="reservation_materiel.php">
            <!-- Personne selection -->
            <div class="form-group">
                <label for="personne_id">Personne: </label>
                <select name="personne_id" class="form-control" required>
                    <?php while ($row = mysqli_fetch_assoc($result_personne)) { ?>
                        <option value="<?php echo $row['id']; ?>"><?php echo $row['nom'] . ' ' . $row['prenom']; ?></option>
                    <?php } ?>
                </select>
            </div>

            <!-- Matériel selection -->
            <div class="form-group">
                <label for="materiel_id">Matériel: </label>
                <select name="materiel_id" class="form-control" required>
                    <?php while ($row = mysqli_fetch_assoc($result_materiel)) { ?>
                        <option value="<?php echo $row['id']; ?>"><?php echo $row['nom']; ?></option>
                    <?php } ?>
                </select>
            </div>

            <!-- Date de réservation -->
            <div class="form-group">
                <label for="date_reservation">Date de réservation: </label>
                <input type="date" name="date_reservation" class="form-control" required>
            </div>

            <!-- Submit button -->
            <button type="submit" class="btn">Réserver</button>
        </form>

        <!-- Link to index page -->
        <div class="back-link">
            <a href="index.php" class="btn btn-link">Retour à l'index</a>
        </div>
    </div>

    <!-- Bootstrap JS and dependencies -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
