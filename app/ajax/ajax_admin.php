<?php
session_start();
@define('_lib', '../../lib/');
include_once _lib . "config.php";
include_once _lib . "class.database.php";
include_once _lib . "function.php";
$db = new database($config['database']);
$db->connect();
if (isset($_POST)) {
    switch ($_POST['act']) {
        case 'delete':
            removeData($_POST['id'], $_POST['table'], $_POST['table_translate']);
            die(json_encode(array("result" => 1)));
            break;
        case 'delete_checkbox':
            foreach ($_POST['id'] as $r_id) {
                removeData($r_id, $_POST['table'], $_POST['table_translate']);
            }
            die(json_encode(array("result" => 1)));
            break;
        case 'status':
            updateData($_POST['id'], $_POST['table'], $_POST['column']);
            die(json_encode(array("result" => 1)));
            break;
        case 'filter':
            if (proccessFilter()) die(json_encode(array("result" => 1)));
            die(json_encode(array("result" => 0)));
            break;
        default:
            die(json_encode(array("result" => 0)));
            break;
    }
} else {
    die(json_encode(array("result" => 0)));
}
function proccessFilter()
{
    switch ($_POST['com']) {
        case 'graphic':
            if (isset($_POST['filter']) && $_POST['filter'] == 'type') {
                $_SESSION['filter_' . $_POST['com']][$_POST['filter']] = is_array($_POST['type']) && !empty($_POST['type'])? array_values($_POST['type']) : array();
                return true;
            }
            break;

        default:
            break;
    }
    return false;
}
