<?php  
include 'db.php';  

if ($_SERVER["REQUEST_METHOD"] == "POST") {  
    $personne_id = $_POST['personne_id'];  
    $salle_id = $_POST['salle_id'];  
    $date_reservation = $_POST['date_reservation'];  

    $sql = "INSERT INTO ReserverSalle (personne_id, salle_id, date_reservation) VALUES (?, ?, ?)";  
    $stmt = mysqli_prepare($conn, $sql);  
    mysqli_stmt_bind_param($stmt, "iis", $personne_id, $salle_id, $date_reservation);  
    if (mysqli_stmt_execute($stmt)) {  
        echo "<div class='success-message'>Salle réservée avec succès!</div>";  
    } else {  
        echo "<div class='error-message'>Erreur : " . mysqli_error($conn) . "</div>";  
    }  
    mysqli_stmt_close($stmt);  
}  

$sql_personne = "SELECT id, nom, prenom FROM Personne";  
$sql_salle = "SELECT id, nom FROM Salle"; // Sélectionner uniquement les colonnes nécessaires  
$result_personne = mysqli_query($conn, $sql_personne);  
$result_salle = mysqli_query($conn, $sql_salle);  
?>  

<!DOCTYPE html>  
<html lang="fr">  
<head>  
    <meta charset="UTF-8">  
    <meta name="viewport" content="width=device-width, initial-scale=1.0">  
    <title>Réserver une Salle</title>  
    
    <style>  
        body {  
            font-family: Arial, sans-serif;  
            background-color: #f4f4f4;  
            margin: 0;  
            padding: 0;  
            display: flex;  
            justify-content: center;  
            align-items: center;  
            min-height: 100vh;  
        }  

        .container {  
            background-color: white;  
            padding: 20px;  
            border-radius: 8px;  
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);  
            width: 500px;  
            text-align: center;  
        }  

        h1 {  
            color: #333;  
        }  

        form {  
            display: flex;  
            flex-direction: column;  
            align-items: stretch;  
        }  

        label {  
            text-align: left;  
            margin-bottom: 5px;  
            color: #555;  
        }  

        select, input[type="date"] {  
            padding: 8px;  
            margin-bottom: 15px;  
            border-radius: 4px;  
            border: 1px solid #ccc;  
        }  

        button {  
            background-color: #5cb85c;  
            color: white;  
            padding: 10px 15px;  
            border: none;  
            border-radius: 4px;  
            cursor: pointer;  
            transition: background-color 0.3s ease;  
        }  

        button:hover {  
            background-color: #449d44;  
        }  

        a {  
            color: #007bff;  
            text-decoration: none;  
            margin-top: 10px;  
            display: inline-block;  
        }  

        a:hover {  
            text-decoration: underline;  
        }  

        .success-message {  
            background-color: #dff0d8;  
            color: #3c763d;  
            padding: 10px;  
            margin-bottom: 15px;  
            border: 1px solid #d6e9c6;  
            border-radius: 4px;  
        }  

        .error-message {  
            background-color: #f2dede;  
            color: #a94442;  
            padding: 10px;  
            margin-bottom: 15px;  
            border: 1px solid #ebccd1;  
            border-radius: 4px;  
        }  

        /* Animation pour le formulaire */  
        form {  
            animation: fadeIn 1s ease-out;  
        }  

        @keyframes fadeIn {  
            from {  
                opacity: 0;  
                transform: translateY(-20px);  
            }  
            to {  
                opacity: 1;  
                transform: translateY(0);  
            }  
        }  

        /* Animation pour les boutons */  
        button {  
            animation: pulse 2s infinite alternate;  
        }  

        @keyframes pulse {  
            from {  
                transform: scale(1);  
            }  
            to {  
                transform: scale(1.05);  
            }  
        }  
    </style>  
</head>  

<body>  
    <div class="container">  
        <h1>Réserver une Salle</h1>  
        <form method="POST" action="reservation_salle.php">  
            <label for="personne_id">Personne:</label>  
            <select name="personne_id" required>  
                <?php while ($row = mysqli_fetch_row($result_personne)) { ?>  
                    <option value="<?php echo $row['id']; ?>"><?php echo htmlspecialchars($row['nom'] . ' ' . $row['prenom']); ?></option>  
                <?php } ?>  
            </select><br>  

            <label for="salle_id">Salle:</label>  
            <select name="salle_id" required>  
                <?php while ($row = mysqli_fetch_assoc($result_salle)) { ?>  
                    <option value="<?php echo $row['id']; ?>"><?php echo htmlspecialchars($row['nom']); ?></option>  
                <?php } ?>  
            </select><br>  

            <label for="date_reservation">Date de réservation:</label>  
            <input type="date" name="date_reservation" required><br>  

            <button type="submit">Réserver</button>  
            <a href="index.php">Retour à l'index</a>  
        </form>  
    </div>  
</body>  
</html>  

<?php  
mysqli_close($conn);  
?>
