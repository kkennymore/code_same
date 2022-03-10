<?php
/* @author: Usiobaifo Kenneth
 * @developer: Usiobaifo Kenneth
 * @year: 2022
 * @rights: Usiobaifo Kenneth
 * */
class Utis
{
    public static $urlLangOmitted;
    public static $uri;
    public static $language;
    public static $currentUrl;

    public static function binder()
    {
        self::setURI();
        self::setUrlLanguage();
        self::getLanguage();
        self::currentUrl();
    }

    private static function setURI()
    {
        self::$uri = explode('/', $_SERVER['REQUEST_URI']);
    }

    private static function currentUrl()
    {
        self::$currentUrl = $_SERVER['REQUEST_URI'];
    }

    //======================SET URL LANGUAGES====================================//
    private static function setUrlLanguage()
    {
        if ((isset(self::$uri[1]) && in_array(self::$uri[1], Config::get('LANGUAGES')))) {
            for ($i = 2; $i < count(self::$uri); $i++) {
                self::$urlLangOmitted .= trim(self::$uri[$i] . DS);
            }
        } else {
            for ($i = 1; $i < count(self::$uri); $i++) {
                self::$urlLangOmitted .= trim(self::$uri[$i] . DS);
            }
        }
    }
    //=======================PAGE REDIRECT=====================================//
    public static function pageRedirect(string $location)
    {
        return @header("Location: $location");
    }
    //=======================GET URL VALUES POSITIONS===============================//
    public static function urlArrayPos(int $number)
    {
        return isset(self::$uri[$number]) ? self::$uri[$number] : '';
    }
    // this is to get the language from the url
    private static function getLanguage()
    {
        if (isset(self::$uri[1]) && in_array(self::$uri[1], Config::get('LANGUAGES'))) {
            self::$language = self::$uri[1];
        } else {
            self::$language = Config::get('DEFAULT_LANGUAGE');
        }
    }
    // this is to check if a world is in the url array
    public static function is_inUrl($wordToCheck1 = null, $wordToCheck2 = null, $thenDo)
    {
        if (in_array(strtolower($wordToCheck1), self::$uri) && in_array(strtolower($wordToCheck2), self::$uri)) {
            echo 'id="' . $thenDo . '"';
        } else {
            return false;
        }
    }

    //=================THIS RETURN THE URL QUERY STRING BEING PASS AS AN AUGUMENT=================//
    public static function urlQueryString(string $QUERY)
    {
        if (isset($_GET[$QUERY])) {
            $strg = $_SERVER['QUERY_STRING'];
            $url = ltrim('?' . $strg, $_SERVER['REQUEST_URI']);
            return $url;
        }
        return false;
    }
    //=============THIS RETURN THE DOMAIN NAME OF THE CURRENT URL========================//
    public static function domainName(string $page)
    {
        $url = explode('/', $_SERVER['SERVER_NAME']);
        $ur = 'www.' . $url[0];
        $page_clean = ltrim($ur, 'wwww.');
        return 'http://www.' . $page . '.' . $page_clean;
    }
}
