<?php
#Informaçoes do evento
include_once 'conexao.php';
	
//SQL para procura usuário e senha informados	
$query = "SELECT E.id_evento As id_evento ".
         " ,E.tema_evento As tema_evento ".
         " ,DATE_FORMAT(E.data_evento, '%d/%m/%Y') AS Data ".
         " ,E.hora_evento As hora_evento ".
         " ,L.nome_local As nome_local ".
         " ,E.banner_evento As banner_evento ".
		 " ,E.status_evento As status_evento ".
         /*" ,CASE E.status_evento WHEN 0 THEN 'Acontecendo' ".
                             " ELSE 'Concluido' ".
                             " END AS status_evento ".*/
         " FROM onovoisr_projetoredencao.tbl_evento AS E ".
         " INNER JOIN tbl_local AS L ON  L.id_local = E.local_evento ".
         " WHERE E.id_evento limit 1 ";

//print $query;
/*$sql = mysqli_query($con,$query) or die("Erro");
$linhas = mysqli_num_rows($sql);
if($linhas == '')
	{
		?>
        <div class="msg2 padding20">Usuário não encontrado ou usuário e senha inválidos.</div>
        <?PHP
	}
else
	{
		while($dados=mysqli_fetch_assoc($sql))
			{
				print  $dados['id_evento'];
				print  $dados['tema_evento'];
				print  $dados['Data'];
				print  $dados['hora_evento'];
				print  $dados['nome_local'];
				print  $dados['banner_evento'];
				print  $dados['status_evento'];
				
				
				
			}
	}
*/

?>
