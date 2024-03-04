<?php
class Pendentes_Model extends Model {
    public function __construct(){
        parent::__construct();
    }
    public function listaPendente()
    {
        $result=$this->db->select(" select l.titulo, a.nome, e.dataprevistadev from biblioteca.autor a join biblioteca.livro l on a.codigo = l.autor join biblioteca.emprestimolivro e on l.codigo = e.livro where e.devolvido = 0");
        echo(json_encode($result));
    }
}    

