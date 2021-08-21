<?php 

namespace web\DataBase;

use PDO;

class sqlManager {
    protected $conn;
    protected $binders = [];
    protected function connection() {
        // $DBserver = $_ENV['DB_SERVER'];
        // $DBuser   = $_ENV['DB_USER'];
        // $DBpassword = $_ENV['DB_PASSWORD'];
        // $DBdatabase = $_ENV['DB_DATABASE'];
        $server = "localhost";
        $username = "abdalrhman";
        $password = "AG616433";
        $dbname   = "zox";

        $conn = new PDO("mysql:host=$server;dbname=$dbname;charset=utf8",$username,$password);

        return $conn;
    }

    public  function where ($arr = []) {
        $this->binders = $arr;
        return $this;
    }

    public function query() {
        $sql = $this->connection();
        $action = $sql->prepare("select * from users");
        $id = 1;
        (COUNT($this->binders) > 0) ? $action->execute($this->binders) : $action->execute();
        $results = $action->fetchAll(PDO::FETCH_ASSOC);
        return $results;
    }

    public function select($return = ['id','name']) {
        $callback = $this->query();
        $results  = [];
        $i = 0;
        foreach($callback as $items) {
            $i++;
            foreach($items as $key => $value) {
               if(in_array($key,['id','name'])) {
                  $results[$i][$key] = $value;
               }
            //    dump($i);
            }
        }
        dd($results);
        return $this->query();
    }

}