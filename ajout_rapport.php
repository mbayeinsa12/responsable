<?php
include 'db.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $personne_id = $_POST['personne_id'];
    $type_rapport = $_POST['type_rapport'];
    $description = $_POST['description'];
    $date_rapport = $_POST['date_rapport'];

    // SQL query to insert the new report
    $sql = "INSERT INTO Rapport (personne_id, type_rapport, description, date_rapport) 
            VALUES ('$personne_id', '$type_rapport', '$description', '$date_rapport')";

    if (mysqli_query($conn, $sql)) {
        echo "Rapport ajouté avec succès";
    } else {
        echo "Erreur : " . $sql . "<br>" . mysqli_error($conn);
    }
}

// Fetch the list of persons for the select dropdown
$sql_personne = "SELECT * FROM Personne";
$result_personne = mysqli_query($conn, $sql_personne);

mysqli_close($conn);
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ajouter un Rapport</title>
    <style>
        /* Basic Reset */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            text-align: center;
            padding-top: 50px;
        }

        .container {
            background-color: white;
            padding: 30px;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            width: 100%;
            max-width: 500px;
            margin: 0 auto;
        }

        .logo {
            margin-bottom: 30px;
        }

        .logo img {
            width: 150px;
            height: auto;
        }

        .form-group {
            margin-bottom: 20px;
        }

        .form-group label {
            display: block;
            font-size: 14px;
            margin-bottom: 8px;
        }

        .form-control {
            width: 100%;
            padding: 12px;
            border: 1px solid #ddd;
            border-radius: 4px;
            font-size: 14px;
        }

        .btn-primary {
            background-color: #007bff;
            color: white;
            border: none;
            padding: 12px 20px;
            font-size: 16px;
            cursor: pointer;
            border-radius: 4px;
        }

        .btn-primary:hover {
            background-color: #0056b3;
        }

        .btn-link {
            text-decoration: none;
            color: #007bff;
            font-size: 16px;
        }

        .btn-link:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>
    <div class="container">
        <!-- Logo -->
        <div class="logo">
            <img src="image.png" alt="Logo"> <!-- Replace 'your_logo.png' with the actual path to your logo -->
        </div>

        <h1>Ajouter un Rapport</h1>
        
        <form method="POST" action="ajout_rapport.php" class="mt-3">
            <div class="form-group">
                <label for="personne_id">Personne: </label>
                <select name="personne_id" class="form-control" required>
                    <?php while ($row = mysqli_fetch_assoc($result_personne)) { ?>
                        <option value="<?php echo $row['id']; ?>"><?php echo $row['nom'] . ' ' . $row['prenom']; ?></option>
                    <?php } ?>
                </select>
            </div>

            <div class="form-group">
                <label for="type_rapport">Type de rapport: </label>
                <input type="text" name="type_rapport" class="form-control" required>
            </div>

            <div class="form-group">
                <label for="description">Description: </label>
                <textarea name="description" class="form-control" required></textarea>
            </div>

            <div class="form-group">
                <label for="date_rapport">Date du rapport: </label>
                <input type="date" name="date_rapport" class="form-control" required>
            </div>

            <button t
