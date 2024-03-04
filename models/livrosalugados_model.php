<?php


class LivrosAlugados_Model extends Model {
    public function __construct(){
        parent::__construct();
    }
    public function listaEmprestimo()
    {
        $result=$this->db->select("select
        l.titulo, d.datadevolucao 
    from
        biblioteca.emprestimolivro e
    join biblioteca.devolucao d on
        d.emprestimo = e.emprestimo
        and d.livro = e.livro
    join biblioteca.livro l on
        d.livro = l.codigo
    where
        e.devolvido = 0");
        echo(json_encode($result));
    }
}