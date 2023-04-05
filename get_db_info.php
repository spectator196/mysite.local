<?php

function get_db_full_table($table_name)
{
    $mysql_link = new mysqli('127.0.0.1', 'root', '', 'db_mysite.local');

    if ($mysql_link == false) {
        print("Ошибка: Невозможно подключиться к MySQL " . mysqli_connect_error());
        return;
    }

    $sql_request = "SELECT * FROM `" . $table_name . "`";
    $result = mysqli_query($mysql_link, $sql_request);

    if ($result == false) {
        print("Произошла ошибка при выполнении запроса!");
        return;
    }

    $result_array=[];
    while ($row = mysqli_fetch_array($result)) {
        $result_array[]=$row;
    }
    return $result_array;
}