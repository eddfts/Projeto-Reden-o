<?php
#Informaçoes do evento
include_once 'conexao.php';
	
//SQL para procura usuário e senha informados	
$query = " SELECT M.nome_ministro AS ministro ".
                " ,A.tema_atividade As tema_atividade".
                " ,NA.nome_nome_atividade AS nome_atividade ".
                " ,DATE_FORMAT(A.data_atividade, '%d/%m/%Y') AS data_atividade ".
                " ,TIME_FORMAT(E.hora_evento,'%H:%i' ) AS hora_evento ".
                " ,A.status_atividade AS status_atividade ".
                " ,L.nome_local AS nome_local ".
                " ,C.nome_congregacao AS nome_congregacao ".
          " FROM tbl_atividade AS A ".
          " INNER JOIN tbl_evento AS  E ON E.id_evento = A.fk_id_evento ".
          " INNER JOIN tbl_local AS L ON L.id_local = E.local_evento ". 
          " INNER  JOIN tbl_ministro AS M ON M.id_ministro = A.fk_id_ministro ".
          " INNER JOIN tbl_nome_atividade As NA ON NA.id_nome_atividade = A.fk_id_nome_atividade ".
          " LEFT JOIN  tbl_congregacao  AS C ON C.id_congregacao = M.fk_id_congregacao ".
          " WHERE A.fk_id_evento = {$id_evento}".
          /*" AND M.dia_ministro IS NULL".*/
          " ORDER  BY A.status_atividade ASC, A.data_atividade ASC";
?>
