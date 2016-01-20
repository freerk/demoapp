<?php
require_once("include/load.php");
?>
<!doctype html>
<html>
<head>
<title>Demo pagina</title>
</head>
<body>
<h1>Demo applicatie</h1>
<?php
if (isset($_SESSION['username'])){
?>
<h3>Welkom <?= $_SESSION['username'] ?></h3>
<ul>
<li><a href="logout.php">Uitloggen</a></li>
</ul>
<?php
} else {
?>
<h3>Niet ingelogd</h3>
<ul>
<li><a href="login.php">Inloggen</a></li>
<li><a href="register.php">Registreren</a></li>
</ul>
<?php
}
?>
</body>
</html>
