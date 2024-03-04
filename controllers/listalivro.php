<?php

class ListaLIvro extends Controller {

    function __construct() {
        parent::__construct();
        $this->view->js = array('listalivro/listalivro.js');
    }
    
    function index() {
        $this->view->title = 'Lista de livros';
		$this->view->render('header');
        $this->view->render('listalivro/index');
		$this->view->render('footer');
    }
    function listaLivro(){
        $this->model->listaLivro();
    }

    function loadData_livro($id){
        $this->model->loadData_livro($id);
    }
}