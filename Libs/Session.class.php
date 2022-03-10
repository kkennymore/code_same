<?php
/* @author: Usiobaifo Kenneth
 * @developer: Usiobaifo Kenneth
 * @year: 2022
 * @rights: Usiobaifo Kenneth
 * */
class Session
{
    protected static $flash_message;
    public static function setFlash($message)
    {
        self::$flash_message = $message;
    }
    public static function hasFlash()
    {
        return !is_null(self::$flash_message);
    }
    public static function flash()
    {
        echo self::$flash_message;
        self::$flash_message = null;
    }
    public static function set($key,$value)
    {
        $_SESSION[$key] = $value;
    }
    public static function get($key)
    {
        if (isset($_SESSION[$key])) {
            return $_SESSION[$key];
        }
        return null;
    }
    public static function sessDelete($key)
    {
        if (isset($_SESSION[$key])) {
            unset($_SESSION[$key]);
        }
    }
    public static function destroy()
    {
        session_destroy();
    }
    public static function seccessMessage($startime,$success)
    {
        if (time() - self::get($startime) > Config::get('SUCESS_MESSAGE_TIME')) {
            self::sessDelete($success);
            self::sessDelete($startime);
        } else {
            if (self::get($success)) {
                return self::get($success);
            }
        }
    }
    // this set Admin login session variables
    public static function setAdminLoginSessionVariables($getUser)
    {
        self::set('adm_id', $getUser['ID']);
        self::set('adm_username', $getUser['UserName']);
        self::set('adm_email', $getUser['UserEmail']);
        self::set('adm_number', $getUser['UserNumber']);
        self::set('adm_password', $getUser['UserPassword']);
        self::set('adm_country', $getUser['UserCountry']);
        self::set('adm_login_trial_count', $getUser['LoginAttemptCounter']);
        self::set('adm_image', $getUser['ProfileImage']);
        self::set('adm_ip_address', $getUser['Ip_Address']);
        self::set('adm_online_status', $getUser['OnlineStatus']);
        self::set('adm_status', $getUser['Status']);
        self::set('adm_timestamp', $getUser['Timestamp']);
    }
    // this set users login session variables
    public static function setUsersLoginSessionVariables($User)
    {
        self::set('id', $User['id']);
        self::set('username', $User['username']);
        self::set('email', $User['email']);
        self::set('password', $User['password']);
        self::set('mobileNumber', $User['mobileNumber']);
        self::set('status', $User['status']);
        self::set('isOnline', $User['onlineStatus']);
        self::set('image', $User['profileImage']);
        self::set('encKey', $User['userKey']);
        self::set('customerId', $User['customer_id']);
        self::set('dateJoined', date("d M Y ", $User['dateJoined']));
    }
}
