<?php

class Autor extends Controller {

    function __construct() {
        parent::__construct();
        $this->view->js = array('autor/autor.js');
    }
    
    function index() {
        $this->view->title = 'Cadastrar autor';
		$this->view->render('header');
        $this->view->render('autor/index');
		$this->view->render('footer');
    }
    function insert_autor(){
        $this->model->insert_autor();
    }
    function del_autor(){
        $this->model->del_autor();
    }
    function loadData_autor($id){
        $this->model->loadData_autor($id);
    }
    function save_autor(){
        $this->model->save_autor();
    }
    function listaAutor(){
        $this->model->listaAutor();
    }
}