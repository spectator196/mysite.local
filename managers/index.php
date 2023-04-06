<?php

ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

include dirname(__DIR__, 1) . '\get_db_info.php';
include dirname(__DIR__, 1) . '\config.php';

$data_list=get_db_full_table_managers();

?>

<html>
<table border="1">
  <caption><h1>Список менеджеров</h1></caption>
  <tr>
    <th>ID менеджера</th>
    <th>ФИО менеджера</th>
  </tr>
  <?php foreach ($data_list as $record):?>
  <tr>
    <td><?php print($record['manager_id'])?></td>
    <td><a href="/managers/page.php?manager_id=<?php print($record['manager_id'])?>"><?php print($record['full_name'])?></a></td>
  </tr>
  <?php endforeach; ?>
</table>
<p><a href='/'>← Назад</a></p>
</html>