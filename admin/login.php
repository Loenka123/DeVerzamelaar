<?php
session_start();
if (isset($_SESSION['logged_in']) && $_SESSION['logged_in'] === true) {
    header("Location: index.php");
    exit();
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $adminEmail = "admin@gmail.com";
    $adminPassword = "admin";
    $submittedEmail = $_POST["email"];
    $submittedPassword = $_POST["password"];
    if ($submittedEmail === $adminEmail && $submittedPassword === $adminPassword) {
        $_SESSION['logged_in'] = true;
        header("Location: index.php");
        exit();
    } else {
        echo "<p style='color: red;'>Fout email of wachtwoord, probeer het opnieuw.</p>";
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>De Verzamelaar - Login</title>
    <link rel="stylesheet" href="../style.css">
</head>
<body>
<div id="Stickynavbar">
    <div class="navbar-content">
        <a href="#"><p class="text">De Verzamelaar</p></a>
    </div>
    <div class="buttons">
        <a href="../index.php" class="home">Home</a>
        <a href="../contact.php" class="contact">Contact</a>
        <a href="#"><button class="admin">Admin</button></a>
    </div>
</div>

<div class="adminText">
  <h1>Admin</h1>
  <p>Admin login van De Verzamelaar.</p>
  <br/>
  <p><b>Email:</b> admin@gmail.com <br><b>Wachtwoord:</b> admin</p>
</div>

<div class="container">
    <form method="POST" action="login.php">
        <label>Email:</label>
        <input type="email" name="email" placeholder="Jouw email">
        <label>Password:</label>
        <input type="password" name="password" placeholder="Jouw wachtwoord">
        <div style="text-align: center;">
            <input type="submit" value="Login">
        </div>
    </form>
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
