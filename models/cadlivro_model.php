<?php


class CadLivro_Model extends Model {
    public function __construct(){
        parent::__construct();
    }
    public function listaLivro()
    {
        $result=$this->db->select("select l.titulo, a.nome from biblioteca.livro l join biblioteca.autor a on a.codigo =l.autor");
        echo(json_encode($result));
  
    }
    public function insert(){
        $x=file_get_contents('php://input');
        $x=json_decode($x);
        $isbn=$x->dados[2];
        $nomelivro=$x->dados[1];
        $codlivro=$x->dados[0];
        $edicao=$x->dados[3];
        $codautor=$x->dados[4];
        $preco=$x->dados[5];

        $result=$this->db->insert('biblioteca.livro', array('codigo'=>$codlivro, 'titulo'=>$nomelivro, 'edicao'=>$edicao, 'isbn'=>$isbn, 'valor'=>$preco));
        if($result){
            $msg=array("codigo"=>1,"texto"=>"Registro inserido com sucesso");
        }
        else{
            $msg=array("codigo"=>0,"texto"=>"Erro ao inserir");
        }
        echo(json_encode($msg));
    }
    public function del(){
        $post=json_decode(file_get_contents("php://input"));
        $codlivro=$post->codlivro;
        $msg=array("codigo"=>0, "texto"=>"Erro ao excluir");
        if($codlivro>0){
            $result=$this->db->delete('biblioteca.livro', "codigo= '$codlivro'");
            if($result){
                $msg=array("codigo"=>1,"texto"=>"Registro excluido com sucesso");
            }
        }
        echo(json_encode($msg));
    }
    public function loadData($id){
        $codlivro=(int) $id;
        $result=$this->db->select('select codigo,titulo,isbn, autor, valor, edicao from biblioteca.livro where codigo= :cod', array(":cod" =>$codlivro));
        $result=json_encode($result);
        echo($result);
    }
    public function save(){
        $x=file_get_contents('php://input');
        $x=json_decode($x);
        $isbn=$x->isbn;
        $nomelivro=$x->nomelivro;
        $codlivro=$x->codlivro;
        $edicao=$x->edicao;
        $codautor=$x->codautor;
        $preco=$x->valor;
        $msg=array("codigo"=>1, "texto"=>"Registro atualizado com sucesso!");
        if($codlivro>0){
            $dadosSave=array('titulo'=>$nomelivro, 'isbn'=>$isbn, 'edicao'=>$edicao, 'autor'=>$codautor, 'valor'=>$preco);
            $result=$this->db->update('biblioteca.livro', $dadosSave,"codigo= '$codlivro'");
            if($result){
                $msg=array("codigo"=>0, "texto"=>"Erro ao registrar");
            }
        }
        echo(json_encode($msg));
    }
}