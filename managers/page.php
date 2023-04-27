<?php

ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

include dirname(__DIR__, 1) . '\get_db_info.php';
include dirname(__DIR__, 1) . '\config.php';

$manager_id = ($_GET["manager_id"]);
$data_list = get_db_specific_managers($manager_id);

?>

<html>

<head>
  <script src = "https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
  <title>Информация о менеджере</title>
</head>
<body>

<script>
    $(function () {
      $.ajax({
        url: '/api.php?path=managers&manager_id=',
        method: 'get',
        dataType: 'json',
        success: function (data) {
          console.log(data);
          data.forEach(function (val) {
            var table_data = '<tr><td>' + val.manager_id + '</td>' +
              '<td><a href="/managers/page.php?manager_id=' + val.manager_id + '">' + val.full_name + '</a></td>' +
              '<td><form method="post">'+
              '<input type="hidden" name="manager_id" value="'+val.manager_id+'">'+
              '<p><input type="submit" value="Удалить"></p>'+
              '</form></td></tr>'
            $('#result_table').append(table_data);
          });
        }
      });
    });
  </script> 


  <h1>Информация о менеджере</h1>
  <table border="1" id='result_table'>
    <tr>
      <th>Атрибут</th>
      <th>Значение</th>
    </tr>
    <?php foreach ($data_list as $record): ?>
      <tr>
        <td>
          <?php print($record['col']) ?>
        </td>
        <td>
          <?php print($record['val']) ?>
        </td>
      </tr>
    <?php endforeach; ?>
  </table>
  <div>
    <a href="/managers/edit.php?manager_id=<?php print($data_list['manager_id']['val']) ?>">Редактировать запись</a>
  </div>
  <p><a href="/managers">← Назад</a></p>
</body>

</html>