<?php

class Pendentes extends Controller {

    function __construct() {
        parent::__construct();
        $this->view->js = array('pendentes/pendentes.js');
    }
    
    function index() {
        $this->view->title = 'Alugueis pendentes';
		$this->view->render('header');
        $this->view->render('pendentes/index');
		$this->view->render('footer');
    }
    function listaPendente(){
        $this->model->listaPendente();
    }
}