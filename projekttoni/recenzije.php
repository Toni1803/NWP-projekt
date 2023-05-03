<!DOCTYPE html>
<html>
<head>
    <title>Tablica recenzija</title>
</head>
<style>
h1{text-align: center;}

table#reviews-table {
    margin: 100 auto;
	border-collapse: collapse;
    border: 2px solid black;
}

table#reviews-table th {
    background-color: aqua;
    padding: 10px;
    text-align: left;
	border: 2px solid black;
}

table#reviews-table td {
    border: 2px solid black;
    padding: 10px;
}

table#reviews-table tbody tr:nth-child(even) {
    background-color: #f2f2f2;
}

table#reviews-table tbody tr:hover {
    background-color: #e6e6e6;
}
body{background-image:url(slike-galerija/4.jpg); background-size:100% 100%; background-repeat:no-repeat;}
.container {
  display: flex;
  flex-direction: column;
  align-items: center;
  justify-content: center;
}

label {
  margin-bottom: 10px;
}

select {
  padding: 8px 16px;
  border: none;
  border-radius: 4px;
  font-size: 16px;
  outline: none;
}
</style>
<body>
    <h1>Tablica recenzija</h1>
	<div class="container">
	<label for="grade-filter">Grade:</label>
<select id="grade-filter">
  <option value="1">1 star</option>
  <option value="2">2 stars</option>
  <option value="3">3 stars</option>
  <option value="4">4 stars</option>
  <option value="5">5 stars</option>
</select>
</div>
    <table id="reviews-table">
        <thead>
            <tr>
                <th>Korisničko ime</th>
                <th>Ocjena</th>
                <th>Komentar</th>
            </tr>
        </thead>
        <tbody>
        </tbody>
    </table>

    <script>

        var xhr = new XMLHttpRequest();
        xhr.open("GET", "recenzije1.xml");
        xhr.onload = function() {
            if (xhr.status === 200) {

                var xmlDoc = xhr.responseXML;
                var reviews = xmlDoc.getElementsByTagName("review");


                for (var i = 0; i < reviews.length; i++) {
                    var username = reviews[i].getElementsByTagName("username")[0].childNodes[0].nodeValue;
                    var rating = reviews[i].getElementsByTagName("rating")[0].childNodes[0].nodeValue;
                    var comment = reviews[i].getElementsByTagName("comment")[0].childNodes[0].nodeValue;

                    var row = document.createElement("tr");
                    var usernameCell = document.createElement("td");
                    var ratingCell = document.createElement("td");
                    var commentCell = document.createElement("td");
                    usernameCell.innerHTML = username;
                    ratingCell.innerHTML = rating;
                    commentCell.innerHTML = comment;
                    row.appendChild(usernameCell);
                    row.appendChild(ratingCell);
                    row.appendChild(commentCell);
                    document.getElementById("reviews-table").getElementsByTagName("tbody")[0].appendChild(row);
                }

                var gradeFilter = document.getElementById("grade-filter");
                gradeFilter.addEventListener("change", function() {
                var selectedGrade = parseInt(gradeFilter.value);
  

                var rows = document.getElementById("reviews-table").getElementsByTagName("tbody")[0].getElementsByTagName("tr");
                for (var i = 0; i < rows.length; i++) {
                var ratingCell = rows[i].getElementsByTagName("td")[1];
                var rating = parseInt(ratingCell.innerHTML);
    
                if (rating === selectedGrade) {
                rows[i].style.display = "";
                } else {
                rows[i].style.display = "none";
                       }
                    }
                });
            }
        };
        xhr.send();
    </script>
</body>
</html>