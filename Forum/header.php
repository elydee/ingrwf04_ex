<!DOCTYPE html>
<html lang="fr">
<head>
	<meta charset="UTF-8">
	<title>Forum</title>
	<link rel="stylesheet" href="css/style.css">
</head>
<body>
<?php if(isset($_SESSION['Users'])) : ;?>
	<p>Bienvenue <?php echo $_SESSION['Users']['email']; ?> ! - <a href="connection.php?logout">Logout</a></p>
<?php else: ;?>
<form method="POST" id="formlog" action="connection.php">
	<fieldset>
	<legend>Login</legend>
		<label for="email">E-mail :</label>
		<input type="email" name="email" id="login" required><br>
		<label for="password">Password :</label>
		<input type="password" name="password" id="password" required><br>
		<input type="hidden" name="newQuestion" value="yes">
		<input type="submit" value="Login">
	</fieldset>
</form>
<?php endif; ?>