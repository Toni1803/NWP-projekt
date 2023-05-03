<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
<style>
.container {
    text-align: center;
	background-image: url(slike-galerija/6.jpg);
	background-size:100% 100%; background-repeat:no-repeat;
  }
input[type="text"] {
  width: 30%;
  border: 2px solid #aaa;
  border-radius: 4px;
  margin: 8px 0;
  outline: none;
  padding: 8px;
  box-sizing: border-box;
  transition: 0.3s;
}

input[type="text"]:focus {
  border-color: dodgerBlue;
  box-shadow: 0 0 8px 0 dodgerBlue;
}

.inputWithIcon input[type="text"] {
  padding-left: 40px;
}

.inputWithIcon {
  position: relative;
}

.inputWithIcon i {
  position: absolute;
  left: 35%;
  top: 9px;
  padding: 9px 8px;
  color: #aaa;
  transition: 0.3s;
}

.inputWithIcon input[type="text"]:focus + i {
  color: dodgerBlue;
}

.inputWithIcon.inputIconBg i {
  background-color: #aaa;
  color: #fff;
  padding: 9px 4px;
  border-radius: 4px 0 0 4px;
}

.inputWithIcon.inputIconBg input[type="text"]:focus + i {
  color: #fff;
  background-color: dodgerBlue;
}
button {
  background-color: dodgerBlue;
  color: white;
  border: none;
  border-radius: 4px;
  padding: 10px 20px;
  margin-top: 10px;
  cursor: pointer;
  transition: 0.3s;
}

button:hover {
  background-color: #2196F3;
}

table {
  width: 100%;
  border-collapse: collapse;
  margin-top: 20px;
}

th {
  background-color: aqua;
  color: white;
  text-align: left;
  padding: 8px;
}

td {
  border: 1px solid #ddd;
  padding: 8px;
  background-color: white;
}

tr:nth-child(even) {
  background-color: #f2f2f2;
}

#mojaTablica {
  text-align: left;
}
</style>
<div class="container">
<div class="inputWithIcon inputIconBg">
<input type ="text" id="ime" placeholder="Unesite ime">
<i class="bi bi-person-fill"></i>
</div>
<div class="inputWithIcon inputIconBg">
<input type ="text" id="prezime" placeholder="Unesite prezime">
<i class="bi bi-person-fill"></i>
</div>
<div class="inputWithIcon inputIconBg">
<input type ="text" id="datumRođenja" placeholder="Unesite datum rođenja">
<i class="bi bi-calendar-check"></i>
</div>
<div class="inputWithIcon inputIconBg">
<input type ="text" id="dijagnoza" placeholder="Unesite dijagnozu">
<i class="bi bi-heart-pulse"></i>
</div>
<div class="inputWithIcon inputIconBg">
<input type ="text" id="odjel" placeholder="Unesite odjel">
<i class="bi bi-hospital"></i>
</div>
<br>
<button>Dodaj novi zapis</button>
<button id="pretrazi">Pretraži</button>
<table>
    <tr>
	<th>Ime</th>
	<th>Prezime</th>
	<th>DatumRođenja</th>
	<th>Dijagnoza</th>
	<th>UpuceniOdjel</th>
	</tr>
	<tbody id="mojaTablica">
	
	</tbody>
</table>
</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src ="dodajRedak.js"></script>
<script>
        var mojNiz = [
	    {'ime':'Antonio', 'prezime':'Starinec', 'datumRođenja':'3/18/1996', 'dijagnoza':'astma', 'upuceniOdjel':'alergologija'},
	    {'ime':'Pero', 'prezime':'Peric', 'datumRođenja':'5/23/1986', 'dijagnoza':'aritmija', 'upuceniOdjel':'kardiologija'},
	    {'ime':'Ivo', 'prezime':'Ivic', 'datumRođenja':'12/20/1978', 'dijagnoza':'dispepsija', 'upuceniOdjel':'gastroenterologija'},
	    {'ime':'Filip', 'prezime':'Filipovic', 'datumRođenja':'9/4/1991', 'dijagnoza':'upala bubrega', 'upuceniOdjel':'nefrologija'},
	    {'ime':'Luka', 'prezime':'Lukic', 'datumRođenja':'7/16/1981', 'dijagnoza':'anemija', 'upuceniOdjel':'hematologija'},
	    {'ime':'Vinko', 'prezime':'Vinic', 'datumRođenja':'9/11/1973', 'dijagnoza':'bronhitis', 'upuceniOdjel':'pulmologija'},
	]
	$('button:first').on('click', dodajRedak)
	
	$('#pretrazi').on('click', function(){
    var vrijednost = $('#prezime').val().toLowerCase()
    var podaci = pretraziTablicu(vrijednost, mojNiz)
    kreirajTablicu(podaci)
})
	
	kreirajTablicu(mojNiz)
	
	function pretraziTablicu(vrijednost, podaci){
		var filtriraniPodaci = []
		
		for(var i=0; i<podaci.length; i++){
			vrijednost = vrijednost.toLowerCase()
			var prezime = podaci[i].prezime.toLowerCase()
			
			if(prezime.includes(vrijednost)){
				filtriraniPodaci.push(podaci[i])
			}
		}
		return filtriraniPodaci
	}
	
	
	
	function kreirajTablicu(podaci){
		var table = document.getElementById('mojaTablica')
		
		table.innerHTML=''
		
		for (var i = 0; i < podaci.length; i++){
			var row = `<tr>
							<td>${podaci[i].ime}</td>
							<td>${podaci[i].prezime}</td>
							<td>${podaci[i].datumRođenja}</td>
							<td>${podaci[i].dijagnoza}</td>
							<td>${podaci[i].upuceniOdjel}</td>
					  </tr>`
			table.innerHTML += row


		}
	}

</script>
</html>