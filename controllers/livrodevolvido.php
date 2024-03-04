<?php

class LivroDevolvido extends Controller {

    function __construct() {
        parent::__construct();
        $this->view->js = array('livrodevolvido/devolvido.js');
    }
    
    function index() {
        $this->view->title = 'Livros devolvidos';
		$this->view->render('header');
        $this->view->render('livrodevolvido/index');
		$this->view->render('footer');
    }
    function listaDevolvido(){
        $this->model->listaDevolvido();
    }
}