<?php  

 
include 'connexion.php';  

 
$sql = "SELECT * FROM Personne";  
$stmt = $conn->query($sql);  

  
while ($row = $stmt->fetch()) {  
    echo "Nom: " . $row['nom'] . "<br>";  
    echo "Prénom: " . $row['prenom'] . "<br>";  
    echo "Email: " . $row['email'] . "<br>";  
    echo "<br>";  
}  
?>  