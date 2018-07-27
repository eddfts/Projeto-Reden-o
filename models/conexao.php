<?PHP
	#Conexão com o banco de dados
	$con = mysqli_connect('onovoisrael.net.br','onovoisr_eduardo','Tsidkenu7!') or die("Erro de conexão");
	$banco = mysqli_select_db($con,'onovoisr_projetoredencao') or die("Erro ao selecionar o banco de dados");

?>