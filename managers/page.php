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
  <title>Информация о менеджере</title>
</head>

<body>
  <h1>Информация о менеджере</h1>
  <table border="1">
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