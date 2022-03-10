<?php
/* @author: Usiobaifo Kenneth
 * @developer: Usiobaifo Kenneth
 * @year: 2022
 * @rights: Usiobaifo Kenneth
 * */
class Cookie
{
    protected static $flash_message;
    //==========This function sets cookies flash messages============
    public static function setFlash(String $message)
    {
        self::$flash_message = $message;
    }
    //==========This function checks if there is flash message in cookies============
    public static function hasFlash()
    {
        return !is_null(self::$flash_message);
    }
    //==========This function flash cokies message============
    public static function flash()
    {
        echo self::$flash_message;
        self::$flash_message = null;
    }
    //==========This function set cookies============
    public static function set(String $key, String $value)
    {
        @setcookie($key, $value, time() + (386400 * Config::get('COOKIE_EXPIRATION_TIME_IN_HOURS')), '/');
    }
    //==========This function get cookies============
    public static function get(String $key)
    {
        if (isset($_COOKIE[$key])) {
            return $_COOKIE[$key];
        }
        return null;
    }
    //==========This function delete cookies============
    public static function cookieDelete(String $key)
    {
        if (isset($_COOKIE[$key])) {

            unset($_COOKIE[$key]);
        }
    }
    //==========This function destroy cookies============
    public static function destroy(String $key)
    {
        if (isset($_COOKIE[$key])) {
            unset($_COOKIE[$key]);
            setcookie($_COOKIE[$key], null, -1, "/");
            return true;
        } else {
            return false;
        }
    }
   
}
