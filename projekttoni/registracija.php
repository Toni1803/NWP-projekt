<?php 
	print '
	<h1 style="text-align:center;">Forma za registraciju</h1>
	<div id="register">';
	
	if ($_POST['_action_'] == FALSE) {
		print '
		<style>
		body{background-image:url(slike-galerija/3.jpg); background-size:100% 100%; background-repeat:no-repeat;}
        .form-wrap{margin:auto; width:500px; max-width:90%;}
		.form-wrap form{width:100%; height:80%; padding:20px; background-image:url(slike-galerija/5.jpg); background-size:100% 100%; background-repeat:no-repeat; border-radius:4px; box-shadow: 0 8px 16px rgba(0,0,0,.3);}
        input{width: 100%; background: none; border: 1px solid #00FFFF; border-radius: 3px; padding: 6px 15px; box-sizing: border-box; margin-bottom: 20px; font-size: 16px; color: #000000;}    
        input[type="button"]{ background: #bac675; border: 0; cursor: pointer; color: #3e3d3d;}
        input[type="button"]:hover{ background: #a4b15c; transition: .6s;}
        ::placeholder{color: #000000;}
		#registration_form input[type = "text"],#registration_form input[type = "password"],#registration_form input[type = "email"], #registration_form input[type = "date"], #registration_form input[type = "password"] {border:0;background: white;text-align: center;border: 2px solid #3498db;outline: none;color: black;border-radius: 24px;transition: 0.25s;}
		#registration_form input[type = "text"]:focus,#registration_form input[type = "password"]:focus, #registration_form input[type = "email"]:focus{width: 280px;border-color: #2ecc71;}
		select {position: relative;display: inline-block;font-size: 16px;color: #333;border: 2px solid #3fa9f5;border-radius: 5px;padding: 10px;background-color: #fff;cursor: pointer;transition: all 0.2s ease-in-out;}
        select:hover {background-color: #e6f5ff;}
        select:focus {border-color: #0a7cd1;outline: none;box-shadow: 0 0 5px rgba(0, 0, 0, 0.2);}
        select option {background-color: #e6f5ff;color: #333;}
		select option:hover {background-color: #3fa9f5; color:#fff;}
		.form-wrap form {text-align: center;}
        .form-wrap form label, .form-wrap form input {text-align: center;}
		input[type="submit"] {display: block;margin: 0 auto;}
		</style>
		<div class="form-wrap">
		<form action="" id="registration_form" name="registration_form" method="POST">
			<input type="hidden" id="_action_" name="_action_" value="TRUE">
			
			<label for="ime">Ime *</label>
			<input type="text" id="ime" name="ime" placeholder="Vaše ime.." required>
			<label for="prezime">Prezime *</label>
			<input type="text" id="prezime" name="prezime" placeholder="Vaše prezime.." required>
				
			<label for="email">Vaš E-mail *</label>
			<input type="email" id="email" name="email" placeholder="Vaš email.." required>
			
			<label for="korime">Korisničko ime:* <small>(Korisničko ime mora imati između 5 i 10 znakova)</small></label>
			<input type="text" id="korime" name="korime" pattern=".{5,10}" placeholder="Korime.." required><br>
			
			<label for="grad">Grad *</label>
			<input type="text" id="grad" name="grad" placeholder="Vaš grad.." required>
			
			<label for="ulica">Ulica *</label>
			<input type="text" id="ulica" name="ulica" placeholder="Vaša ulica.." required>
			
			<label for="datum">Datum_rođenja *</label>
			<input type="date" id="datum_rođenja" name="datum_rođenja" placeholder="Datum rođenja.." required>
									
			<label for="lozinka">Lozinka:* <small>(Lozinka mora imati najmanje 4 znaka)</small></label>
			<input type="password" id="lozinka" name="lozinka" placeholder="Lozinka.." pattern=".{4,}" required>
			<label for="drzava">Drzava:</label>
			<select name="drzava" id="drzava">
				<option value="">molimo odaberite</option>';
				#Select all countries from database projekttoni, table drzave
				$query  = "SELECT * FROM drzave";
				$result = @mysqli_query($MySQL, $query);
				while($row = @mysqli_fetch_array($result)) {
					print '<option value="' . $row['kod_drzave'] . '">' . $row['ime_drzave'] . '</option>';
				}
			print '
			</select>
			<input type="submit" value="Submit">
		</form>
		</div>';
	}
	else if ($_POST['_action_'] == TRUE) {
		
		    $query  = "SELECT * FROM korisnici";
		    $query .= " WHERE email='" .  $_POST['email'] . "'";
		    $query .= " OR korime='" .  $_POST['korime'] . "'";
		    $result = @mysqli_query($MySQL, $query);
		    $row = @mysqli_fetch_array($result, MYSQLI_ASSOC);
		
		if ($row['email'] == '' || $row['korime'] == '') {
			# password_hash https://secure.php.net/manual/en/function.password-hash.php
			# password_hash() creates a new password hash using a strong one-way hashing algorithm
			$pass_hash = password_hash($_POST['lozinka'], PASSWORD_DEFAULT, ['cost' => 12]);
			
			$query  = "INSERT INTO korisnici (ime, prezime, email, korime, lozinka, drzava)";
			$query .= " VALUES ('" . $_POST['ime'] . "', '" . $_POST['prezime'] . "', '" . $_POST['email'] . "', '" . $_POST['korime'] . "', '" . $pass_hash . "', '" . $_POST['drzava'] . "')";
			$result = @mysqli_query($MySQL, $query);
			
			echo '<p>' . ucfirst(strtolower($_POST['ime'])) . ' ' .  ucfirst(strtolower($_POST['prezime'])) . ', hvala na registraciji </p>
			<hr>';
		}
		else {
			echo '<p>User with this email or username already exist!</p>';
		}
	}
	print '
	</div>';
?>