<?php

ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

include dirname(__DIR__, 1) . '\get_db_info.php';
include dirname(__DIR__, 1) . '\config.php';

$data_list = get_db_full_table_managers($_GET);

?>

<html>
<h1>Список менеджеров</h1>

<div>
  <form name="filter">
    <p><b>ID: </b><input type="text" name='manager_id' size="20"></p>
    <p><b>ФИО: </b><input type="text" name='full_name' size="20"></p>
    <button>Фильтровать</button>
  </form>
</div>

<table border="1">
  <tr>
    <th>ID менеджера</th>
    <th>ФИО менеджера</th>
  </tr>
  <?php foreach ($data_list as $record): ?>
    <tr>
      <td>
        <?php print($record['manager_id']) ?>
      </td>
      <td><a href="/managers/page.php?manager_id=<?php print($record['manager_id']) ?>"><?php print($record['full_name']) ?></a></td>
    </tr>
  <?php endforeach; ?>
</table>
<p><a href='/'>← Назад</a></p>

</html>