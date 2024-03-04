<?php


class LivroDevolvido_Model extends Model {
    public function __construct(){
        parent::__construct();
    }
    public function listaDevolvido()
    {
        $result=$this->db->select("select l.titulo, a.nome, d.datadevolucao, d.multa from biblioteca.emprestimolivro e join biblioteca.devolucao d on d.emprestimo = e.emprestimo join biblioteca.livro l on l.codigo = d.livro  join biblioteca.autor a on l.autor = a.codigo");
        echo(json_encode($result));
    }
}