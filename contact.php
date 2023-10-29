<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>De Verzamelaar - Contact</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
<div id="Stickynavbar">
    <div class="navbar-content">
        <a href="#"><p class="text">De Verzamelaar</p></a>
    </div>
    <div class="buttons">
        <a href="index.php" class="home">Home</a>
        <a href="#" class="contact">Contact</a>
        <a href="admin/login.php"><button class="admin">Admin</button></a>
    </div>
  </div>

  <div class="contactText">
  <h1>Contact</h1>
  <p>Contacteer ons via deze pagina.</p>
</div>

<div class="container">
  <form action="bedankt.php">
    <label for="fname">Naam</label>
    <input type="text" id="fname" name="firstname" placeholder="Uw naam" required>

    <label for="lname">Email</label>
    <input type="text" id="lname" name="lastname" placeholder="Uw email" required>

    <label for="odnerwerp">Onderwerp</label>
    <select id="onderwerp" name="onderwerp" required>
      <option value="ow1" disabled selected>Kies een onderwerp..</option>
      <option value="ow2">Vraag</option>
      <option value="ow3">Bestelling</option>
      <option value="ow4">Overig</option>
    </select>

    <label for="subject">Bericht</label>
    <textarea id="subject" name="subject" placeholder="Schrijf hier uw bericht.." style="height:200px" required></textarea>

    <div style="text-align: center;">
      <input type="submit" value="Verstuur">
    </div>
  </form>
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