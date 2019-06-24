<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace App\Model\Entity;

/**
 * Description of Pedido
 *
 * @author celso
 */
class Pedido {
    public $id;
    public $data;
    public $cliente;
    public $funcionario;
    public $itensPedido = [];
}
