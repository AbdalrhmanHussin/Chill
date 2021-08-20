<?php 

namespace web\Config;

use app\Http\HomeController;
use web\Error\error;
use web\src\Requests\Request;

class Route {

    static $route = [];
    protected Request $request;


    /**
     * @param path route
     * @param controller action on route
     */

    public function __construct($request)
    {
        $this->request = $request;
    }

    public static function get($path,$controller) 
    {
        self::$route['get'][$path] = $controller;
    }

    public static function post($path,$controller) 
    {
        self::$route['post'][$path] = $controller;
    }
   
    public  function resolve(error $error)
    {
        if(isset(self::$route[$this->request->getMehtod()][$this->request->getPath()])) {
            $action = self::$route[$this->request->getMehtod()][$this->request->getPath()];
        } else {
            return $error->abort('404');
        }
        if(is_callable($action)) {
            return call_user_func_array($action, []);
        } else {
            return call_user_func_array([new $action[0], $action[1]], []);;
        }
    }



}