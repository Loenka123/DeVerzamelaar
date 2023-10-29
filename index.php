<?php
if (isset($_GET['id']) && is_numeric($_GET['id'])) {
    $item_id = $_GET['id'];
    $host = "185.114.157.173";
    $dbname = "minecr13_verzamelaar";
    $username = "minecr13_verzamelaar";
    $password = "#Verzamelaar!";
    $mysqli = mysqli_connect($host, $username, $password, $dbname);
    if (!$mysqli) {
        echo "Fout bij verbinden database: " . mysqli_connect_error();
    }
    $query = "SELECT * FROM verzameling WHERE id = $item_id";
    $result = $mysqli->query($query);
    if ($result) {
        $item = $result->fetch_assoc();
        if ($item) {
            $gekocht = 'Je hebt succesvol "' . $item['naam'] . '" gekocht.';
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>De Verzamelaar - Home</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
  <div id="Stickynavbar">
    <div class="navbar-content">
        <a href="#"><p class="text">De Verzamelaar</p></a>
    </div>
    <div class="buttons">
        <a href="#" class="home">Home</a>
        <a href="contact.php" class="contact">Contact</a>
        <a href="admin/login.php"><button class="admin">Admin</button></a>
    </div>
  </div>
  <?php
    if (isset($gekocht)) {
        echo '<div class="centered-box">';
        echo '<div class="alert-box green">';
        echo '<span class="close-button" onclick="this.parentElement.style.display=\'none\'">&times;</span>';
        echo $gekocht;
        echo '</div>';
        echo '</div>';
    }
  ?>
  <div id="info">
    <h1>De Verzamelaar</h1>
    <p>Hier vind je allerlei verzamelingen rondom De Efteling!</p>
  </div>
  <div id="items">
        <div class="row2">
        <?php
        $host = "185.114.157.173";
        $dbname = "minecr13_verzamelaar";
        $username = "minecr13_verzamelaar";
        $password = "#Verzamelaar!";
        $mysqli = mysqli_connect($host, $username, $password, $dbname);
        if (!$mysqli) {
            echo "Fout bij verbinden database: " . mysqli_connect_error();
        }
        $statement = $mysqli->query("SELECT * FROM verzameling");
        $counter = 0;
        while ($row = mysqli_fetch_assoc($statement)) {
            if ($counter % 3 == 0 && $counter > 0) {
                ?>
                </div><div class="row2">
                <?php
            }
            ?>
            <div class="column2">
                <div class="item-container">
                    <a href="item.php?id=<?= $row['id'] ?>">
                        <div class="afbeelding-wrapper">
                            <img src="<?= $row['foto'] ?>" draggable="false">
                        </div>
                    </a>
                    <div class="item-naam"><?= $row['naam'] ?></div>
                    <div class="item-beschrijving"><?= $row['beschrijving'] ?></div>
                    <div class="item-prijs">€<?= $row['vraagprijs'] ?></div>
                </div>
            </div>
            <?php
            $counter++;
        }
        ?>
        </div>
    </div>
  <footer>
    <hr>
    <div class="linksDiv">
        <a href="#"><img src="afbeeldingen/facebook.png"></a>
        <a href="#"><img src="afbeeldingen/instagram.png"></a>
        <a href="#"><img src="afbeeldingen/twitter.png"></a>
    </div>
    <p>&copy; 2023 De Verzamelaar. All rights reserved.</p>
  </footer>
</body>
</html>
