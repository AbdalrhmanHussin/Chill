<?php 

namespace app\Http;

use app\View\View;

class HomeController {
    public function index() {
        return View::make('Public.home',[
            'name' => 'abdalrhman'
        ]);
    }
}