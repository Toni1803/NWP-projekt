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
</style>
<body>
    <h1>Tablica recenzija</h1>
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
        // Load the XML file
        var xhr = new XMLHttpRequest();
        xhr.open("GET", "recenzije1.xml");
        xhr.onload = function() {
            if (xhr.status === 200) {
                // Parse the XML file
                var xmlDoc = xhr.responseXML;
                var reviews = xmlDoc.getElementsByTagName("review");

                // Loop through the reviews and add them to the table
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
            }
        };
        xhr.send();
    </script>
</body>
</html>