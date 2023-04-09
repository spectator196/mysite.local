<?php

include 'config.php';

function get_mysql_data($sql_request)
{
    $mysql_link = new mysqli('127.0.0.1', 'root', '', 'db_mysite.local');
    if ($mysql_link == false) {
        throw new \Exception("Ошибка: Невозможно подключиться к MySQL " . mysqli_connect_error());
    }

    $result = mysqli_query($mysql_link, $sql_request);

    if ($result == false) {
        throw new \Exception("Произошла ошибка при выполнении запроса!");
    }

    return $result;
}

function get_db_full_table_applications($params): array
{
    $sql_request = 'SELECT id, full_name FROM applications WHERE 1=1';

    if (!empty($params['id'])) {
        $sql_request .= ' AND id=' . $params['id'];
    }
    if (!empty($params['full_name'])) {
        $sql_request .= ' AND full_name LIKE "%' . $params['full_name'] . '%"';
    }

    $result = get_mysql_data($sql_request);

    $result_array = [];
    while ($row = mysqli_fetch_array($result)) {
        $result_array[] = $row;
    }

    return $result_array;
}

function get_db_full_table_managers($params): array
{
    $sql_request = 'SELECT manager_id, full_name FROM managers WHERE 1=1';

    if (!empty($params['manager_id'])) {
        $sql_request .= ' AND manager_id=' . $params['manager_id'];
    }
    if (!empty($params['full_name'])) {
        $sql_request .= ' AND full_name LIKE "%' . $params['full_name'] . '%"';
    }

    $result = get_mysql_data($sql_request);

    $result_array = [];
    while ($row = mysqli_fetch_array($result)) {
        $result_array[] = $row;
    }

    return $result_array;
}
function get_db_specific_managers($manager_id): array
{
    $sql_request = 'SELECT * FROM managers WHERE manager_id=' . $manager_id;
    $result = get_mysql_data($sql_request);

    $data_list = mysqli_fetch_array($result);

    $result_array = [
        'manager_id' => [
            'col' => 'ID менеджера',
            'val' => $data_list['manager_id']
        ],
        'full_name' => [
            'col' => 'ФИО менеджера',
            'val' => $data_list['full_name']
        ],
        'email' => [
            'col' => 'Email менеджера',
            'val' => $data_list['email']
        ],
        'phone_number' => [
            'col' => 'Номер телефона менеджера',
            'val' => '+7' . $data_list['phone_number']
        ]
    ];

    return $result_array;
}

define('REG_DESCRIPTION', [
    'ИП' => 'P_21001',
    'ООО' => 'P_11001'
]);

define('SEX_ALLOWED_VALUES', [
    'Женский' => 'f',
    'Мужской' => 'm'
]);

function get_db_specific_application($id): array
{
    $sql_request = 'SELECT * FROM applications WHERE id=' . $id;
    $result = get_mysql_data($sql_request);

    $data_list = mysqli_fetch_array($result);

    $db_b_day_data = DateTime::createFromFormat('Y-m-d', $data_list['b_day']);
    $correct_b_day_value = $db_b_day_data->format('m.d.Y');

    $result_array = [
        'id' => [
            'col' => 'ID заявки',
            'val' => $data_list['id']
        ],
        'full_name' => [
            'col' => 'ФИО',
            'val' => $data_list['full_name']
        ],
        'b_day' => [
            'col' => 'Дата рождения',
            'val' => $correct_b_day_value
        ],
        'reg_form' => [
            'col' => 'Форма регистрации',
            'val' => ((array_search($data_list['reg_form'], REG_DESCRIPTION)) ?: '-')
        ],
        'sex' => [
            'col' => 'Пол',
            'val' => ((array_search($data_list['sex'], SEX_ALLOWED_VALUES)) ?: '-')
        ],
        'email' => [
            'col' => 'Email',
            'val' => $data_list['email']
        ],
        'phone_number' => [
            'col' => 'Номер телефона',
            'val' => '+7' . $data_list['phone_number']
        ]
    ];

    return $result_array;
}

function get_db_filtered_table_applications($sql_array): array
{
    $sql_array = array_filter($sql_array);
    if (count($sql_array) == 2) {
        $sql_request =
            'SELECT id, full_name FROM applications WHERE id=' . $sql_array['id'] .
            ' AND (full_name=' . $sql_array['full_name'] . 'OR full_name LIKE "%' . $sql_array['full_name'] . '%"';
    } elseif (count($sql_array) == 1) {
        switch (key($sql_array)) {
            case 'id':
                $sql_request = 'SELECT id, full_name FROM applications WHERE id=' . $sql_array['id'];
                break;
            case 'full_name':
                $sql_request = "SELECT id, full_name FROM applications WHERE full_name='" . $sql_array['full_name'] .
                    "' OR full_name LIKE '%" . $sql_array['full_name'] . "%'";
                break;
        }
    }

    $result = get_mysql_data($sql_request);

    $result_array = [];
    while ($row = mysqli_fetch_array($result)) {
        $result_array[] = $row;
    }

    return $result_array;
}

function edit_db_manager_data($update_params): void
{
    $sql_request_1_part = 'UPDATE managers SET ';
    $sql_request_2_part = '';
    $sql_request_3_part = ' WHERE manager_id=' . $update_params['manager_id'];

    unset($update_params['manager_id']);
    foreach ($update_params as $key => $data) {
        $sql_request_2_part .= $key . '= "' . $data . '", ';
    }
    $sql_request_2_part = substr($sql_request_2_part, 0, -2) . ' ';
    $sql_request = $sql_request_1_part . $sql_request_2_part . $sql_request_3_part;

    get_mysql_data($sql_request);

}

function add_db_manager_data($new_data): void
{
    $sql_request = "INSERT INTO managers (full_name, email, phone_number)" .
        "VALUES ('" . $new_data['full_name'] . "','" . $new_data['email'] . "','" . $new_data['phone_number'] . "')";

    get_mysql_data($sql_request);
}

function delete_db_manager_data($data): void
{
    $sql_request = 'DELETE FROM managers WHERE manager_id =' . $data['manager_id'];
    get_mysql_data($sql_request);
}