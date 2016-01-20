<?php
require_once("include/load.php");
$message="";
if (isset($_POST['username']) && isset($_POST['password'])){
	$result=$dbConn->fetchRow("SELECT username FROM users where username=:name and password=md5(:password)",
		array(
			'name'=>$_POST['username'],
			'password'=>$_POST['password']
		)
	);
	if ($result){
		$_SESSION['username']=$result['username'];
		header('Location: index.php');
	} else {
		$message="Ongeldige gebruikersnaam of wachtwoord";
	}
}
?>
<!doctype html>
<html>
<head>
<title>Login pagina</title>
</head>
<body>
<?php
if (isset($_SESSION['username'])){
?>
<h4>Je bent al ingelogd</h4>
<ul>
<li><a href="/">Terug</a></li>
<li><a href="logout.php">Uitloggen</a></li>
</ul>
<?php
} else {
?>
<h1>Inloggen</h1>
<?php 
if ($message){
?>
<p><b><?= $message;?></b></p>
<?php
}
?>
<form method="POST" action="login.php">
<p>
<label for username>Gebruikersnaam</label>
<input type="text" name="username"/>
</p>
<p>
<label for username>Wachtwoord</label>
<input type="password" name="password"/>
</p>
<button type="submit">Inloggen</button>
</form>
<?php
}
?>
</body>
</html>
