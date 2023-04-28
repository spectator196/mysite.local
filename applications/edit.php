<?php

ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

include dirname(__DIR__, 1) . '\get_db_info.php';
include dirname(__DIR__, 1) . '\config.php';

if (!empty($_POST)) {
    edit_db_application_data($_POST['id'], $_POST['update_params']);
}

$manager_id = ($_GET["id"]);
$data_list = get_db_specific_application($manager_id);

?>

<html>

<head>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css"
        integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
    <title>Редактирование данных заявки</title>
</head>

<body>
    <h1 data-id="<?php print $manager_id; ?>">Редактирование данных заявки №
        <?php print $data_list['id']['val'] ?>

    </h1>

    <script>
        $(function () {
            var id = $('h1').attr("data-id")
            $.ajax({
                url: '/api.php?path=applications&id=' + id,
                method: 'get',
                dataType: 'json',
                success: function (data) {
                    console.log(data);
                    var table_data = '<tr><td>' + data.id.col + '</td>' +
                        '<td>' + data.id.val + '</td>' +

                        '<tr><td>' + data.full_name.col + '</td>' +
                        '<td>' + data.full_name.val + '</td>' +
                        '<td><input name="full_name" type="text" required size="40"' +
                        'value="' + data.full_name.val + '"></td></tr>' +

                        '<tr><td>' + data.b_day.col + '</td>' +
                        '<td>' + data.b_day.val + '</td>' +
                        '<td><input name="b_day" type="text" required size="40" maxlength="10"' +
                        'value="' + data.b_day.val + '"></td></tr>' +

                        '<tr><td>' + data.reg_form.col + '</td>' +
                        '<td>' + data.reg_form.val + '</td>' +
                        '<td><input name="reg_form" type="text" required size="40"' +
                        'value="' + data.reg_form.val + '"></td></tr>' +

                        '<tr><td>' + data.sex.col + '</td>' +
                        '<td>' + data.sex.val + '</td>' +
                        '<td><input name="sex" type="text" maxlength="1" required size="40"' +
                        'value="' + data.sex.val + '"></td></tr>' +

                        '<tr><td>' + data.email.col + '</td>' +
                        '<td>' + data.email.val + '</td>' +
                        '<td><input name="email" type="text" required size="40"' +
                        'value="' + data.email.val + '"></td></tr>' +

                        '<tr><td>' + data.phone_number.col + '</td>' +
                        '<td>' + data.phone_number.val + '</td>' +
                        '<td><input name="phone_number" type="text" required size="37" maxlength="10"' +
                        'value="' + data.phone_number.val.substr(2) + '"></td></tr>' +

                        '<tr><td>' + data.manager_id.col + '</td>' +
                        '<td>' + data.manager_id.val + '</td>' +
                        '<td><input name="manager_id" type="text" required size="40"' +
                        'value="' + data.manager_id.val + '"></td></tr>';

                    $('#result_table').append(table_data);
                }
            });
        });
    </script>

    <div class="container">
        <form method="post">
            <table class="table table-bordered table-striped" id='result_table'>
                <tr>
                    <th>Атрибут</th>
                    <th>Текущее значение</th>
                    <th>Новое значение</th>
                </tr>
            </table>
            <p><input type="submit" class="btn btn-primary" value="Изменить данные"></p>
        </form>
    </div>
    <p><a href="/applications">← Назад</a></p>
</body>

</html>