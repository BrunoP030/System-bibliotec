<?php

class Devolver extends Controller {

    function __construct() {
        parent::__construct();
        $this->view->js = array('devolver/devolver.js');
    }
    
    function index() {
        $this->view->title = 'Devolução';
		$this->view->render('header');
        $this->view->render('devolver/index');
		$this->view->render('footer');
    }
    function devolver(){
        $this->model->devolver();
    }
    function loadData_devolver($id){
        $this->model->loadData_devolver($id);
    }
    function listaDevolver(){
        $this->model->listaDevolver();
    }
    function pesquisa(){
        $this->model->pesquisa();
    }
}