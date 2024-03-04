<?php

class Alugar extends Controller {

    function __construct() {
        parent::__construct();
        $this->view->js = array('alugar/aluguel.js');
    }
    
    function index() {
        $this->view->title = 'Alugar livro';
		$this->view->render('header');
        $this->view->render('alugar/index');
		$this->view->render('footer');
    }
    function alugar(){
        $this->model->alugar();
    }
    function loadData_alugar($id){
        $this->model->loadData_alugar($id);
    }
    
    function pesquisaLivro(){
        $this->model->pesquisaLivro();
    }
}