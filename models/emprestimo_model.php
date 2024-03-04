<?php

class Emprestimo_Model extends Model
{

    public function __construct()
    {
        parent::__construct();
    }

    public function listaEmp()
    {
        $sql = "SELECT * FROM emprestimolivro
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
            NOT IN (SELECT emprestimo FROM devolucao) order by numero";
        $result = $this->db->select($sql);
        echo (json_encode($result));
    }


    public function insert()
    {
        $x = file_get_contents('php://input');
        $x = json_decode($x);
        $numero = $x->txtnum;
        $date = $x->data;
        $codlivro = $x->txtcodlivro;
        $ra = $x->txtra;

        $msg = array("numero" => 1, "texto" => "Registro não inserido.");

        $result = $this->db->insert(
            'biblioteca.emprestimo',
            array('numero' => $numero, 'data' => date('Y-m-d'), 'ra' => $ra)
        );

        if ($result) {
            $result = $this->db->insert(
                'biblioteca.emprestimolivro',
                array('emprestimo' => $numero, 'livro' => $codlivro, 'dataprevistadev' => $date)
            );
        }

        if ($result) {
            $msg = array("numero" => 1, "texto" => "Registro inserido com sucesso.");
        }


        echo (json_encode($msg));
    }

    public function del()
    {

        //o numero deve ser um inteiro
        $codemp = (int)$_GET['id'];
        $msg = array("numero" => 0, "texto" => "Erro ao excluir.");
        $result = $this->db->delete('biblioteca.emprestimolivro', "emprestimo='$codemp'");
        if ($codemp > 0) {
            $result = $this->db->delete('biblioteca.emprestimo', "numero='$codemp'");
            if ($result) {
                $msg = array("numero" => 1, "texto" => "Registro excluído com sucesso.");
            }
        }
        echo (json_encode($msg));
    }

    public function loadData($id)
    {
        //o numero deve ser um inteiro
        $cod = (int)$id;
        $result = $this->db->select('select * from biblioteca.emprestimo
                                    join emprestimolivro on
                                    emprestimolivro.emprestimo = emprestimo.numero
                                    join livro on
                                    emprestimolivro.livro = livro.codigo
                                     where numero=:cod', array(":cod" => $cod));
        $result = json_encode($result);
        echo ($result);
    }


    public function save()
    {
        $x = file_get_contents('php://input');
        $x = json_decode($x);
        $num = (int)$x->txtnum;
        $date = $x->data;
        $codlivro = $x->txtcodlivro;
        $ra = $x->txtra;
        $msg = array("numero" => 0, "texto" => "Erro ao atualizar.");
        if ($num > 0) {
            $dadosSave = array('ra' => $ra);

            $result = $this->db->update('biblioteca.emprestimo', $dadosSave, "numero='$num'");
            if ($result) {
                $result = $this->db->update(
                    'biblioteca.emprestimolivro',
                    array('emprestimo' => $num, 'livro' => $codlivro, 'dataprevistadev' => $date),
                    "emprestimo='$num'"
                );
                $msg = array("numero" => 1, "texto" => "Registro atualizado com sucesso.");
            }
        }
        echo (json_encode($msg));
    }
}
