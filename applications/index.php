<?php

ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

include 'C:\OSPanel\domains\mysite.local\get_db_info.php';

$full_data_list=get_db_full_table('applications');

?>

<html>
<table border="1">
  <caption><h1>Список заявок</h1></caption>
  <tr>
    <th>ID заявки</th>
    <th>ФИО клиента</th>
  </tr>
  <?php foreach ($full_data_list as $record):?>
  <tr>
    <td><?php print($record['id'])?></td>
    <td><a href=<?php print("http://mysite.local/managers/page?id=".$record['id'])?>><?php print($record['full_name'])?></a></td>
  </tr>
  <?php endforeach; ?>
</table>
</html>




