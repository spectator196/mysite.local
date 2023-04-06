<?php

ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

include dirname(__DIR__, 1) . '\get_db_info.php';
include dirname(__DIR__, 1) . '\config.php';

$get_data = $_GET;

if ($get_data == ['id' => '', 'full_name' => ''] or $get_data == []) {
  $data_list = get_db_full_table_applications();
} else {
  $data_list = get_db_filtered_table_applications($get_data);
}

?>

<html>

<h1>Список заявок</h1>
<div>
  <form name="filter">
    <p><b>ID: </b><input type="text" name='id' size="20"></p>
    <p><b>ФИО: </b><input type="text" name='full_name' size="20"></p>
    <button type="submit">Фильтровать</button>
  </form>
</div>

<table border="1">
  <tr>
    <th>ID заявки</th>
    <th>ФИО клиента</th>
  </tr>
  <?php foreach ($data_list as $record): ?>
    <tr>
      <td>
        <?php print($record['id']) ?>
      </td>
      <td><a href="/applications/page.php?id=<?php print($record['id']) ?>"><?php print($record['full_name']) ?></a></td>
    </tr>
  <?php endforeach; ?>
</table>
<p><a href='/'>← Назад</a></p>

</html>