<?php

ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

include dirname(__DIR__, 1) . '\get_db_info.php';

$data_list=get_db_full_table_applications();

?>

<html>
<table border="1">
  <caption><h1>Список заявок</h1></caption>
  <tr>
    <th>ID заявки</th>
    <th>ФИО клиента</th>
  </tr>
  <?php foreach ($data_list as $record):?>
  <tr>
    <td><?php print($record['id'])?></td>
    <td><a href=<?php print("/applications/page.php?id=".$record['id'])?>><?php print($record['full_name'])?></a></td>
  </tr>
  <?php endforeach; ?>
</table>
</html>
