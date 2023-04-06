<?php

ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

include dirname(__DIR__, 1) . '\get_db_info.php';
include dirname(__DIR__, 1) . '\config.php';

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
    <td><a href="/applications/page.php?id=<?php print($record['id'])?>"><?php print($record['full_name'])?></a></td>
  </tr>
  <?php endforeach; ?>
</table>
<p><a href='/'>← Назад</a></p>
</html>
