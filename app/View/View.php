<?php 

namespace app\View;

use web\Error\error;

class View {

    public static function render($view)
    {
       ob_start();
       include view_bath() . 'app.blade.php';
       return ob_get_clean();
    }

    public static function content($view)
    {
        if(str_contains($view,'.')) {
            $view = str_replace('.','/',$view);
        } 
        if(file_exists(view_bath().$view.'.blade.php')) 
        {
            $viewTempelate =  view_bath().$view.'.blade.php';
        } else return error::abort('404');

        ob_start();
        include $viewTempelate;
        return ob_get_clean();
    }

    public static function make($view,$param = []) 
    {
        $extention = self::render($view);
        $viewGet   = self::content($view);
        $template  = str_replace('{{content}}', $viewGet, $extention);
        echo $template;

    }
}