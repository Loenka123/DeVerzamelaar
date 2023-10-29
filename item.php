<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>De Verzamelaar - Item</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div id="Stickynavbar">
        <div class="navbar-content">
            <a href="#"><p class="text">De Verzamelaar</p></a>
        </div>
        <div class="buttons">
            <a href="index.php" class="home">Home</a>
            <a href="contact.php" class="contact">Contact</a>
            <a href="admin/login.php"><button class="admin">Admin</button></a>
        </div>
    </div>
    <div id="item-details">
        <?php
        $host = "185.114.157.173";
        $dbname = "minecr13_verzamelaar";
        $username = "minecr13_verzamelaar";
        $password = "#Verzamelaar!";
        $mysqli = mysqli_connect($host, $username, $password, $dbname);
        if (!$mysqli) {
            header("Location: index.php");
            exit();
        }
        if (isset($_GET['id']) && is_numeric($_GET['id'])) {
            $item_id = $_GET['id'];
            $query = "SELECT * FROM verzameling WHERE id = $item_id";
            $result = $mysqli->query($query);
            if ($result) {
                $item = $result->fetch_assoc();
                if ($item) {
                    echo '<div class="product-container">';
                    echo '<img src="' . $item['foto'] . '" alt="' . $item['naam'] . '">';
                    echo '<h1>' . $item['naam'] . '</h1>';
                    echo '<p>' . $item['beschrijving'] . '</p>';
                    echo '<p class="price">Prijs: €' . $item['vraagprijs'] . '</p>';
                    echo '<a href="index.php?id=' . $item['id'] . '"><button class="koop-button">Koop</button></a>';
                    echo '</div>';
                } else {
                    header("Location: index.php");
                    exit();
                }
            } else {
                header("Location: index.php");
                exit();
            }
        } else {
            header("Location: index.php");
            exit();
        }
        ?>
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
