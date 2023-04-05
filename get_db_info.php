<?php

function get_db_full_table_applications()
{
    $mysql_link = new mysqli('127.0.0.1', 'root', '', 'db_mysite.local');

    if ($mysql_link == false) {
        print("Ошибка: Невозможно подключиться к MySQL " . mysqli_connect_error());
        return;
    }

    $sql_request = 'SELECT id, full_name FROM applications';
    $result = mysqli_query($mysql_link, $sql_request);

    if ($result == false) {
        print("Произошла ошибка при выполнении запроса!");
        return;
    }

    $result_array = [];
    while ($row = mysqli_fetch_array($result)) {
        $result_array[] = $row;
    }

    return $result_array;
}

function get_db_full_table_managers()
{
    $mysql_link = new mysqli('127.0.0.1', 'root', '', 'db_mysite.local');

    if ($mysql_link == false) {
        print("Ошибка: Невозможно подключиться к MySQL " . mysqli_connect_error());
        return;
    }

    $sql_request = 'SELECT manager_id, full_name FROM managers';
    $result = mysqli_query($mysql_link, $sql_request);

    if ($result == false) {
        print("Произошла ошибка при выполнении запроса!");
        return;
    }

    $result_array = [];
    while ($row = mysqli_fetch_array($result)) {
        $result_array[] = $row;
    }

    return $result_array;
}
function get_db_specific_managers($manager_id)
{
    $mysql_link = new mysqli('127.0.0.1', 'root', '', 'db_mysite.local');

    if ($mysql_link == false) {
        print("Ошибка: Невозможно подключиться к MySQL " . mysqli_connect_error());
        return;
    }

    $sql_request = 'SELECT * FROM managers WHERE manager_id=' . $manager_id;
    $result = mysqli_query($mysql_link, $sql_request);

    if ($result == false) {
        print("Произошла ошибка при выполнении запроса!");
        return;
    }

    $data_list=mysqli_fetch_array($result);
    
    $result_array=[
        'manager_id'=>[
            'col'=>'ID менеджера',
            'val'=>$data_list['manager_id']
        ],
        'full_name'=>[
            'col'=>'ФИО менеджера',
            'val'=>$data_list['full_name']
        ],
        'email'=>[
            'col'=>'Email менеджера',
            'val'=>$data_list['email']
        ],
        'phone_number'=>[
            'col'=>'Номер телефона менеджера',
            'val'=>$data_list['phone_number']
        ]
    ];

    return $result_array;
}

define('REG_DESCRIPTION', [
    'ИП' => 'P_21001',
    'ООО' => 'P_11001'
  ]);

function get_db_specific_application($id)
{
    $mysql_link = new mysqli('127.0.0.1', 'root', '', 'db_mysite.local');

    if ($mysql_link == false) {
        print("Ошибка: Невозможно подключиться к MySQL " . mysqli_connect_error());
        return;
    }

    $sql_request = 'SELECT * FROM applications WHERE id=' . $id;
    $result = mysqli_query($mysql_link, $sql_request);

    if ($result == false) {
        print("Произошла ошибка при выполнении запроса!");
        return;
    }

    $data_list=mysqli_fetch_array($result);

    $b_day_list=explode('-',strval($data_list['b_day']));
    $b_day_correct_list=array_reverse($b_day_list);
    $correct_d_day_value=implode('.',$b_day_correct_list);
    
    $result_array=[
        'id'=>[
            'col'=>'ID заявки',
            'val'=>$data_list['id']
        ],
        'full_name'=>[
            'col'=>'ФИО',
            'val'=>$data_list['full_name']
        ],
        'b_day'=>[
            'col'=>'Дата рождения',
            'val'=>$correct_d_day_value
        ],
        'reg_form'=>[
            'col'=>'Форма регистрации',
            'val'=>((array_search($data_list['reg_form'], REG_DESCRIPTION)) ?: '-')
        ],
        'sex'=>[
            'col'=>'Пол',
            'val'=>($data_list['sex']=='f')?'Женский':'Мужской'
        ],
        'email'=>[
            'col'=>'Email',
            'val'=>$data_list['email']
        ],
        'phone_number'=>[
            'col'=>'Номер телефона',
            'val'=>'+7'.$data_list['phone_number']
        ]
    ];

    return $result_array;
}