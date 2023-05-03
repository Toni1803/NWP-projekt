function dodajRedak() {
  var ime = $('#ime').val()
  var prezime = $('#prezime').val()
  var datumRodjenja = $('#datumRođenja').val()
  var dijagnoza = $('#dijagnoza').val()
  var odjel = $('#odjel').val()

  var noviRedak = '<tr><td>' + ime + '</td><td>' + prezime + '</td><td>' + datumRodjenja + '</td><td>' + dijagnoza + '</td><td>' + odjel + '</td></tr>'

  $('#mojaTablica').append(noviRedak)

  $('#ime').val('')
  $('#prezime').val('')
  $('#datumRođenja').val('')
  $('#dijagnoza').val('')
  $('#odjel').val('')
}


