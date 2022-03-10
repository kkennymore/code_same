<?php
session_start();
/* @author: Usiobaifo Kenneth
 * @developer: Usiobaifo Kenneth
 * @year: 2022
 * @rights: Usiobaifo Kenneth
 * */
define("ROOT", dirname(dirname(__FILE__)));
define("DS", "/");
require ROOT . DS . "Libs" . DS . "Init.php";
define('VIEW_PATH', ROOT . DS . 'Apps' . DS . 'Views' . DS);

Apps::runner();
