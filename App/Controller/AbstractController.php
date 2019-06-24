<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace App\Controller;

/**
 * Description of AbstractController
 *
 * @author celso
 */
abstract class AbstractController {

    //put your code here
    protected $vars = [];
    protected $layout = false;

    function set($d) {
        $this->vars = array_merge($this->vars, $d);
    }

    function render($filename) {
        extract($this->vars);
        $controller_name = (new \ReflectionClass($this))->getShortName(); 
        require(ROOT . "App" . DIRECTORY_SEPARATOR . "View" . DIRECTORY_SEPARATOR . ucfirst(str_replace('Controller', '', $controller_name)) . DIRECTORY_SEPARATOR . $filename . '.php');
        /*$content_for_layout = ob_get_clean();

        if ($this->layout == false) {
            $content_for_layout;
        } else {
            require(ROOT . "View/Layout/" . $this->layout . '.php');
        }*/
    }

}
