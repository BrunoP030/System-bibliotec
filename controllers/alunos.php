<?php

class Alunos extends Controller {

    function __construct() {
        parent::__construct();
        //Auth::autentica();
        $this->view->js = array('alunos/alunos.js');
    }
    
    function index() {
        $this->view->title = 'Manutenção dos Alunos';
		$this->view->render('header');
        $this->view->render('alunos/index');
		$this->view->render('footer');
    }
     function addAluno()
    {
        $this->model->insert();
    }
    
	function listaAluno()
    {
        $this->model->listaAluno();
    }
	
	function del()
    {
        $this->model->del();
    }
	
	
	function loadData($id)
    {
        $this->model->loadData($id);
    }
	
	function save()
    {
        $this->model->save();
    }
}