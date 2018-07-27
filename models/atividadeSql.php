<?php
#Informaçoes do evento
include_once 'conexao.php';
	
//SQL para procura usuário e senha informados	
$query = " SELECT M.nome_ministro AS ministro ".
                " ,A.tema_atividade As tema_atividade".
                " ,NA.nome_nome_atividade AS nome_atividade ".
                " ,DATE_FORMAT(A.data_atividade, '%d/%m/%Y') AS DataAtividade ".
                " ,A.status_atividade ".
          " FROM tbl_atividade AS A ".
            " INNER  JOIN tbl_ministro AS M ON M.id_ministro = A.fk_id_ministro ".
            " INNER JOIN tbl_nome_atividade As NA ON NA.id_nome_atividade = A.fk_id_nome_atividade ".
          " WHERE A.fk_id_evento = {$id_evento}";
?>
