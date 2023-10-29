<?php
session_start();
if (!isset($_SESSION['logged_in']) || $_SESSION['logged_in'] !== true) {
    header("Location: login.php");
    exit();
}

$host = "185.114.157.173";
$dbname = "minecr13_verzamelaar";
$username = "minecr13_verzamelaar";
$password = "#Verzamelaar!";
$mysqli = mysqli_connect($host, $username, $password, $dbname);
if (!$mysqli) {
    echo "Fout bij verbinden database: " . mysqli_connect_error();
}
if (isset($_GET['delete_id']) && is_numeric($_GET['delete_id'])) {
    $item_id = $_GET['delete_id'];
    $deleteQuery = "DELETE FROM verzameling WHERE id = $item_id";
    if ($mysqli->query($deleteQuery) === TRUE) {
        header("Location: index.php");
        exit();
    } else {
        echo "Fout bij verwijderen: " . $mysqli->error;
    }
}
if (isset($_POST['submit'])) {
    $item_name = $mysqli->real_escape_string($_POST['item_name']);
    $item_description = $mysqli->real_escape_string($_POST['item_description']);
    $item_price = $_POST['item_price'];
    $item_image = $mysqli->real_escape_string($_POST['item_image']);

    $insertQuery = "INSERT INTO verzameling (naam, beschrijving, vraagprijs, foto) 
                    VALUES ('$item_name', '$item_description', $item_price, '$item_image')";

    if ($mysqli->query($insertQuery) === TRUE) {
        header("Location: index.php");
        exit();
    } else {
        echo "Fout bij toevoegen: " . $mysqli->error;
    }
}
$query = "SELECT * FROM verzameling";
$result = $mysqli->query($query);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../style.css">
    <title>De Verzamelaar - Admin</title>
</head>
<body>
    <div id="Stickynavbar">
        <div class="navbar-content">
            <a href="#"><p class="text">De Verzamelaar</p></a>
        </div>
        <div class="buttons">
            <a href="../index.php" class="home">Home</a>
            <a href="../contact.php" class="contact">Contact</a>
            <a href="logout.php"><button class="admin">Log uit</button></a>
        </div>
    </div>
    <div class="centered-content">
        <div id="admin-tekst">
            <h1>Admin Panel</h1>
            <p>Hier kan je items verwijderen.</p>
        </div>
        <div class="admin-info">
        <ul>
            <?php
            while ($item = $result->fetch_assoc()) {
                echo "<li>{$item['naam']} - <a href='admin.php?delete_id={$item['id']}'>Verwijder</a></li>";
            }
            ?>
        </ul>
        </div>
        <div id="admin-tekst">
            <h1>Admin Panel</h1>
            <p>Hier kan je items toevoegen.</p>
        </div>
        <div class="admin-info">
        <form method="post">
            <input type="text" name="item_name" placeholder="Naam" required>
            <input type="text" name="item_description" placeholder="Beschrijving" required>
            <input type="number" name="item_price" placeholder="Prijs" required>
            <input type="text" name="item_image" placeholder="Afbeelding URL" required>
            <div style="text-align: center;">
                <input type="submit" name="submit" value="Toevoegen">
            </div>
        </form>
        </div>
    </div>
    <footer>
        <hr>
        <div class="linksDiv">
            <a href="#"><img src="../afbeeldingen/facebook.png"></a>
            <a href="#"><img src="../afbeeldingen/instagram.png"></a>
            <a href="#"><img src="../afbeeldingen/twitter.png"></a>
        </div>
        <p>&copy; 2023 De Verzamelaar. All rights reserved.</p>
    </footer>
</body>
</html>
