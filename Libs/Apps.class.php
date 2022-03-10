<?php
ob_start();
/* @author: Usiobaifo Kenneth
 * @developer: Usiobaifo Kenneth
 * @year: 2022
 * @rights: Usiobaifo Kenneth
 * */
class Apps
{
	public static $db;
	private static $controller;
	private static $action;
	private static $params;
	private static $router;
	//=======setters======//
	private static function loader(): void
	{
		self::$router = explode(DS, rtrim($_SERVER['REQUEST_URI'], DS));
		//===call controller, action, params and language setter method======
		self::setController();
		self::setAction();
		self::setParams();
		self::setLanguage();
		Utis::binder();
	}
	//========the controller method=======
	private static function setController(): void
	{
		// if languange is in the url
		if ((isset(self::$router[1]) && in_array(self::$router[1], Config::get('LANGUAGES'))) && isset(self::$router[2])) {
			self::$controller = self::$router[2];
		} else if (isset(self::$router[1]) && !in_array(self::$router[1], Config::get('LANGUAGES'))) {
			self::$controller = self::$router[1];
		} else {
			self::$controller = trim(strtolower(Config::get('DEFAULT_CONTROLLER')));
		}
	}
	//========the action method============
	private static function setAction(): void
	{
		// if languange is in the url, then shift the controller to the next array===
		if ((isset(self::$router[1]) && in_array(self::$router[1], Config::get('LANGUAGES'))) && isset(self::$router[3])) {
			self::$action = self::$router[3] . 'Action';
		} else if ((isset(self::$router[1]) && !in_array(self::$router[1], Config::get('LANGUAGES'))) && isset(self::$router[2])) {
			// if languange is not in the url, place the contoller in the second index of the url=====
			self::$action = self::$router[2] . 'Action';
		} else {
			self::$action = trim(strtolower(Config::get('DEFAULT_ACTION'))) . 'Action';
		}
	}
	//====check all the extra parameters==========
	private static function setParams(): void
	{
		// if languange is in the url
		if ((isset(self::$router[1]) && in_array(self::$router[1], Config::get('LANGUAGES'))) && isset(self::$router[4])) {
			for ($i = 4; $i < count(self::$router); $i++) {
				if (isset(self::$router[$i])) {
					self::$params .= trim(self::$router[$i] . DS);
				}
			}
		} else if ((isset(self::$router[1]) && !in_array(self::$router[1], Config::get('LANGUAGES'))) && isset(self::$router[3])) {
			// if language is not in the url
			for ($i = 3; $i < count(self::$router); $i++) {
				if (isset(self::$router[$i])) {
					self::$params .= trim(self::$router[$i] . DS);
				}
			}
		} else {
			self::$params = null;
		}
	}
	//=======set language method, if there is a language key in the url, grab the language file and display that language else run the default lang
	private static function setLanguage(): void
	{
		if (isset(self::$router[1]) && in_array(self::$router[1], Config::get('LANGUAGES'))) {
			Lang::load(self::$router[1]);
		} else {
			Lang::load(Config::get('DEFAULT_LANGUAGE'));
		}
	}
	//=====dispatcher/runner method==============
	public static function runner(): void
	{
		//====================Database class configuration==================///
		if (Config::get('USING_DB_STATUS') == TRUE) {
			self::$db = new Database(Config::get('DBTYPE'), Config::get('DBHOST'), Config::get('DBUSER'), Config::get('DBPASS'), Config::get('DBNAME'), Config::get('DBCHARSET'));
		}
		//====call the url router method=======
		self::loader();
		//=======get the controller property value========
		$controllerName = ucfirst(self::$controller);
		if (class_exists($controllerName)) { //check if the controller in the url has a class with same name
			$controller = new $controllerName(); //create an object of the class
			if (method_exists($controller, self::$action)) { //=======check if action method in the url exist
				$actionName = self::$action;
				$controller->$actionName(self::$params);
			}else{
				Utis::pageRedirect(DS.Utis::$language.DS."exceptions/notfound/");
			}
		} else {
			Utis::pageRedirect(DS . Utis::$language . DS . "exceptions/notfound/");
		}
		ob_flush();
	}
}
