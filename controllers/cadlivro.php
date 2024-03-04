<?php

class CadLivro extends Controller {

    function __construct() {
        parent::__construct();
        $this->view->js = array('cadlivro/cadlivro.js');
    }
    
    function index() {
        $this->view->title = 'Cadastrar livro';
		$this->view->render('header');
        $this->view->render('cadlivro/index');
		$this->view->render('footer');
    }
    function insert(){
        $this->model->insert();
    }
    function del(){
        $this->model->del();
    }
    function loadData($id){
        $this->model->loadData($id);
    }
    function save(){
        $this->model->save();
    }
    function listaLivro(){
        $this->model->listaLivro();
    }
}