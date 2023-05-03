<?php 
	print '
	<link rel="stylesheet" href="stil.css">
	<h1 style="text-align:center;">Forma za prijavu</h1>
	<div id="signin">';
	
	if ($_POST['_action_'] == FALSE) {
		print '
		<style>
		body {font-family: Arial, Helvetica, sans-serif; background-image:url(slike-galerija/2.jpg); background-size:100% 100%; background-repeat:no-repeat;}
        form {border: 3px solid #f1f1f1;}
        input[type=text], input[type=password] {width: 100%;padding: 12px 20px;margin: 8px 0;display: inline-block;border: 1px solid #ccc;box-sizing: border-box;}
		button {background-color: #04AA6D;color: white;padding: 14px 20px;margin: 8px 0;border: none;cursor: pointer;width: 100%;}
        button:hover {opacity: 0.8;}
        .imgcontainer {text-align: center;margin: 24px 0 12px 0;}
        img.avatar {width: 40%;border-radius: 50%;}
        .container {margin:auto; width:600px; max-width:90%; background:white;}
        span.lozinka {float: right;padding-top: 16px;}
		</style>
		<div class="container">
		<form action="" name="myForm" id="myForm" method="POST">
			<input type="hidden" id="_action_" name="_action_" value="TRUE">
			<div class="imgcontainer">
            <img src="slike-galerija/img_avatar2.png" alt="Avatar" class="avatar">
			<div class="container">
			<label for="korime">Korisničko ime:*</label>
			<input type="text" class="form-control" name="korime" value="" pattern=".{5,10}" required>

			<label for="lozinka">Lozinka:*</label>
			<input type="password" class="form-control" name="lozinka" value="" pattern=".{4,}" required>
					
			<button type="submit" class="btn" value="Submit">Login</button>
		</div>
		</form>';
	}
	else if ($_POST['_action_'] == TRUE) {
		
		$query  = "SELECT * FROM korisnici";
		$query .= " WHERE korime='" .  $_POST['korime'] . "'";
		$result = @mysqli_query($MySQL, $query);
		$row = @mysqli_fetch_array($result, MYSQLI_ASSOC);
		
		if (password_verify($_POST['lozinka'], $row['lozinka'])) {
			#password_verify https://secure.php.net/manual/en/function.password-verify.php
			$_SESSION['user']['valid'] = 'true';
			$_SESSION['user']['id'] = $row['id'];
			$_SESSION['user']['ime'] = $row['ime'];
			$_SESSION['user']['prezime'] = $row['prezime'];
			$_SESSION['message'] = '<p>Dobrodošli, ' . $_SESSION['user']['ime'] . ' ' . $_SESSION['user']['prezime'] . '</p>';
			# Redirect to admin website
			header("Location: index.php?menu=9");
		}
		
		# Bad username or password
		else {
			unset($_SESSION['user']);
			$_SESSION['message'] = '<p>Unijeli ste krivo korisničko ime ili lozinku!</p>';
			header("Location: index.php?menu=8");
		}
	}
	print '
	</div>';
?>