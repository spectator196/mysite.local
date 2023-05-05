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
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css"
    integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
  <title>Информация о менеджере</title>
</head>

<body>

  <script>
    $(function () {
      var manager_id = $('h1').attr("data-manager_id")
      $.ajax({
        url: '/api.php?path=managers&manager_id=' + manager_id,
        method: 'get',
        dataType: 'json',
        success: function (data) {
          console.log(data);
          var table_data = '<tr><td>' + data.manager_id.col + '</td>' +
            '<td>' + data.manager_id.val + '</td>' +

            '<tr><td>' + data.full_name.col + '</td>' +
            '<td>' + data.full_name.val + '</td>' +

            '<tr><td>' + data.email.col + '</td>' +
            '<td>' + data.email.val + '</td>' +

            '<tr><td>' + data.phone_number.col + '</td>' +
            '<td>' + data.phone_number.val + '</td>'

          $('#result_table').append(table_data);
        }
      });
    });
  </script>


  <h1 data-manager_id="<?php print $manager_id; ?>">Информация о менеджере</h1>
  <table class="table table-bordered table-striped" id='result_table'>
    <tr>
      <th>Атрибут</th>
      <th>Значение</th>
    </tr>

  </table>
  <div>
    <a href="/managers/edit.php?manager_id=<?php print($data_list['manager_id']['val']) ?>">Редактировать запись</a>
  </div>
  <p><a href="/managers">← Назад</a></p>
</body>

</html>