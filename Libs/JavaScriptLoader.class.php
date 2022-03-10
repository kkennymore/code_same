<?php
/* @author: Usiobaifo Kenneth
 * @developer: Usiobaifo Kenneth
 * @year: 2022
 * @rights: Usiobaifo Kenneth
 * */
class JavaScriptLoader
{
    ///*******************LOAD DEFAULT JAVASCRIPT************************/
    public static function loadDefaultJavaScript()
    {
        if (!is_dir(ROOT . DS . Config::get('DEFAULT_JAVASCRIPT') . DS)) {
            mkdir(ROOT . DS . Config::get('DEFAULT_JAVASCRIPT') . DS);
        }
        foreach (scandir(ROOT . DS . Config::get('DEFAULT_JAVASCRIPT')) as $files) {
            $file_ext = pathinfo($files, PATHINFO_EXTENSION);
            $file_name = pathinfo($files, PATHINFO_FILENAME);
            if ($file_ext == 'js') {
                echo '
    <script src="' . DS . Config::get('DEFAULT_JAVASCRIPT') . DS . $file_name . '.' . $file_ext . '"></script>
    ';
            }
        }
    }

    ///*******************LOAD FRONTEND JAVASCRIPT************************/
    public static function loadFrontEndJavaScript()
    {
        if (!is_dir(ROOT . DS . Config::get('FRONTEND_JAVASCRIPT') . DS)) {
            mkdir(ROOT . DS . Config::get('FRONTEND_JAVASCRIPT') . DS);
        }
        foreach (scandir(ROOT . DS . Config::get('FRONTEND_JAVASCRIPT')) as $files) {
            $file_ext = pathinfo($files, PATHINFO_EXTENSION);
            $file_name = pathinfo($files, PATHINFO_FILENAME);
            if ($file_ext == 'js') {
                echo '
    <script src="' . DS . Config::get('FRONTEND_JAVASCRIPT') . DS . $file_name . '.' . $file_ext . '"></script>
    ';
            }
        }
    }

    ///*******************LOAD FRONTEND JAVASCRIPT************************/
    public static function loadBackEndJavaScript()
    {
        if (!is_dir(ROOT . DS . Config::get('BACKEND_JAVASCRIPT') . DS)) {
            mkdir(ROOT . DS . Config::get('BACKEND_JAVASCRIPT') . DS);
        }
        foreach (scandir(ROOT . DS . Config::get('BACKEND_JAVASCRIPT')) as $files) {
            $file_ext = pathinfo($files, PATHINFO_EXTENSION);
            $file_name = pathinfo($files, PATHINFO_FILENAME);
            if ($file_ext == 'js') {
                echo '
    <script src="' . DS . Config::get('BACKEND_JAVASCRIPT') . DS . $file_name . '.' . $file_ext . '"></script>
    ';
            }
        }
    }

    ///*******************LOAD MERCHANT JAVASCRIPT************************/
    public static function loadMerchantJavaScript()
    {
        if (!is_dir(ROOT . DS . Config::get('MERCHANT_JAVASCRIPT') . DS)) {
            mkdir(ROOT . DS . Config::get('MERCHANT_JAVASCRIPT') . DS);
        }
        foreach (scandir(ROOT . DS . Config::get('MERCHANT_JAVASCRIPT')) as $files) {
            $file_ext = pathinfo($files, PATHINFO_EXTENSION);
            $file_name = pathinfo($files, PATHINFO_FILENAME);
            if ($file_ext == 'js') {
                echo '
    <script src="' . DS . Config::get('MERCHANT_JAVASCRIPT') . DS . $file_name . '.' . $file_ext . '"></script>
    ';
            }
        }
    }
    ///*******************LOAD FRAMEWORK JAVASCRIPT************************/
    public static function loadFrameworkJavaScript()
    {
        if (!is_dir(ROOT . DS . Config::get('FRAMEWORK_JAVASCRIPT') . DS)) {
            mkdir(ROOT . DS . Config::get('FRAMEWORK_JAVASCRIPT') . DS);
        }
        foreach (scandir(ROOT . DS . Config::get('FRAMEWORK_JAVASCRIPT')) as $files) {
            $file_ext = pathinfo($files, PATHINFO_EXTENSION);
            $file_name = pathinfo($files, PATHINFO_FILENAME);
            if ($file_ext == 'js') {
                echo '
    <script src="' . DS . Config::get('FRAMEWORK_JAVASCRIPT') . DS . $file_name . '.' . $file_ext . '"></script>
    ';
            }
        }
    }
    ///*******************LOAD COMPACTIBILITY JAVASCRIPT************************/
    public static function loadJavaScriptBrowserCompact()
    {
        if (!is_dir(ROOT . DS . Config::get('COMPACTIBILITY_JAVASCRIPT') . DS)) {
            mkdir(ROOT . DS . Config::get('COMPACTIBILITY_JAVASCRIPT') . DS);
        }
        foreach (scandir(ROOT . DS . Config::get('COMPACTIBILITY_JAVASCRIPT')) as $files) {
            $file_ext = pathinfo($files, PATHINFO_EXTENSION);
            $file_name = pathinfo($files, PATHINFO_FILENAME);
            if ($file_ext == 'js') {
                echo '
    <script src="' . DS . Config::get('COMPACTIBILITY_JAVASCRIPT') . DS . $file_name . '.' . $file_ext . '"></script>
    ';
            }
        }
    }
    ///*******************LOAD ADMIN JAVASCRIPT************************/
    public static function loadAdminJavaScript()
    {
        if (!is_dir(ROOT . DS . Config::get('ADMIN_JAVASCRIPT') . DS)) {
            mkdir(ROOT . DS . Config::get('ADMIN_JAVASCRIPT') . DS);
        }
        foreach (scandir(ROOT . DS . Config::get('ADMIN_JAVASCRIPT')) as $files) {
            $file_ext = pathinfo($files, PATHINFO_EXTENSION);
            $file_name = pathinfo($files, PATHINFO_FILENAME);
            if ($file_ext == 'js') {
                echo '
    <script src="' . DS . Config::get('ADMIN_JAVASCRIPT') . DS . $file_name . '.' . $file_ext . '"></script>
    ';
            }
        }
    }
}
