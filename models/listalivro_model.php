<?php

class ListaLivro_Model extends Model {
    public function __construct(){
        parent::__construct();
    }
    public function listaLivro()
    {
        $result=$this->db->select("select l.titulo, a.nome, l.codigo, a.codigo codautor from biblioteca.livro l join biblioteca.autor a on a.codigo =l.autor");
        //var_dump($result);exit;
        echo(json_encode($result));
        //var_dump($result);
    }
}