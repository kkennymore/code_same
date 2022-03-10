<?php
/* @author: Usiobaifo Kenneth
 * @developer: Usiobaifo Kenneth
 * @year: 2022
 * @rights: Usiobaifo Kenneth
 * */
class Views
{
    public function render(string $viewTemplateFile)
    {
        if (file_exists(VIEW_PATH . $viewTemplateFile)) {
            require(VIEW_PATH . $viewTemplateFile);
        }
    }
    //====view file=============
    public function view_file(string $view_file)
    {
        $viewFile = "";
        $dir_file = VIEW_PATH . ucfirst(strtolower($view_file));
        //ErrorPage: //this will run again to the error page wasn't found
        if (file_exists($dir_file . ".phtml")) {
            $viewFile = $dir_file . ".phtml";
        } else if (file_exists($dir_file . ".php")) {
            $viewFile = $dir_file . ".php";
        } else if (file_exists($dir_file . ".html")) {
            $viewFile = $dir_file .  ".html";
        } else {
            if (!is_dir(VIEW_PATH . "Errors/")) {
                mkdir(VIEW_PATH . "Errors/");
            }
            if (file_exists(VIEW_PATH . "Errors/" . "404.html")) {
                $viewFile = VIEW_PATH . "Errors/" . "404.html";
            } else {
                file_put_contents(VIEW_PATH . "Errors/404.html", "<center><br><br><br><br><h2>The Requested Page Not found</h2></center>");
            }
            $viewFile = VIEW_PATH . ucfirst(strtolower("errors")) . DS . "404.html";
        }
        return $viewFile;
    }
    public function loadAnimate()
    {
        '<script> window.addEventListener("load", function() {'
            . $true = false . '}); </script>';
        if ($true == true) {
            return true;
        } else {
            return false;
        }
    }
}
