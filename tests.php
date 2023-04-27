<html>

<head>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
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
              '<p><input type="submit" value="Удалить"></p>'+
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

  <table border="1" id='result_table'>
    <tr>
      <th>ID заявки</th>
      <th>ФИО заявки</th>
      <th>Действия</th>
    </tr>
  </table>

  <button id='filter'>Фильтр</button>

</body>

</html>

