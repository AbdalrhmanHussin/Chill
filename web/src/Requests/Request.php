<?php 

namespace web\src\Requests;

class Request {
     /**
     * @method get the calling url
     */

    public  function getPath() 
    {
        return explode('?',$_SERVER['REQUEST_URI'])[0] ?? '/';
    }

    /**
     * @method get the calling methd
     */

    public  function getMehtod()
    {
        return strtolower($_SERVER['REQUEST_METHOD']);
    }

    public function input($return) 
    {
        $param = [];
        $arguments = explode('&',$this->getPath()[1]);
        foreach($arguments as $key => $value) {
            $exp = explode('=',$value);
            $param[$exp[0]] = $exp[1];
        }

        if(isset($param[$return]))
            return $param[$return];
        else 
            return false;
    }
}