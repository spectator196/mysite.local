<?php

ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

include dirname(__DIR__, 1) . '\get_db_info.php';
include dirname(__DIR__, 1) . '\config.php';

$id=($_GET["id"]);
$data_list=get_db_specific_application($id);

?>

<html>
<table border="1">
  <caption><h1>Информация о заявке</h1></caption>
  <tr>
    <th>Атрибут</th>
    <th>Значение</th>
  </tr>
  <?php foreach ($data_list as $record):?>
    <tr>
      <td><?php print($record['col'])?></td>
      <td><?php print($record['val'])?></td>
    </tr>
  <?php endforeach; ?>
</table>
<p><a href="/applications">← Назад</a></p>
</html>