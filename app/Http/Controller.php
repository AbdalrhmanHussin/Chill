<?php 

namespace app\Http;

class Controller {
    public string $data = 'hello';
    public array  $arr  = [];
    public  function create() 
    {
        $this->arr = [1,2,3,4];
        return $this;
    }

    public function  display() 
    {
       print_r($this->arr);
    }

    public static function set() {
        
    }
}