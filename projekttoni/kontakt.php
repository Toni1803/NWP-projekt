<?php
        print'
		<style>
		*{margin: 0;padding: 0;box-sizing: border-box;}
        body{width: 100%;height: 100vh;display: grid;align-items: center;background: #00BFFF;}
        .contact-in{width: 80%;height: auto;margin: auto;display: flex;flex-wrap: wrap;padding: 10px;border-radius: 10px;background: #fff;box-shadow: 0px 0px 10px 0px #666;}
        .contact-map{width: 100%;height: auto;flex: 50%;}
        .contact-map iframe{width: 100%;height: 100%;}
        .contact-form{width: 100%;height: auto;flex: 50%;padding: 30px;text-align: center; background-image:url(slike-galerija/1.jpg); background-size:100% 100%; background-repeat:no-repeat;}
        .contact-form h1{margin-bottom: 10px;}
        .contact-form-txt{width: 100%;height: 40px;color: #000;border: 1px solid #bcbcbc;border-radius: 50px;outline: none;margin-bottom: 20px;padding: 15px;}
        .contact-form-txt::placeholder{color: #aaa;}
		.contact-form-textarea{width: 100%;height: 130px;color: #000;border: 1px solid #bcbcbc;border-radius: 10px;outline: none;margin-bottom: 20px;padding: 15px;}
        .contact-form-textarea::placeholder{color: #aaa;}
        .contact-form-btn{display:block; margin:0 auto;}
		h1 {text-align:center;}
		</style>
		<h1>Forma za kontakt</h1>
		<div class="contact-in">
		<div class="contact-map">
			<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2780.766797286913!2d16.000859515085015!3d45.81592861792642!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x4765d7b186afcbed%3A0xeefc736386492694!2sCLINIC%20DRINKOVI%C4%86!5e0!3m2!1sen!2shr!4v1635942947100!5m2!1sen!2shr" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
			</div>
			<div class="contact-form">
			<h1>Kontaktiraj nas</h1>
			<form action="posalji-kontakt.php" id="contact_form" name="contact_form" method="POST">
				<label for="fname">Ime *</label>
				<input type="text" id="fname" name="firstname" placeholder="Vaše ime.." required>

				<label for="lname">Prezime *</label>
				<input type="text" id="lname" name="lastname" placeholder="Vaše prezime.." required>
				
				<label for="lname">E-mail *</label>
				<input type="email" id="email" name="email" placeholder="Vaš e-mail.." required>

				<label for="country">Zemlja</label>
				<select id="country" name="country">
				  <option value="">Please select</option>
				  <option value="BE">Belgium</option>
				  <option value="HR" selected>Croatia</option>
				  <option value="LU">Luxembourg</option>
				  <option value="HU">Hungary</option>
				</select>

				<label for="subject">Predmet</label>
				<textarea id="subject" name="subject" placeholder="Napiši nešto.." style="height:200px"></textarea>

				<input type="submit" value="Submit" class="contact-form-btn">
			</form>
			</div>
		</div>';
?>