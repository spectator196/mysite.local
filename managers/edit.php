<?php

ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

include dirname(__DIR__, 1) . '\get_db_info.php';
include dirname(__DIR__, 1) . '\config.php';

$manager_id = ($_GET["manager_id"]);
$data_list = get_db_specific_managers($manager_id);

?>

<html>

<head>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css"
        integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
    <title>Редактирование данных менеджера</title>
</head>

<body>
    <h1 data-manager_id="<?php print $manager_id; ?>">
        Редактирование данных менеджера №
        <?php print $manager_id ?>
    </h1>


    <script>
        $(function () {
            $("form").submit(function (e) {
                e.preventDefault();
                var form = $(this);
                var manager_id = $('h1').attr("data-manager_id");

                $.ajax({
                    url: '/api.php?path=managers&manager_id=' + manager_id,
                    method: 'put',
                    data: form.serialize(),
                    dataType: 'json',
                    success: function (data) {
                        console.log(data);
                    }
                });
            });
        }); 


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

    </script>

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
    <p><a href="/managers">← Назад</a></p>
</body>

</html>