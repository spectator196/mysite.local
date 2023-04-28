<?php

ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

include dirname(__DIR__, 1) . '\get_db_info.php';
include dirname(__DIR__, 1) . '\config.php';

$id = ($_GET["id"]);
$data_list = get_db_specific_application($id);

?>

<html>

<head>
  <title>Информация о заявке</title>
  <script src = "https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css"
    integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
</head>

<script>
    $(function () {
      var id = $('h1').attr("data-id")
      $.ajax({
        url: '/api.php?path=applications&id='+id,
        method: 'get',
        dataType: 'json',
        success: function (data) {
          console.log(data);
          var table_data='<tr><td>' + data.id.col + '</td>' +
            '<td>' + data.id.val + '</td>' +

            '<tr><td>' + data.full_name.col + '</td>' +
            '<td>' + data.full_name.val + '</td>' +

            '<tr><td>' + data.b_day.col + '</td>' +
            '<td>' + data.b_day.val + '</td>' +

            '<tr><td>' + data.reg_form.col + '</td>' +
            '<td>' + data.reg_form.val + '</td>' +

            '<tr><td>' + data.sex.col + '</td>' +
            '<td>' + data.sex.val + '</td>' +

            '<tr><td>' + data.email.col + '</td>' +
            '<td>' + data.email.val + '</td>' +

            '<tr><td>' + data.phone_number.col + '</td>' +
            '<td>' + data.phone_number.val + '</td>' +

            '<tr><td>' + data.manager_id.col + '</td>' +
            '<td>' + data.manager_id.val + '</td>';

            $('#result_table').append(table_data);
        }
      });
    });
  </script> 

<body>
  <h1 data-id="<?php print $id; ?>">Информация о заявке</h1>
  <div class="container">
    <table class="table table-bordered table-striped" id='result_table'>
      <tr>
        <th>Атрибут</th>
        <th>Значение</th>
      </tr>
    </table>
    <div>
      <div>
        <a href="/applications/edit.php?id=<?php print($data_list['id']['val']) ?>">Редактировать запись</a>
      </div>
      <p><a href="/applications">← Назад</a></p>
</body>

</html>