<?php


class Devolver_Model extends Model {
    public function __construct(){
        parent::__construct();
    }

    public function devolver(){        
        $x=file_get_contents('php://input');
        $x=json_decode($x); 
        $codemprestimo = $x->arr->codEmprestimo;
        $codlivro = $x->arr->codLivro;

        $multa = $this->db->select("select
                                        (case
                                            when datediff(now(), e.dataprevistadev)<= 0 then 0
                                            else datediff(now(), e.dataprevistadev) * 20
                                        end) as multa
                                    from
                                        biblioteca.emprestimolivro e
                                    where
                                        e.livro = $codlivro
                                        and e.emprestimo = $codemprestimo");
        
   
        $result = $this->db->insert("biblioteca.devolucao", (array('emprestimo' => $codemprestimo, 'livro' => $codlivro, 'datadevolucao' => date('Y-m-d '), 'multa'=> $multa[0]->multa)) );
        // $codemprestimo = (int)$_GET['id'];
        $msg=array("codigo"=>0, "texto"=>"Erro ao devolver");
            $dados = array('devolvido' => 0);
            $result=$this->db->update('biblioteca.emprestimolivro', $dados, 'emprestimo=' . $codemprestimo);
            if($result){
                $msg=array("codigo"=>1,"texto"=>"Devolução feita com sucesso");
            }
            else{
                $msg=array("codigo"=>0,"texto"=>"Devolução feita com sucesso");
            }
            
        echo(json_encode($msg));
        }
    

    public function pesquisa(){
        $x=file_get_contents('php://input');
        $x=json_decode($x);
        $filtro = empty($x[0]) ? 0 : $x[0]; 
        $result=$this->db->select("select 
        l.titulo, 
        date_format(ee.`data`, '%d/%m/%Y'    ) as data, 
        ee.ra, 
        coalesce(d.multa, 0) as multa,
        case
            when e.devolvido = 1 then 'NÃO DEVOLVIDO'
            else 'DEVOLVIDO'
        end devolver,
        ee.numero as cod,
        l.codigo as codlivro
    from 
        biblioteca.emprestimolivro e 
    join
        biblioteca.livro l on l.codigo  = e.livro 
    join 
        biblioteca.emprestimo ee on ee.numero = e.emprestimo 
    left join 
        biblioteca.devolucao d on ee.numero = d.emprestimo and e.livro = d.livro
       join biblioteca.aluno a on
       a.ra = ee.ra 
        where e.devolvido  = 1
        and a.ra = $filtro");
        $result=json_encode($result);
        echo($result);
    }

    public function listaDevolver(){
        $result=$this->db->select("select 
                                    l.titulo, 
                                    date_format(ee.`data`, '%d/%m/%Y'    ) as data, 
                                    ee.ra, 
                                    coalesce(d.multa, 0) as multa,
                                    case
                                        when e.devolvido = 1 then 'NÃO DEVOLVIDO'
                                        else 'DEVOLVIDO'
                                    end devolver,
                                    ee.numero as cod,
                                    l.codigo as codlivro
                                from 
                                    biblioteca.emprestimolivro e 
                                join
                                    biblioteca.livro l on l.codigo  = e.livro 
                                join 
                                    biblioteca.emprestimo ee on ee.numero = e.emprestimo 
                                left join 
                                    biblioteca.devolucao d on ee.numero = d.emprestimo and e.livro = d.livro");
        $result=json_encode($result);
        echo($result);
}
}
