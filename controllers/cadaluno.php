<?php

class CadAluno extends Controller {

    function __construct() {
        parent::__construct();
        $this->view->js = array('cadaluno/cadaluno.js');
    }
    
    function index() {
        $this->view->title = 'Cadastrar aluno';
		$this->view->render('header');
        $this->view->render('cadaluno/index');
		$this->view->render('footer');
    }
    function insert_aluno(){
        $this->model->insert_aluno();
    }
    function del_aluno(){
        $this->model->del_aluno();
    }
    function loadData_aluno($id){
        $this->model->loadData_aluno($id);
    }
    function save_aluno(){
        $this->model->save_aluno();
    }

    function listaAluno(){
        $this->model->listaAluno();
    
    }
}