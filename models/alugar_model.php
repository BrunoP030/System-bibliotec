<?php


class Alugar_Model extends Model {
    public function __construct(){
        parent::__construct();
    }
    public function alugar(){
        $x=file_get_contents('php://input');
        $x=json_decode($x);
        $dados = $x->dados;
        $codlivro=$dados[2];
        $ra=$dados[1];
        $data=$dados[0];
        $datadev=$dados[3];

        
        $result = $this->db->insert('biblioteca.emprestimo', array('data'=>$data, 'ra'=>$ra));

        $resultCount=$this->db->select('select 
                                        max(e.numero) as count
                                    from 
                                        biblioteca.emprestimo e');
        $sequence = $resultCount[0]->count;

        $resultteste = $this->db->insert('biblioteca.emprestimolivro', array('emprestimo' => $sequence, 'livro'=>$codlivro, 'dataprevistadev'=>$datadev, 'devolvido'=>1));
        if($result){
            $msg=array("codigo"=>1,"texto"=>"Livro alugado seu codigo de aluguel é: $sequence");
        }
        else{
            $msg=array("codigo"=>0,"texto"=>"Erro ao alugar");
        }
        
        echo(json_encode($msg));
    }
    public function loadData_alugar($id){
        $codlivro=(int) $id;
        $result=$this->db->select('select codigo,titulo,isbn, autor, valor, edicao from biblioteca.livro where codigo= :cod', array(":cod" =>$codlivro));
        $result=json_encode($result);
        echo($result);
    }

    
    public function pesquisaLivro(){
        $x=file_get_contents('php://input');
        $x=json_decode($x);
        $filtro = $x[0];
        // var_dump($filtro);exit;
        $result=$this->db->select("select 
                                        L.codigo,
                                        L.titulo,
                                        concat(A.nome, l.autor) as autor 
                                    from 
                                        biblioteca.livro L
                                    join
                                        biblioteca.autor A on A.codigo = L.autor 
                                    where 
                                        L.titulo like '%" . $filtro . "%'");
        $result=json_encode($result);
        echo($result);
    }
}