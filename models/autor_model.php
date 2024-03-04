<?php


class Autor_Model extends Model {
    public function __construct(){
        parent::__construct();
    }

    public function listaAutor()
    {
        $result=$this->db->select("select codigo,nome from biblioteca.autor");
        echo(json_encode($result));
    }

    public function insert_autor(){
        $x=file_get_contents('php://input');
        $x=json_decode($x);
        $codautor= $x->dados[0];
        $nomeautor= $x->dados[1];

        $result=$this->db->insert('biblioteca.autor', array('codigo'=>$codautor, 'nome'=>$nomeautor));

        if($result){
            $msg=array("codigo"=>1,"texto"=>"Registro inserido com sucesso");
        }
        else{
            $msg=array("codigo"=>0,"texto"=>"Erro ao inserir");
        }
        echo(json_encode($msg));
    }

    public function del_autor(){
        $x=file_get_contents('php://input');
        $x=json_decode($x);
        
        $codautor = $x->codautor;

        $result=$this->db->delete('biblioteca.autor', "codigo= '$codautor'");
        if($result){
            $msg=array("codigo"=>1,"texto"=>"Registro excluido com sucesso");
        }else{
            $msg=array("codigo"=>0,"texto"=>"Erro ao deletar");
        }
        echo(json_encode($msg));
    }

    public function loadData_autor($id){
        $codautor=(int) $id;
        $result=$this->db->select('select codigo,nome from biblioteca.autor where codigo= :cod', array(":cod" =>$codautor));
        $result=json_encode($result);
        echo($result);
    }

    public function save_autor(){
        $x=file_get_contents('php://input');
        $x=json_decode($x);
        $nomeautor=$x->txtnomeautor;
        $codautor=$x->codautor;
        $msg=array("codigo"=>0, "texto"=>"Erro ao atualizar");
        if($codautor>0){
            $dadosSave=array('nome'=>$nomeautor, 'codigo'=>$codautor);
            $result=$this->db->update('biblioteca.autor', $dadosSave,"codigo= '$codautor'");
            if($result){
                $msg=array("codigo"=>1, "texto"=>"Registro atualizado com sucesso");
            }
            else{
                $msg=array("codigo"=>0, "texto"=>"Erro ao atualizar.");
            }
        }
        echo(json_encode($msg));
    }
}