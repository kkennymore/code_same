<?php
/* @author: Usiobaifo Kenneth
 * @developer: Usiobaifo Kenneth
 * @year: 2022
 * @rights: Usiobaifo Kenneth
 * */
class Config
{
    protected static $settings = array();
    
    public static function get(String $key)
    {
        return isset(self::$settings[$key]) ? self::$settings[$key] : null;

    }
    public static function set(String $key, mixed $value)
    {
        self::$settings[$key] = $value;

    }
}