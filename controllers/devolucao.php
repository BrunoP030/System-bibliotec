<?php

class Devolucao extends Controller {

    function __construct() {
        parent::__construct();
        //Auth::autentica();
        $this->view->js = array('devolucao/devolucao.js');
    }
    
    function index() {
        $this->view->title = 'Manutenção dos Devolução';
		$this->view->render('header');
        $this->view->render('devolucao/index');
		$this->view->render('footer');
    }
     function addDev()
    {
        $this->model->insert();
    }
    
	function listaDev()
    {
        $this->model->listaDev();
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