<?php
/* @author: Usiobaifo Kenneth
 * @developer: Usiobaifo Kenneth
 * @year: 2022
 * @rights: Usiobaifo Kenneth
 * */
class FontsLoader
{
    public static function getFonts()
    {
        if (!is_dir(ROOT . DS . Config::get('FONTS_FOLDER') . DS)) {
            mkdir(ROOT . DS . Config::get('FONTS_FOLDER') . DS);
        }
        echo '
<style>';
        foreach (scandir(ROOT . DS . Config::get('FONTS_FOLDER')) as $files) {
            $file_ext = pathinfo($files, PATHINFO_EXTENSION);
            $file_name = pathinfo($files, PATHINFO_FILENAME);
            if ($file_ext == 'eot' || $file_ext == 'woff' || $file_ext == 'woff2' || $file_ext == 'ttf' || $file_ext == 'otf') {
                echo '
    @font-face {
        font-family: "' . $file_name .'"' . ';';
 echo '
        src: url(';
 echo "'".DS . Config::get('FONTS_FOLDER') . DS . $file_name . '.' . $file_ext."'";
 echo ')';
 if ($file_ext == 'eot') {
                    echo 'format("eot");
    }';
                }
                if ($file_ext == 'woff') {
                    echo 'format("woff");
    }';
                }
                if ($file_ext == 'woff2') {
                    echo 'format("woff2");
    }';
                }
                if ($file_ext == 'otf') {
                    echo 'format("opentype");
    }';
                }
                if ($file_ext == 'ttf') {
                    echo 'format("truetype");
    }';
                }
            }
        }
        echo '
</style>';
    }
}

