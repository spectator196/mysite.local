<?php

ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

include_once 'get_db_info.php';
header('Content-type: application/json');

define ('ERROR_API_MESSAGES',[
    'default_api_error'=> 'Некорректное обращение к api!',
    'post_api_error'=>'Некорректное обращение методом POST к api!',
    'get_api_error'=>'Некорректное обращение методом GET к api!',
    'put_api_error'=>'Некорректное обращение методом PUT к api!',
    'delete_api_error'=>'Некорректное обращение методом DELETE к api!'
]);

/* http://mysite.local/api.php?path=applications GET*/
/* http://mysite.local/api.php?path=applications POST*/
/* http://mysite.local/api.php?path=applications&id=% PUT*/
/* http://mysite.local/api.php?path=applications&id=% DELETE*/
/* http://mysite.local/api.php?path=applications&id=% GET*/

/* http://mysite.local/api.php?path=managers GET*/
/* http://mysite.local/api.php?path=managers POST*/
/* http://mysite.local/api.php?path=managers&manager_id=% PUT*/
/* http://mysite.local/api.php?path=managers&manager_id=% DELETE*/
/* http://mysite.local/api.php?path=managers&manager_id=% GET*/

function applications_get_list(): array
{
    return get_db_full_table_applications([]);
}

function applications_get_item($id): array
{
    return get_db_specific_application($id);
}

function application_post_create($app_data): array
{
    add_db_application_data($app_data);
    return ['result' => 'ADD Done'];
}

function application_post_update($id, $app_data): array
{
    edit_db_application_data($id, $app_data);
    return ['result' => 'EDIT Done'];
}

function application_post_delete($id): array
{
    delete_db_application_data($id);
    return ['result' => 'DELETE Done'];
}

function manager_get_list(): array
{
    return get_db_full_table_managers([]);
}

function manager_get_item($manager_id): array
{
    return get_db_specific_managers($manager_id);
}

function manager_post_create($app_data): array
{
    add_db_manager_data($app_data);
    return ['result' => 'ADD Done'];
}
function manager_post_update($manager_id, $app_data): array
{
    edit_db_manager_data($manager_id, $app_data);
    return ['result' => 'EDIT Done'];
}

function manager_post_delete($manager_id): array
{
    delete_db_manager_data($manager_id);
    return ['result' => 'DELETE Done'];
}


function api()
{
    $result = [1];
    $path = $_GET['path'] ?? '';
    switch ($_SERVER['REQUEST_METHOD']) {

        case 'GET':
            switch ($path) {
                case 'applications':
                    if (!empty($_GET['id'])) {
                        $result = applications_get_item($_GET['id']);
                    } else {
                        $result = applications_get_list();
                    }
                    ;
                    break;
                case 'managers':
                    if (!empty($_GET['manager_id'])) {
                        $result = manager_get_item($_GET['manager_id']);
                    } else {
                        $result = manager_get_list();
                    }
                    break;
                default:
                    $result=ERROR_API_MESSAGES['get_api_error'];
                    break;   
            }
            break;


        case 'POST':
            switch ($path) {
                case 'applications':
                    if (!empty($_POST)) {
                        $result = application_post_create($_POST);
                    }
                    break;
                case 'managers':
                    if (!empty($_POST)) {
                        $result = manager_post_create($_POST);
                    }
                    break;
                default:
                    $result=ERROR_API_MESSAGES['post_api_error'];
                    break;    
            }
            break;


        case 'PUT':
            switch ($path) {
                case 'applications':
                    if (!empty($_GET['id']) and !empty($_POST)) {
                        $result = application_post_update($_GET['id'], $_POST);
                    }
                    break;
                case 'managers':
                    if (!empty($_GET['manager_id']) and !empty($_POST)) {
                        $result = manager_post_update($_GET['manager_id'], $_POST);
                    }
                    break;
                default:
                    $result=ERROR_API_MESSAGES['put_api_error'];
                    break;    
            }   
            break;


        case 'DELETE':
            switch ($path) {
                case 'applications':
                    if (!empty($_GET['id'])) {
                        $result = application_post_delete($_GET['id']);
                    }
                    break;
                case 'managers':
                    if (!empty($_GET['manager_id'])) {
                        $result = manager_post_delete($_GET['manager_id']);
                    }
                    break;
                default:
                    $result=ERROR_API_MESSAGES['delete_api_error'];
                    break;
            }
            break;     
        
        default:
            $result=ERROR_API_MESSAGES['default_api_error'];
            break;
    }

    print json_encode($result);
}

api();
die();