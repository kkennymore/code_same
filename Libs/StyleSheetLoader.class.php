<?php
/* @author: Usiobaifo Kenneth
 * @developer: Usiobaifo Kenneth
 * @year: 2022
 * @rights: Usiobaifo Kenneth
 * */
class StyleSheetLoader
{
    // /****************************DYNAMICALLY LOAD DEFAULT STYLESHEET TO PAGE************************/
    public static function loadDefaultStyle()
    {
        if (!is_dir(ROOT . DS . Config::get('DEFAULT_STYLE') . DS)) {
            mkdir(ROOT . DS . Config::get('DEFAULT_STYLE') . DS);
        }
        foreach (scandir(ROOT . DS . Config::get('DEFAULT_STYLE') . DS) as $files) {
            $file_ext = pathinfo($files, PATHINFO_EXTENSION);
            $file_name = pathinfo($files, PATHINFO_FILENAME);
            if ($file_ext == 'css' || $file_ext == 'scss') {
                echo '
    <link  rel="stylesheet" href="' . DS . Config::get('DEFAULT_STYLE') . DS . $file_name . '.' . $file_ext . '">
    ';
            }
        }
    }
    // /****************************DYNAMICALLY LOAD FRONTEND STYLESHEET TO PAGE************************/
    public static function loadFrontEndStyle()
    {
        if (!is_dir(ROOT . DS . Config::get('FRONTEND_STYLE') . DS)) {
            mkdir(ROOT . DS . Config::get('FRONTEND_STYLE') . DS);
        }
        foreach (scandir(ROOT . DS . Config::get('FRONTEND_STYLE') . DS) as $files) {
            $file_ext = pathinfo($files, PATHINFO_EXTENSION);
            $file_name = pathinfo($files, PATHINFO_FILENAME);
            if ($file_ext == 'css' || $file_ext == 'scss') {
                echo '
    <link  rel="stylesheet" href="' . DS . Config::get('FRONTEND_STYLE') . DS . $file_name . '.' . $file_ext . '">
    ';
            }
        }
    }

    // /****************************DYNAMICALLY LOAD BACKEND STYLESHEET TO PAGE************************/
    public static function loadBackEndStyle()
    {
        if (!is_dir(ROOT . DS . Config::get('BACKEND_STYLE') . DS)) {
            mkdir(ROOT . DS . Config::get('BACKEND_STYLE') . DS);
        }
        foreach (scandir(ROOT . DS . Config::get('BACKEND_STYLE') . DS) as $files) {
            $file_ext = pathinfo($files, PATHINFO_EXTENSION);
            $file_name = pathinfo($files, PATHINFO_FILENAME);
            if (
                $file_ext == 'css' || $file_ext == 'scss'
            ) {
                echo '
    <link  rel="stylesheet" href="' . DS . Config::get('BACKEND_STYLE') . DS . $file_name . '.' . $file_ext . '">
    ';
            }
        }
    }
    // /****************************DYNAMICALLY MERCHANTS DASHBOARD STYLESHEET TO PAGE************************/
    public static function loadMerchantStyle()
    {
        if (!is_dir(ROOT . DS . Config::get('MERCHANT_STYLE') . DS)) {
            mkdir(ROOT . DS . Config::get('MERCHANT_STYLE') . DS);
        }
        foreach (scandir(ROOT . DS . Config::get('MERCHANT_STYLE') . DS) as $files) {
            $file_ext = pathinfo($files, PATHINFO_EXTENSION);
            $file_name = pathinfo($files, PATHINFO_FILENAME);
            if (
                $file_ext == 'css' || $file_ext == 'scss'
            ) {
                echo '
    <link  rel="stylesheet" href="' . DS . Config::get('MERCHANT_STYLE') . DS . $file_name . '.' . $file_ext . '">
    ';
            }
        }
    }

    ///****************************DYNAMICALLY FRAMEWORK STYLESHEET TO PAGE************************/
    public static function loadFrameworkStyle()
    {
        if (!is_dir(ROOT . DS . Config::get('FRAMEWORK_STYLE') . DS)) {
            mkdir(ROOT . DS . Config::get('FRAMEWORK_STYLE') . DS);
        }
        foreach (scandir(ROOT . DS . Config::get('FRAMEWORK_STYLE') . DS) as $files) {
            $file_ext = pathinfo($files, PATHINFO_EXTENSION);
            $file_name = pathinfo($files, PATHINFO_FILENAME);
            if ($file_ext == 'css' || $file_ext == 'scss') {
                echo '
    <link  rel="stylesheet" href="' . DS . Config::get('FRAMEWORK_STYLE') . DS . $file_name . '.' . $file_ext . '">
    ';
            }
        }
    }

    ///*******************LOAD COMPACTIBILITY STYLE************************/
    public static function loadStyleBrowserCompact()
    {
        if (!is_dir(ROOT . DS . Config::get('COMPACTIBILITY_STYLE') . DS)) {
            mkdir(ROOT . DS . Config::get('COMPACTIBILITY_STYLE') . DS);
        }
        foreach (scandir(ROOT . DS . Config::get('COMPACTIBILITY_STYLE')) as $files) {
            $file_ext = pathinfo($files, PATHINFO_EXTENSION);
            $file_name = pathinfo($files, PATHINFO_FILENAME);
            if ($file_ext == 'css' || $file_ext == 'scss') {
                echo '
    <link  rel="stylesheet" href="' . DS . Config::get('COMPACTIBILITY_STYLE') . DS . $file_name . '.' . $file_ext . '">
    ';
            }
        }
    }

    ///*******************LOAD ADMIN STYLE************************/
    public static function loadAdminStyle()
    {
        if (!is_dir(ROOT . DS . Config::get('ADMIN_STYLE') . DS)) {
            mkdir(ROOT . DS . Config::get('ADMIN_STYLE') . DS);
        }
        foreach (scandir(ROOT . DS . Config::get('ADMIN_STYLE')) as $files) {
            $file_ext = pathinfo($files, PATHINFO_EXTENSION);
            $file_name = pathinfo($files, PATHINFO_FILENAME);
            if ($file_ext == 'css' || $file_ext == 'scss') {
                echo '
    <link  rel="stylesheet" href="' . DS . Config::get('ADMIN_STYLE') . DS . $file_name . '.' . $file_ext . '">
    ';
            }
        }
    }
}
