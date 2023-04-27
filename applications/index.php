<?php

ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

include dirname(__DIR__, 1) . '\get_db_info.php';
include dirname(__DIR__, 1) . '\config.php';

if (!empty($_POST)) {
  delete_db_application_data($_POST);
}

$data_list = get_db_full_table_applications($_GET);

?>
<html>

<head>
  <title>Список заявок</title>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
</head>

<body>

  <script>
    $(function () {
      $.ajax({
        url: '/api.php?path=applications',
        method: 'get',
        dataType: 'json',
        success: function (data) {
          console.log(data);
          data.forEach(function (val) {
            var table_data = '<tr><td>' + val.id + '</td>' +
              '<td><a href="/applications/page.php?id=' + val.id + '">' + val.full_name + '</a></td>' +
              '<td><form method="post">' +
              '<input type="hidden" name="id" value="' + val.id + '">' +
              '<p><input type="submit" value="Удалить"></p>' +
              '</form></td></tr>'
            $('#result_table').append(table_data);
          });
        }
      });
    });
  </script>

  <h1>Список заявок</h1>

  <div>
    <form name="filter">
      <p><b>ID: </b><input type="text" name='id' size="20"></p>
      <p><b>ФИО: </b><input type="text" name='full_name' size="20"></p>
      <button>Фильтровать</button>
    </form>
  </div>

  <table border="1" id='result_table'>
    <tr>
      <th>ID заявки</th>
      <th>ФИО заявки</th>
      <th>Действия</th>
    </tr>

  </table>
  <p><a href='/applications/add.php'>+ Добавить заявку</a></p>
  <p><a href='/'>← Назад</a></p>
</body>

</html>