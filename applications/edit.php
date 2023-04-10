<?php

ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

include dirname(__DIR__, 1) . '\get_db_info.php';
include dirname(__DIR__, 1) . '\config.php';

if (!empty($_POST)) {
    edit_db_application_data($_POST);
}

$manager_id = ($_GET["id"]);
$data_list = get_db_specific_application($manager_id);

?>

<html>

<head>
    <title>Редактирование данных заявки</title>
</head>

<body>
    <form method="post">
        <table border="1">
            <caption>
                <h1>Редактирование данных заявки №
                    <?php print $data_list['id']['val'] ?>
                </h1>
            </caption>

            <input name='id' input type='hidden' value="<?php print $data_list['id']['val'] ?>">
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
                    <?php print($data_list['b_day']['col']) ?>
                </td>
                <td>
                    <?php print($data_list['b_day']['val']) ?>
                </td>
                <td><input name='b_day' type="text" required size="40"
                        value='<?php print($data_list['b_day']['val']) ?>'></td>
            </tr>
            <tr>
                <td>
                    <?php print($data_list['reg_form']['col']) ?>
                </td>
                <td>
                    <?php print($data_list['reg_form']['val']) ?>
                </td>
                <td><input name='reg_form' type="text" required maxlength="10" size="40"
                        value='<?php print($data_list['reg_form']['val']) ?>'></td>
            </tr>
            <tr>
                <td>
                    <?php print($data_list['sex']['col']) ?>
                </td>
                <td>
                    <?php print($data_list['sex']['val']) ?>
                </td>
                <td><input name='sex' type="text" required maxlength="1" size="40"
                        value='<?php print($data_list['sex']['val']) ?>'></td>
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
            <tr>
                <td>
                    <?php print($data_list['manager_id']['col']) ?>
                </td>
                <td>
                    <?php print($data_list['manager_id']['val']) ?>
                </td>
                <td><input name='manager_id' type="text" required size="40"
                        value='<?php print($data_list['manager_id']['val']) ?>'></td>
            </tr>
        </table>
        <p><input type="submit" value="Изменить данные"></p>
    </form>
    <p><a href="/applications">← Назад</a></p>
</body>
</html>