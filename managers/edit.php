<?php

ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

include dirname(__DIR__, 1) . '\get_db_info.php';
include dirname(__DIR__, 1) . '\config.php';

if (!empty($_POST)) {
    edit_db_manager_data($_POST);
}

$manager_id = ($_GET["manager_id"]);
$data_list = get_db_specific_managers($manager_id);

?>

<html>

<head>
    <title>Редактирование данных менеджера</title>
</head>

<body>
    <h1>Редактирование данных менеджера №
        <?php print $data_list['manager_id']['val'] ?>
    </h1>

    <form method="post">
        <table border="1">

            <input name='manager_id' input type='hidden' value="<?php print $data_list['manager_id']['val'] ?>">
            <tr>
                <th>Атрибут</th>
                <th>Текущее значение</th>
                <th>Новое значение</th>
            </tr>
            <tr>
                <td>
                    <?php print($data_list['full_name']['col']) ?>
                </td>
                <td>
                    <?php print($data_list['full_name']['val']) ?>
                </td>
                <td><input name='full_name' type="text" required size="40"
                        value='<?php print($data_list['full_name']['val']) ?>'></td>
            </tr>
            <tr>
                <td>
                    <?php print($data_list['email']['col']) ?>
                </td>
                <td>
                    <?php print($data_list['email']['val']) ?>
                </td>
                <td><input name='email' type="text" required size="40"
                        value='<?php print($data_list['email']['val']) ?>'></td>
            </tr>
            <tr>
                <td>
                    <?php print($data_list['phone_number']['col']) ?>
                </td>
                <td>
                    <?php print($data_list['phone_number']['val']) ?>
                </td>
                <td>+7<input name='phone_number' type="text" required size="37" maxlength="10"
                        value='<?php print(mb_substr($data_list['phone_number']['val'], 2)) ?>'></td>
            </tr>
        </table>
        <p><input type="submit" value="Изменить данные"></p>
    </form>
    <p><a href="/managers">← Назад</a></p>
</body>

</html>