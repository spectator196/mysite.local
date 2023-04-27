<?php

ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

include dirname(__DIR__, 1) . '\get_db_info.php';
include dirname(__DIR__, 1) . '\config.php';

if (!empty($_POST)) {
    //edit_db_manager_data($_POST['manager_id']);
}

$manager_id = ($_GET["manager_id"]);
$data_list = get_db_specific_managers($manager_id);

?>

<html>

<head>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
    <title>Редактирование данных менеджера</title>
</head>

<body>
    <h1 data-manager_id="<?php print $manager_id; ?>">
        Редактирование данных менеджера №
        <?php print $manager_id ?>
    </h1>

    <script>
        // поле для будущего submit-ajax
    </script>

    <script>
        $(function () {
            var manager_id = $('h1').attr("data-manager_id")
            $.ajax({
                url: '/api.php?path=managers&manager_id=' + manager_id,
                method: 'get',
                dataType: 'json',
                success: function (data) {
                    console.log(data);
                    var result_table = '<tr><td>' + data.full_name.col + '</td>' +
                        '<td>' + data.full_name.val + '</td>' +
                        '<td><input name="full_name" type="text" required size="40"' +
                        'value="' + data.full_name.val + '"></td></tr>' +

                        '<tr><td>' + data.email.col + '</td>' +
                        '<td>' + data.email.val + '</td>' +
                        '<td><input name="email" type="text" required size="40"' +
                        'value="' + data.email.val + '"></td></tr>' +

                        '<tr><td>' + data.phone_number.col + '</td>' +
                        '<td>' + data.phone_number.val + '</td>' +
                        '<td><input name="phone_number" type="text" required size="37" maxlength="10"' +
                        'value="' + data.phone_number.val.substr(2) + '"></td></tr>';

                    $('#result_table').append(result_table);
                }
            });
        });
    </script>

    <form method="post">
        <table border="1" id='result_table'>

            <input name='manager_id' input type='hidden' value="<?php print $data_list['manager_id']['val'] ?>">
            <tr>
                <th>Атрибут</th>
                <th>Текущее значение</th>
                <th>Новое значение</th>
            </tr>

        </table>
        <p><input type="submit" value="Изменить данные"></p>
    </form>
    <p><a href="/managers">← Назад</a></p>
</body>

</html>