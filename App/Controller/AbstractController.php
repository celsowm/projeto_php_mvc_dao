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
class AbstractController {

    //put your code here
    protected $vars = [];
    protected $layout = "default";

    function set($d) {
        $this->vars = array_merge($this->vars, $d);
    }

    function render($filename) {
        extract($this->vars);
        ob_start();
        require(ROOT . "View/" . ucfirst(str_replace('Controller', '', get_class($this))) . '/' . $filename . '.php');
        $content_for_layout = ob_get_clean();

        if ($this->layout == false) {
            $content_for_layout;
        } else {
            require(ROOT . "View/Layout/" . $this->layout . '.php');
        }
    }

}
