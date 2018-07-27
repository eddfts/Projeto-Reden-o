<?php
include_once 'conexao.php';
//Sql para retornar o ministro do dia 
$query_ministro = " SELECT M.nome_ministro AS ministro ".
                  " ,A.tema_atividade As tema_atividade".
                  " ,NA.nome_nome_atividade AS nome_atividade ".
                  " ,DATE_FORMAT(A.data_atividade, '%d/%m/%Y') AS DataAtividade ".
				  ",C.nome_congregacao AS nome_congregacao".
                  " ,A.status_atividade ".
         		  " FROM tbl_atividade AS A ".
            	" INNER  JOIN tbl_ministro AS M ON M.id_ministro = A.fk_id_ministro ".
            	" INNER JOIN tbl_nome_atividade As NA ON NA.id_nome_atividade = A.fk_id_nome_atividade ".
				" LEFT JOIN  tbl_congregacao As C ON C.id_congregacao = M.fk_id_congregacao ".  
          		" WHERE A.fk_id_evento = {$id_evento}".
		  		" AND M.dia_ministro = 1 "; 

?>