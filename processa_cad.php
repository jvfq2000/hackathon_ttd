<script src="./js/jquery-3.5.1.min.js"></script>
<link href="./css/bootstrap.min.css" rel="stylesheet">
<?php
session_start();
ob_start();
include_once("conexao.php");

//Receber os dados do formulário
$dados = filter_input_array(INPUT_POST, FILTER_DEFAULT);

//Salvar os dados no bd
$result_markers = "INSERT INTO sensor(descricao, endereco, lat, lng, nivel_son) 
VALUES 
('".$dados['descricao']."', '".$dados['endereco']."', '".$dados['lat']."', '".$dados['lng']."', '".$dados['nivel_son']."')";

$resultado_markers = mysqli_query($conn, $result_markers);
if(mysqli_insert_id($conn)){
	$_SESSION['msg'] = "<div class='alert alert-primary'>Endereço cadastrado com sucesso! 
	<a href='index.html' class='btn btn-outline-primary' role='button'>Verficar Sensores</a>
	</div>";
	header("Location: cadastrar.php");
}else{
	$_SESSION['msg'] = "<div class='alert alert-danger'>Erro: Endereço não foi cadastrado com sucesso!</div>";
	header("Location: cadastrar.php");	
}
?>
<script src="./js/bootstrap.min.js.map"></script>
<script src="./js/bootstrap.min.js"></script>