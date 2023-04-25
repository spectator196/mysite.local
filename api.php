<?php 
include 'get_db_info.php';


/* http://mysite.local/api.php?path=applications GET*/
/* http://mysite.local/api.php?path=managers GET*/

if ($_GET['path']=='applications' and (isset($_GET['id'])))
{
    print(json_encode(get_db_full_table_applications(($_GET['id']))));
} elseif ($_GET['path']=='applications')
{
    print(json_encode(get_db_full_table_applications([])));
}

if ($_GET['path']=='managers' and (isset($_GET['manager_id'])))
{
    print(json_encode(get_db_specific_managers(($_GET['manager_id']))));
} elseif ($_GET['path']=='managers')
{
    print(json_encode(get_db_full_table_managers([])));
}

/* http://mysite.local/api.php?path=applications/create POST*/
/* http://mysite.local/api.php?path=managers/create POST*/

if ($_POST['path']=='applications/create' and (isset($_POST['app_data'])))
{
    add_db_application_data($_POST['app_data']);
}
if ($_POST['path']=='managers/create' and (isset($_POST['manager_data'])))
{
    add_db_manager_data($_POST['manager_data']);
}

/* http://mysite.local/api.php?path=applications/delete POST ?DELETE*/
/* http://mysite.local/api.php?path=managers/delete POST ?DELETE*/

if ($_POST['path']=='applications/delete' and (isset($_POST['id'])))
{
    delete_db_application_data($_POST['app_data']);
}
if ($_POST['path']=='managers/delete' and (isset($_POST['manager_id'])))
{
    delete_db_manager_data($_POST['manager_data']);
}

/* http://mysite.local/api.php?path=applications/update POST ?PUT*/
/* http://mysite.local/api.php?path=managers/update POST ?PUT*/

if ($_POST['path']=='applications/update' and (isset($_POST['app_data'])))
{   
    edit_db_application_data($_POST['app_data']);
}
if ($_POST['path']=='managers/update' and (isset($_POST['manager_data'])))
{   
    edit_db_application_data($_POST['manager_data']);
}