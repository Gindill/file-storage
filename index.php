<?php
/**
 * Created by PhpStorm.
 * User: Dusty
 * Date: 13.01.2017
 * Time: 20:25
 */

require_once "ini.php";
require_once "system/core.php";
require_once "system/system.class.php";
require_once "system/template.class.php";
require_once "system/controller.class.php";
require_once "system/model.class.php";

$route = substr($_SERVER['REQUEST_URI'], 1) ? substr($_SERVER['REQUEST_URI'], 1) : 'file/list';
$route_array = explode('/', $route);

$controller_class = controller_name($route_array[0]);
// проверка для перебрасывания на страницу 404 в случае несуществующего класса
$controller_method = isset($route_array[1]) ? controller_method_name($route_array[1]) : NULL;
// проверка для перебрасывания на страницу 404 в случае несуществующего метода
$id = isset($route_array[2]) ? $route_array[2] : NULL;

try
{
  $controller = new $controller_class();
}
catch(Exception $e)
{
  $page404 = new Controller();
  $page404->e404();
}

if ($id === NULL)
{
    $controller->$controller_method();
}
else
{
    $controller->$controller_method($id);
}
