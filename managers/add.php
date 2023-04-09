<?php

ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

include dirname(__DIR__, 1) . '\get_db_info.php';
include dirname(__DIR__, 1) . '\config.php';

if (!empty($_POST)) {
    add_db_manager_data($_POST);
}

?>

<html>

<head>
    <title>Добавление записи менеджера</title>
</head>

<body>
    <form method="post">
        <table border="1">
            <h1>Добавление записи менеджера</h1>

            <input name='manager_id' input type='hidden' value="<?php print $data_list['manager_id']['val'] ?>">
            <tr>
                <th>Атрибут</th>
                <th>Новое значение</th>
            </tr>
            <tr>
                <td>ФИО менеджера</td>
                <td><input name='full_name' type="text" required size="40"></td>
            </tr>
            <tr>
                <td>Email менеджера</td>
                <td><input name='email' type="text" required size="40"></td>
            </tr>
            <tr>
                <td>Номер телефона менеджера</td>
                <td>+7<input name='phone_number' type="text" required size="37" maxlength="10"></td>
            </tr>
        </table>
        <p><input type="submit" value="Добавить данные"></p>
    </form>
    <p><a href="/managers">← Назад</a></p>
</body>

</html>