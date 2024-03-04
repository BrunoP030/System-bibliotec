<?php

class Devolucao_Model extends Model {

    public function __construct() {
        parent::__construct();
    }
    
	public function listaDev() 
    {  
        $sql="SELECT
                *
            FROM
                devolucao
            JOIN emprestimolivro ON
                emprestimolivro.emprestimo = devolucao.emprestimo
            JOIN emprestimo ON
                emprestimolivro.emprestimo = emprestimo.numero
            JOIN livro ON
                emprestimolivro.livro = livro.codigo
            JOIN aluno on
                emprestimo.ra = aluno.ra";
        $result=$this->db->select($sql);
		echo(json_encode($result));
    }
	

    public function insert()
    {
        $x=file_get_contents('php://input');
        $x=json_decode($x);
        $numero=$x->txtnum;
        $codlivro=$x->txtcodlivro;
        
        $msg=array("numero"=>1,"texto"=>"Registro não inserido.");
        $multa=$this->db->select("SELECT CASE WHEN (current_date-dataprevistadev)>0 
        THEN (current_date-dataprevistadev)*2 ELSE 0 END AS multa
        FROM biblioteca.emprestimolivro e 
        WHERE e.emprestimo=$numero");
        $result=$this->db->insert('biblioteca.devolucao', 
        array('emprestimo' =>$numero,'datadevolucao'=>date('Y-m-d'),'livro'=>$codlivro,'multa'=>$multa[0]->multa));

        if($result){
            $msg=array("numero"=>1,"texto"=>"Registro inserido com sucesso.");
        }


        echo(json_encode($msg));
    }
	
	public function del() 
    {  
        
		//o numero deve ser um inteiro
        $codemp=(int)$_GET['id'];
        $msg=array("numero"=>0,"texto"=>"Erro ao excluir.");
        $result=$this->db->delete('biblioteca.devolucao',"emprestimo='$codemp'");        
		if($codemp>0){                     
            if($result){
                    $msg=array("numero"=>1,"texto"=>"Registro excluído com sucesso.");
            }
        }
        echo(json_encode($msg));        
	}
	
	public function loadData($id) 
    {  
		//o numero deve ser um inteiro
		$cod=(int)$id;		
         $result=$this->db->select('SELECT * FROM emprestimolivro
                                    JOIN emprestimo ON
                                    emprestimolivro.emprestimo =
                                    emprestimo.numero
                                    JOIN aluno ON
                                    emprestimo.ra =
                                    aluno.ra
                                    JOIN livro ON
                                    emprestimolivro.livro =
                                    livro.codigo
                                    WHERE emprestimo.numero
                                    NOT IN (SELECT emprestimo FROM devolucao)
                                    where numero=:cod',array(":cod"=>$cod));
		$result = json_encode($result);
		echo($result);
	}
	
	
	public function save() 
    {
        $x=file_get_contents('php://input');
        $x=json_decode($x);
        $num=(int)$x->txtnum;
        $codlivro=$x->txtcodlivro;
        $msg=array("numero"=>0,"texto"=>"Erro ao atualizar.");
		if($num>0){
            $dadosSave=array('livro'=>$codlivro);
            
            $result=$this->db->update('biblioteca.devolucao', $dadosSave,"emprestimo='$num'");
            if($result){
                    $msg=array("numero"=>1,"texto"=>"Registro atualizado com sucesso.");
                }
        }
        echo(json_encode($msg));
	   
    }
}