<?php
/* @author: Usiobaifo Kenneth
 * @developer: Usiobaifo Kenneth
 * @year: 2022
 * @rights: Usiobaifo Kenneth
 * */
$config = ROOT . DS . "Config" . DS . "config.php";

//==============This is the autoload function to load all the class files automatically==============
spl_autoload_register("classesAutoload");
function classesAutoload(String $class_name)
{
	$model = ROOT . DS . "Apps" . DS . "Models" . DS . $class_name . ".model.php";
	$controller = ROOT . DS . "Apps" . DS . "Controllers" . DS . $class_name . ".controller.php";
	$libs = ROOT . DS . "Libs" . DS . $class_name . ".class.php";
	if (file_exists($controller)) {
		require $controller;
	}elseif (file_exists($model)) {
		require $model;
	} elseif (file_exists($libs)) {
		require $libs;
	} else {
		Utis::pageRedirect(DS . Utis::$language . DS . Config::get("DEFAULT_CONTROLLER") . DS . Config::get("DEFAULT_ACTION") . DS);
		//throw new Exception("ERROR: Requested file class file {$class_name} not found ");
	}
}

//=========This is the language file loader===============
function __(String $key, String $default_value = '')
{
	return Lang::get($key, $default_value);
}
//========This includes the config file======================
require $config;



