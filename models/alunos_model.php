<?php

class Alunos_Model extends Model {

    public function __construct() {
        parent::__construct();
    }
    
	public function listaAluno() 
    {  
        $sql="select ra,nome from biblioteca.aluno order by ra";
        $result=$this->db->select($sql);
		echo(json_encode($result));
    }
	

    public function insert() 
    {
        $x=file_get_contents('php://input');
        $x=json_decode($x);
        $ra=$x->txtra;
        $aluno=$x->txtaluno;
        
        $result=$this->db->insert('biblioteca.aluno', array('ra' =>$ra,'nome'=>$aluno));
        if($result){
            $msg=array("ra"=>1,"texto"=>"Registro inserido com sucesso.");
        }
        else{
            $msg=array("ra"=>0,"texto"=>"Erro ao inserir.");
        }
        echo(json_encode($msg));
    }
	
	public function del() 
    {  
        
		//o ra deve ser um inteiro
        $ra=(int)$_GET['id'];
        $msg=array("ra"=>0,"texto"=>"Erro ao excluir.");
		if($ra>0){                     
            $result=$this->db->delete('biblioteca.aluno',"ra='$ra'");
            if($result){
                    $msg=array("ra"=>1,"texto"=>"Registro excluído com sucesso.");
            }
        }
        echo(json_encode($msg));        
	}
	
	public function loadData($id) 
    {  
		//o ra deve ser um inteiro
		$cod=(int)$id;		
         $result=$this->db->select('select ra,nome from biblioteca.aluno where ra=:cod',array(":cod"=>$cod));
		$result = json_encode($result);
		echo($result);
	}
	
	
	public function save() 
    {
        $x=file_get_contents('php://input');
        $x=json_decode($x);
        $ra=(int)$x->txtra;
        $aluno=$x->txtaluno;
        $msg=array("ra"=>0,"texto"=>"Erro ao atualizar.");
		if($ra>0){
                $dadosSave=array('nome'=>$aluno);
                        
            $result=$this->db->update('biblioteca.aluno', $dadosSave,"ra='$ra'");
            if($result){
                    $msg=array("ra"=>1,"texto"=>"Registro atualizado com sucesso.");
                }
        }
        echo(json_encode($msg));
	   
    }
}