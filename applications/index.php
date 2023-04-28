<?php

ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

include dirname(__DIR__, 1) . '\config.php';

?>
<html>

<head>
  <title>Список заявок</title>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css"
    integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
</head>

<body>

  <script>
    $(function () {

      $.ajax({
        url: '/api.php?path=applications',
        method: 'get',
        dataType: 'json',
        success: function (data) {
          data.forEach(function (val) {
            var table_data = '<tr><td>' + val.id + '</td>' +
              '<td><a href="/applications/page.php?id=' + val.id + '">' + val.full_name + '</a></td>' +
              '<td>' +
              '<button type="button" data-id="'+val.id+'" class="btn">Удалить</button>' +
              '</td></tr>'
            $('#result_table').append(table_data);
          });
        }
      });


    $('.btn').on('click', function (event) {
      console.log('Тестовый текст');
      event.preventDefault();
      var id = $(this).data('id');
      console.log(id);

      $.ajax({
        url: '/api.php?path=applications&id=' + id,
        method: 'delete',
        dataType: 'json',
        success: function (data) {
          console.log(data)
        }
      });
    });
  });
  </script>

  <h1>Список заявок</h1>

  <div>
    <form name="filter">
      <p><b>ID: </b><input type="text" name='id' size="20"></p>
      <p><b>ФИО: </b><input type="text" name='full_name' size="20"></p>
      <button class="btn btn-accept">Фильтровать</button>
    </form>
  </div>
  <div class="container">
    <table class="table table-bordered table-striped float-right" id='result_table'>
      <tr>
        <th>ID заявки</th>
        <th>ФИО заявки</th>
        <th>Действия</th>
      </tr>
    </table>
  </div>
  <p><a href='/applications/add.php'>+ Добавить заявку</a></p>
  <p><a href='/'>← Назад</a></p>
</body>

</html>