<?php 
   ini_set("display_errors",1);
   ini_set("display_startup_erros",1);
   error_reporting(E_ALL);
?>
<?php
   
   include 'config.php';

   $registro=$base->query("SELECT * FROM clientes")->fetchAll(PDO::FETCH_OBJ);

	if(isset($_POST["insert"]))
   {
    
		$nome =isset($_POST['nome']) ? $_POST['nome']:"";
		$cpf_cnpj =isset($_POST['cpf_cnpj'])  ? $_POST['cpf_cnpj']:"";
		$endereco =isset($_POST['endereco']) ? $_POST['endereco']:"";
		$estado =isset($_POST['estado']) ? $_POST['estado']:"";
		$cidade =isset($_POST['cidade']) ? $_POST['cidade']:"";
		$telefone =isset($_POST['telefone']) ? $_POST['telefone']:"";
		$celular =isset($_POST['celular']) ? $_POST['celular']:"";
		$divida =isset($_POST['divida']) ? $_POST['divida']:"";

     $sql = "INSERT INTO clientes (nome, cpf_cnpj, endereco, estado, cidade, telefone, celular, divida) VALUES (:nome, :cpf_cnpj, :endereco, :estado, :cidade, :telefone, :celular, :divida)";

     $resultado=$base->prepare($sql);

     $resultado->execute(array(":nome"=>$nome,":cpf_cnpj"=>$cpf_cnpj,":endereco"=>$endereco,":estado"=>$estado,":cidade"=>$cidade,":telefone"=>$telefone,":celular"=>$celular,":divida"=>$divida));

     header("Location:index.php");


   }


?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8" />
	<title>Revict CRUD</title>
	<link rel="stylesheet" type="text/css" href="css/style.css">
	<script type="text/javascript" src="js/jquery-3.3.1.min.js"></script>
	<script type="text/javascript" src="js/jquery.mask.min.js"></script>
	<script type="text/javascript" src="js/funcoes.js"></script>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
	<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
				
</head>
<body>
	<div id="titulo">
		<h1>Cadastro de Cliente</h1>
	</div>



	<form action="<?php echo $_SERVER['PHP_SELF'];?>" method="POST" onsubmit="return confirmacao()">

	<div class="container">

		<div class="crud">
			<label>Nome:</label>
			<input type="text" name="nome" placeholder="Nome">
			<label>CPF/CNPJ:</label>
			<input type="text" name="cpf_cnpj" id="cpf_cnpj" placeholder="CPF/CNPJ" onfocus="javascript: retirarFormatacao(this);" onblur="javascript: formatarCampo(this);" maxlength="14">
			<label>Endereço:</label>
			<input type="text" name="endereco" placeholder="Endereço">
			<label>Estado:</label>
			<input type="text" name="estado" placeholder="Estado">
			<label>Cidade:</label>
			<input type="text" name="cidade" placeholder="Cidade">
			<label>Telefone:</label>
			<input type="text" name="telefone" placeholder="Telefone" onkeypress="return mask(event, this, '(##) ####-####')" maxlength="14">
			<label>Celular:</label>
			<input type="text" name="celular" placeholder="Celular" onkeypress="return maskCel(event, this, '(##) #####-####')" maxlength="15">
			<label>Dívida:</label>
			<input type="text" name="divida" placeholder="R$ 0.000,00" onKeyPress="return(MascaraMoeda(this,'.',',',event))">

			
			<div class ="b">

				<input type="submit" name="insert" id="insert" value="Inserir">
			
			</div>
		</div>
	</div>
	<div class="table">
		<table width="40%" border="0" align="center">
			<tr>
				<td class="primeira_fila">ID</td>
				<td class="primeira_fila">NOME</td>
				<td class="primeira_fila">CPF/CNPJ</td>
				<td class="primeira_fila">ENDEREÇO</td>
				<td class="primeira_fila">ESTADO</td>
				<td class="primeira_fila">CIDADE</td>
				<td class="primeira_fila">TELEFONE</td>
				<td class="primeira_fila">CELULAR</td>
				<td class="primeira_fila">DÍVIDA</td>
				<td colspan="2" class="primeira_fila">FUNÇÕES</td>
			</tr>

			<?php

				foreach ($registro as $pessoa):
					
			?>

			<tr>
				<td><?php echo $pessoa->id?></td>
				<td><?php echo $pessoa->nome?></td>
				<td><?php echo $pessoa->cpf_cnpj?></td>
				<td><?php echo $pessoa->endereco?></td>
				<td><?php echo $pessoa->estado?></td>
				<td><?php echo $pessoa->cidade?></td>
				<td><?php echo $pessoa->telefone?></td>
				<td><?php echo $pessoa->celular?></td>
				<td>R$ <?php echo $pessoa->divida?></td>



				<td><a href="deletar.php?id=<?php echo $pessoa->id?>" ><input type="button" name="del" id="del" value="Deletar"  class="botao"></a></td>

				<td><a href="editar.php?id=<?php echo $pessoa->id?> & nome=<?php echo $pessoa->nome?> & cpf_cnpj=<?php echo $pessoa->cpf_cnpj?> & endereco=<?php echo $pessoa->endereco?> & estado=<?php echo $pessoa->estado?> & cidade=<?php echo $pessoa->cidade?> & telefone=<?php echo $pessoa->telefone?> & celular=<?php echo $pessoa->celular?> & divida=<?php echo $pessoa->divida?> "><input type="button" name="update" id="update" value="Atualizar" class="botao"></a></td>

				
				

			</tr>
			<?php
				endforeach;
			?>
		</table>
	</div>

</body>
</html>