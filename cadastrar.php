<?php
session_start();
include_once("conexao.php");
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
	<meta name="viewport" content="initial-scale=1.0, user-scalable=no" />
	<meta http-equiv="content-type" content="text/html; charset=UTF-8"/>
	
	<script src="./js/jquery-3.5.1.min.js"></script>
	
	<link href="./css/bootstrap.min.css" rel="stylesheet">
	
	<title class="title">Grupo TTD - Hackathon Printf</title>
</head>
<body>
	<br>
	<h1 class="text-center h1">Cadastrar Sensores</h1>
	<main role="main" class="accordion" id="accordionExample">
		<div class="shadow-none card-header p-3 mb-5 bg-light rounded mx-auto col-md-7">
			<div class="container">
				<form class="needs-validation" novalidate method="POST" action="processa_cad.php">
					<div class="row">
						<div class="col-md-6 mb-3">
							<label for="descricao">Descrição:</label>
							<input type="text" class="form-control" id="descricao" name="descricao" placeholder="Descrição" required>
							<div class="invalid-feedback">
								Campo obrigátorio!
							</div>
						</div>
						<div class="col-md-6 mb-3">
							<label for="endereco">Endereço:</label>
							<input type="text" class="form-control" required id="endereco" name="endereco" placeholder="Digite o número e o Logradouro">
							<div class="invalid-feedback">
								Campo obrigátorio!
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-md-6 mb-3">
							<label for="lat">Latitude:</label>
							<input type="text" class="form-control" required id="lat" name="lat" placeholder="Digite a latitude">
							<div class="invalid-feedback">
								Campo obrigátorio!
							</div>
						</div>
						<div class="col-md-6 mb-3">
							<label for="lng">Longitude: </label>
							<input type="text" class="form-control" required id="lng" name="lng" placeholder="Digite a longitude">
							<div class="invalid-feedback">
								Campo obrigátorio!
							</div>
						</div>	
					</div>
					<label for="nivel_son">Nível de Poluição Sonora:</label>
					<div class="form-group">
						<select class="custom-select" required id="nivel_son" name="nivel_son" placeholder="1: Baixo, 2: Médio, 3: Alto">
							<option value="">Selecione o nivel de poluição sonora</option>
							<option value="1">Baixo</option>
							<option value="2">Médio</option>
							<option value="3">Alto</option>
						</select>
						<div class="invalid-feedback">
							Campo obrigátorio!
						</div>
					</div>
					
					<?php
					if(isset($_SESSION['msg'])){
						echo $_SESSION['msg'];
						unset($_SESSION['msg']);
					}
					?>
					<hr class="my-4">
					<div class="row">
						<div class="col-md-6 mb-1">
							<button type="submit" class="btn btn-outline-primary bg-lg col-12" value="Cadastrar">Cadastrar</button>
						</div>
						<div class="col-md-6 mb-1">
							<a class="btn btn-outline-danger bg-lg col-12" href="index.html" role="button">Voltar</a>	
						</div>
					</div>	
				</form>
			</div>
		</div>
	</main>
	<script src="./js/bootstrap.min.js.map"></script>
	<script src="./js/bootstrap.min.js"></script>
	<script src="./js/validar.js"></script>
</body>
</html>