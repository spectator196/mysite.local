<?php

ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

include dirname(__DIR__, 1) . '\get_db_info.php';
include dirname(__DIR__, 1) . '\config.php';

if (!empty($_POST)) {
  delete_db_manager_data($_POST);
}

$data_list = get_db_full_table_managers($_GET);

?>
<html>

<head>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css"
    integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
  <title>Список менеджеров</title>
</head>

<body>

  <script>
    $(function () {
      $.ajax({
        url: '/api.php?path=managers',
        method: 'get',
        dataType: 'json',
        success: function (data) {
          console.log(data);
          data.forEach(function (val) {
            var table_data = '<tr><td>' + val.manager_id + '</td>' +
              '<td><a href="/managers/page.php?manager_id=' + val.manager_id + '">' + val.full_name + '</a></td>' +
              '<td><form method="post">' +
              '<input type="hidden" name="manager_id" value="' + val.manager_id + '">' +
              '<p><input type="submit" class="btn btn-warning" value="Удалить"></p>' +
              '</form></td></tr>'
            $('#result_table').append(table_data);
          });
        }
      });
    });
  </script>

  <h1>Список менеджеров</h1>

  <div>
    <form name="filter">
      <p><b>ID: </b><input type="text" name='manager_id' size="20"></p>
      <p><b>ФИО: </b><input type="text" name='full_name' size="20"></p>
      <button>Фильтровать</button>
    </form>
  </div>

  <table class="table table-bordered table-striped float-right" id='result_table'>
    <tr>
      <th>ID менеджера</th>
      <th>ФИО менеджера</th>
      <th>Действия</th>
    </tr>
  </table>

  <p><a href='/managers/add.php'>+ Добавить менеджера</a></p>
  <p><a href='/'>← Назад</a></p>
</body>

</html>