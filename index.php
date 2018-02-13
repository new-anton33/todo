<?
header('Content-Type: text/html; charset=utf-8', true);
session_start();

require ('config/db_config.php');
require ('config/config.php');

require ('classes/DB.php');
require ('classes/ControllerBase.php');
require ('classes/Template.php');


DB::getInstance();

//Load classes
spl_autoload_register(function ($class_name) {
    require (str_replace('_', '/', $class_name) . '.php');
});

if(isset($_GET['controller'])){
    $get_c = 'controller_'.ucfirst($_GET['controller']);
    $get_m = 'model_'.ucfirst($_GET['controller']);
} else {
    $get_c = 'controller_Todo';
    $get_m = 'model_Todo';
}

$controller = new $get_c();
$controller->model  = new $get_m();

//Add request data to variable
$controller->post  = $_POST;
$controller->files  = $_FILES;

//Run actions
$action = (!empty($_GET['action']))? ucfirst($_GET['action']) : 'GetList';
$id = (!empty($_GET['id']))? $_GET['id'] : 0;

$controller->$action($id);

?>
