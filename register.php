<?php
require_once("include/load.php");
$message="";
print_r($_POST);
if (isset($_POST['username']) && isset($_POST['password'])){
	$result=$dbConn->fetchRow("SELECT username FROM users where username=:name",
		array(
			'name'=>$_POST['username'],
		)
	);
	if ($result){
		$message="Gebruikersnaam is al in gebruik";
	} else {
		if ($_POST['password']==$_POST['password_controle'] and trim($_POST['password']!='')) {
			$dbConn->insert('users',['id'=>false,'username'=>$_POST['username'],'password'=>md5($_POST['password'])]);
			header('Location: login.php');
		} else {
			$message="Wachtwoorden niet gelijk";
		}
	}
}
?>
<!doctype html>
<html>
<head>
<title>Registratie pagina</title>
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
<h1>Registreren</h1>
<?php 
if ($message){
?>
<p><b><?= $message;?></b></p>
<?php
}
?>
<form method="POST" action="register.php">
<p>
<label for username>Gebruikersnaam</label>
<input type="text" name="username"/>
</p>
<p>
<label for username>Wachtwoord</label>
<input type="password" name="password"/>
</p>
<p>
<label for username>Wachtwoord (Controle)</label>
<input type="password" name="password_controle"/>
</p>
<button type="submit">Registreren</button>
</form>
<?php
}
?>
</body>
</html>
