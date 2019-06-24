<?php

namespace App\Controller;

use App\Model\Dao\EditoraDao;
/**
 * Description of EditoraController
 *
 * @author celso
 */
class EditoraController extends AbstractController {
    //put your code here
    public function index(){
        $dao = new EditoraDao();
        $editoras = $dao->recuperar();
        $this->set(compact('editoras'));
    }
}
