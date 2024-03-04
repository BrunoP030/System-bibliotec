<?php


class CadAluno_Model extends Model {
    public function __construct(){
        parent::__construct();
    }
    public function listaAluno()
    {
        $result=$this->db->select("select nome, ra from biblioteca.aluno");
        echo(json_encode($result));
    }

    public function insert_aluno(){
        $x=file_get_contents('php://input');
        $x=json_decode($x);

        $ra = $x->dados[0];
        $nomealuno = $x->dados[1];

        $result=$this->db->insert('biblioteca.aluno', array('ra'=>$ra, 'nome'=>$nomealuno));
        if($result){
            $msg=array("codigo"=>1,"texto"=>"Registro inserido com sucesso");
        }
        else{
            $msg=array("codigo"=>0,"texto"=>"Erro ao inserir");
        }
        echo(json_encode($msg));
    }

    public function del_aluno(){
        $x=file_get_contents('php://input');
        $x=json_decode($x);

        $ra = $x->ra;

        $result=$this->db->delete('biblioteca.aluno', "ra= '$ra'");
        if($result){
            $msg=array("codigo"=>1,"texto"=>"Registro excluido com sucesso");
        }else{
            $msg=array("codigo"=>0,"texto"=>"Erro ao deletar");
        }
        echo(json_encode($msg));

    }

    public function loadData_aluno($id){
        $ra=(int) $id;
        $result=$this->db->select('select nome,ra from biblioteca.aluno where ra= :ra', array(":ra" =>$ra));
        $result=json_encode($result);
        echo($result);
    }

    public function save_aluno(){
        $x=file_get_contents('php://input');
        $x=json_decode($x);
        $nomealuno=$x->txtnomealuno;
        $ra=$x->ra;
        $msg=array("codigo"=>0, "texto"=>"Erro ao atualizar");
        if($ra>0){
            $dadosSave=array('nome'=>$nomealuno, 'ra'=>$ra);

            $result=$this->db->update('biblioteca.aluno', $dadosSave,"ra= '$ra'");
            if($result){
                $msg=array("codigo"=>1, "texto"=>"Registro atualizado com sucesso");
            }else{
                $msg=array("codigo"=>0, "texto"=>"Erro ao atualizar.");
            }

        }
        echo(json_encode($msg));
    }
}