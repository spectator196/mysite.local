<?php

ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

include dirname(__DIR__, 1) . '\get_db_info.php';
include dirname(__DIR__, 1) . '\config.php';

$manager_id = ($_GET["manager_id"]);
$data_list = get_db_specific_managers($manager_id);

?>

<html>
<form method="post">
    <table border="1">
        <caption>
            <h1>Информация о менеджере</h1>
        </caption>
        <tr>
            <th>Атрибут</th>
            <th>Текущее значение</th>
            <th>Новое значение</th>
        </tr>
        <?php foreach ($data_list as $record => $info_array): ?>
            <tr>
                <td>
                    <?php print($info_array['col']) ?>
                </td>
                <td>
                    <?php print($info_array['val']) ?>
                </td>
                <td>
                    <input name='<?php print($record) ?>' input type="text" size="20">
                </td>
            </tr>
        <?php endforeach; ?>
    </table>
    <p><input type="submit" value="Изменить данные"></p>
</form>
<p><a href="/managers">← Назад</a></p>

</html>