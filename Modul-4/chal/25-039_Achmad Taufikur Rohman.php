<?php
	$errors = [];
	$username ="";
	$email ="";

	if($_SERVER['REQUEST_METHOD']=="POST"){
		$username = htmlspecialchars($_POST['username']);
		$email = $_POST['email'];
		
		if (empty($username)){
			$errors["username"] = "Username Tidak Boleh Kosong";
		}elseif(strlen($username)<=8){
			$errors["username"] = "Username Tidak Boleh Kurang Dari 8";
		}elseif (empty($email)){
			$errors["email"] = "Email Tidak Boleh Kosong";
		}elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)){
			$errors["email"] = "Email Tidak Sesuai";
		}
	}

?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title></title>
</head>
<body>
	<form action="" method="POST">
		<label for = "username">Username</label>
		<input type="text" name="username" value="<?= $username ?>">
		
		<br>
		<?php if(isset($errors["username"])):?>
			<p style ="color:red;"><?= $errors["username"]?></p>
		<?php endif; ?>
		<label for = "email">Email</label>
		<input type="text" name="email">
		<br>
		<button type="submit">Kirim</button>
	</form>
</body>
</html>