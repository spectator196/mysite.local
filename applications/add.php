<?php

ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

include dirname(__DIR__, 1) . '\get_db_info.php';
include dirname(__DIR__, 1) . '\config.php';

?>

<html>

<head>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css"
        integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
    <title>Добавление новой заявки</title>

    <script>
        $(function () {
            $("form").submit(function (e) {
                e.preventDefault();
                var form = $(this);

                $.ajax({
                    url: '/api.php?path=applications',
                    method: 'post',
                    data: form.serialize(),
                    dataType: 'json',
                    success: function (data) {
                        console.log(data);
                    }
                });
            });
        }); 
    </script>
</head>

<body>
    <div class="container">
        <h1>Добавление новой заявки</h1>
        <form method="post">
            <table class="table table-bordered table-striped">

                <tr>
                    <th>Атрибут</th>
                    <th>Новое значение</th>
                </tr>
                <tr>
                    <td>ФИО заявки</td>
                    <td><input name='full_name' type="text" required size="40"></td>
                </tr>
                <tr>
                    <td>Дата рождения</td>
                    <td><input name='b_day' type="text" required size="40"></td>
                </tr>
                <tr>
                    <td>Форма регистрации</td>
                    <td><input name='reg_form' type="text" required size="40" maxlength="7"></td>
                </tr>
                <tr>
                    <td>Пол</td>
                    <td><input name='sex' type="text" required size="40" maxlength="1"></td>
                </tr>
                <tr>
                    <td>Email</td>
                    <td><input name='email' type="text" required size="40"></td>
                </tr>
                <tr>
                    <td>Номер телефона</td>
                    <td>+7<input name='phone_number' type="text" required size="37" maxlength="10"></td>
                </tr>
                <tr>
                    <td>ID ответственного менеджера</td>
                    <td><input name='manager_id' type="text" required size="37" maxlength="10"></td>
                </tr>
            </table>
            <p><input type="submit" value="Добавить данные"></p>
        </form>
        <div>
            <p><a href="/applications">← Назад</a></p>
</body>

</html>