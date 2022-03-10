<?php
/* @author: Usiobaifo Kenneth
 * @developer: Usiobaifo Kenneth
 * @year: 2022
 * @rights: Usiobaifo Kenneth
 * */
class Lang
{
    protected static $data;
    //language loader function
    public static function load(String $lang_code)
    {
        $lang_file_path = ROOT . DS . 'Lang' . DS . strtolower($lang_code) . '.php';
        if (file_exists($lang_file_path)) {
            self::$data = include($lang_file_path);
        } else {
            UrlRequestFunctions::pageRedirect(DS . Config::get("DEFAULT_LANGUAGE") . DS . Config::get("DEFAULT_CONTROLLER") . Config::get("DEFAULT_ACTION"));
        }
    }
    public static function get(String $key, String $default_value = '')
    {
        return isset(self::$data[strtolower($key)]) ? self::$data[strtolower($key)] : $default_value;
    }
}
