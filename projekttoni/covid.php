<style>
h1 {
  text-align: center;
}
body{background-image:url(slike-galerija/medical-background-with-loop_n26ve-_yg__F0005.png); background-size:100% 100%; background-repeat:no-repeat;}
tr {
  background-color: white;
}
</style>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
<body>
  <h1>Postavljanje API podataka u HTML tablicu</h1>
  <div class="container">
  <input type="text" id="search-bar" placeholder="Search...">
    <label for="date-filter">Filter by date:</label>
    <input type="date" id="date-filter">
    <table class="table table-bordered table-striped">
      <thead class="table-success">
        <tr>
          <th scope="col">Province</th>
          <th scope="col">Date</th>
          <th scope="col">Total cases</th>
          <th scope="col">Total fatalities</th>
          <th scope="col">Total tests</th>
          <th scope="col">Total vaccinations</th>
        </tr>
      </thead>
      <tbody id="table_body">
        
      </tbody>
    </table>
  </div>
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <script src="script.js"></script>
  <script>
    // Search bar functionality
    $('#search-bar').on('keyup', function () {
      var value = $(this).val().toLowerCase();
      $('#table_body tr').filter(function () {
        $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
      });
    });

    // Date filter functionality
    $('#date-filter').on('change', function() {
      var date = $(this).val();
      $('#table_body tr').filter(function() {
        return $('td:eq(1)', this).text() !== date;
      }).hide();
      $('#table_body tr').filter(function() {
        return $('td:eq(1)', this).text() === date;
      }).show();
    });
  </script>
</body>