<?php

class LivrosAlugados extends Controller {

    function __construct() {
        parent::__construct();
        $this->view->js = array('livrosalugados/alugados.js');
    }
    
    function index() {
        $this->view->title = 'Livros alugados';
		$this->view->render('header');
        $this->view->render('livrosalugados/index');
		$this->view->render('footer');
    }
    function listaEmprestimo(){
        $this->model->listaEmprestimo();
    }
}