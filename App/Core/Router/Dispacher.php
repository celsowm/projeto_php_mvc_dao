<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace App\Core\Router;

/**
 * Description of Dispacher
 *
 * @author celso
 */
class Dispacher {

    private $request;

    public function dispatch() {
        $this->request = new Request();
        Router::parse($this->request->url, $this->request);

        $controller = $this->loadController();

        call_user_func_array([$controller, $this->request->action], $this->request->params);
    }

    public function loadController() {
        $name = "App/Model/Controller/".
                $this->request->controller . "Controller";
        $controller = new $name();
        return $controller;
    }

}
