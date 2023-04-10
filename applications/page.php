<?php

ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

include dirname(__DIR__, 1) . '\get_db_info.php';
include dirname(__DIR__, 1) . '\config.php';

$id=($_GET["id"]);
$data_list=get_db_specific_application($id);

?>

<html>

<head>
  <title>Информация о заявке</title>
</head>

<body>
  <table border="1">
    <h1>Информация о заявке</h1>
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
    <a href="/applications/edit.php?id=<?php print($data_list['id']['val']) ?>">Редактировать запись</a>
  </div>
  <p><a href="/applications">← Назад</a></p>
</body>

</html>