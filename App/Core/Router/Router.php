<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace App\Core\Router;

/**
 * Description of Router
 *
 * @author celso
 */
class Router {

    static public function parse($url, $request) {
        $url = trim($url);

        if ($url == "/App/") {
            $request->controller = "Editora";
            $request->action = "index";
            $request->params = [];
        } else {
            $explode_url = explode('/', $url);
            $explode_url = array_slice($explode_url, 2);
            $request->controller = ucfirst($explode_url[0]);
            $request->action = $explode_url[1];
            $request->params = array_slice($explode_url, 2);
        }
    }

}
