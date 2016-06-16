<main>
		<form action="page01.php">
			<label for="name">Votre nom:</label>
			<input type="text" name="name" id="name">
			<input type="submit" value="gogogadgetoroller">
		</form>
<br>
		<form action="" method="post"><!-- important POST -->
			<label for="log">Login:</label>
			<input type="text" name="login" id="log">
			<label for="pass">Password:</label>
			<input type="password" name="password" id="pass">
			<input type="submit" value="Connect">
		</form>
		<?php if(isset($_POST["login"])) : ?>
			<p>Votre login : <?php echo $_POST["login"]; ?></p>
			<p>Votre mdp: <?php echo $_POST["password"]; ?></p>
		<?php endif; ?>
		<h1>Hello, <?php echo (isset($_GET["name"])) ? $_GET["name"] : 'stranger';?></h1>
		<p>It's time to work with <?php echo "$cours";?></p>
</main>
