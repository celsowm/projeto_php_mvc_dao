<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace App\Core\Router;

/**
 * Description of Request
 *
 * @author celso
 */
class Request {

    //put your code here
    public $url;

    public function __construct() {
        $this->url = $_SERVER["REQUEST_URI"];
    }

}
