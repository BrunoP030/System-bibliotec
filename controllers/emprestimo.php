<?php

class Emprestimo extends Controller {

    function __construct() {
        parent::__construct();
        //Auth::autentica();
        $this->view->js = array('emprestimo/emprestimo.js');
    }
    
    function index() {
        $this->view->title = 'Manutenção dos Emprestimos';
		$this->view->render('header');
        $this->view->render('emprestimo/index');
		$this->view->render('footer');
    }
     function addEmp()
    {
        $this->model->insert();
    }
    
	function listaEmp()
    {
        $this->model->listaEmp();
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