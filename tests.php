<html>

<head>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
</head>

<body>


  <script>
    $(function () {
      $.ajax({
        url: 'api.php?path=applications',
        method: 'get',
        dataType: 'json',
        success: function (data) {
          console.log(data);
          data.forEach(function (val) {
            var table_data = '<tr><td>' + val.id + '</td>' +
              '<td><a href="/applications/page.php?id=' + val.id + '">' + val.full_name + '</a></td>' +
              '<td><form method="post">'+
              '<input type="hidden" name="id" value="'+val.id+'">'+
              '<p><input type="submit" class="btn btn-primary" value="Удалить"></p>'+
              '</form></td></tr>'
            $('#result_table').append(table_data);
          });
        }
      });
    });
  </script>

  <script>
    $(document).ready(function() {
        $("#filter").click(function(){
            alert("filter");
        }); 
    });
  </script>

  <div class="container">
  <table class="table table-bordered" id='result_table'>
    <tr>
      <th>ID заявки</th>
      <th>ФИО заявки</th>
      <th>Действия</th>
    </tr>
  </table>

  <button id='filter'>Фильтр</button>
  </div>
</body>

</html>

