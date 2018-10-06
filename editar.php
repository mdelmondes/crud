<?php 
   ini_set("display_errors",1);
   ini_set("display_startup_erros",1);
   error_reporting(E_ALL);
?>

<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Update</title>

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

  <?php

    include 'config.php';

   if(!isset($_POST["atualizar"])){
     
      
      	//$id= isset( $_GET[ 'id' ] ) ? $_GET[ 'id' ] : null ;
		$id =$_GET["id"];
		$nome =isset( $_GET[ 'nome' ] ) ? $_GET[ 'nome' ] : null;
		$cpf_cnpj =isset( $_GET[ 'cpf_cnpj' ] ) ? $_GET[ 'cpf_cnpj' ] : null;
		$endereco =isset( $_GET[ 'endereco' ] ) ? $_GET[ 'endereco' ] : null;
		$estado =isset( $_GET[ 'estado' ] ) ? $_GET[ 'estado' ] : null;
		$cidade =isset( $_GET[ 'cidade' ] ) ? $_GET[ 'cidade' ]  : null;
		$telefone =isset( $_GET[ 'telefone' ] ) ? $_GET[ 'telefone' ] : null;
		$celular =isset( $_GET[ 'celular' ] ) ? $_GET[ 'celular' ] : null;
		$divida =isset( $_GET[ 'divida' ] ) ? $_GET[ 'divida' ] : null;
	 }  else {
    
        $id=$_POST["id"];
		$nome =isset( $_POST[ 'nome' ] ) ? $_POST[ 'nome' ]: null;
		$cpf_cnpj =isset( $_POST[ 'cpf_cnpj' ] ) ? $_POST[ 'cpf_cnpj' ] : null;
		$endereco =isset( $_POST[ 'endereco' ] ) ? $_POST[ 'endereco' ] : null;
		$estado =isset( $_POST[ 'estado' ] ) ? $_POST[ 'estado' ] : null;
		$cidade =isset( $_POST[ 'cidade' ] ) ? $_POST[ 'cidade' ] : null;
		$telefone =isset( $_POST[ 'telefone' ] ) ? $_POST[ 'telefone' ] : null;
		$celular =isset( $_POST[ 'celular' ] ) ? $_POST[ 'celular' ] : null;
		$divida =isset( $_POST[ 'divida' ] ) ? $_POST[ 'divida' ] : null;

        $sql="UPDATE clientes SET nome=:nome, cpf_cnpj=:cpf_cnpj, endereco=:endereco, estado=:estado, cidade=:cidade, telefone=:telefone, celular=:celular, divida=:divida WHERE id=:myid";

        $resultado=$base->prepare($sql);

        $resultado->execute(array(
          ':myid'=>$id,
          ':nome'=>$nome,
          ':cpf_cnpj'=>$cpf_cnpj,
          ':endereco'=>$endereco,
          ':estado'=>$estado,
          ':cidade'=>$cidade,
          ':telefone'=>$telefone,
          ':celular'=>$celular,
          ':divida'=>$divida));

        header("Location:index.php");

     }   
   

  ?>

<form name="form1" method="post" action="<?php $_SERVER['PHP_SELF'];   ?>">
  <div class="crud1">
  <table width="45%" border="1" align="center">

    <tr>
      <td></td>
      <td><label for="id"></label>
      <input type="hidden" name="id" id="id" value="<?php echo $id?>"></td>
    </tr>
    <tr>
      <td>Nome</td>
      <td><label for="nome"></label>
      <input type="text" name="nome" id="nome" value="<?php echo $nome?>"></td>
    </tr>
    <tr>
      <td>CPF/CNPJ</td>
      <td><label for="cpf_cnpj"></label>
      <input type="text" name="cpf_cnpj" id="cpf_cnpj" value="<?php echo $cpf_cnpj?>" onfocus="javascript: retirarFormatacao(this);" onblur="javascript: formatarCampo(this);" maxlength="14"></td>
    </tr>
    <tr>
      <td>Endereço</td>
      <td><label for="endereco"></label>
      <input type="text" name="endereco" id="endereco" value="<?php echo $endereco?>"></td>
    </tr>
    <tr>
      <td>Estado</td>
      <td><label for="estado"></label>
      <input type="text" name="estado" id="estado" value="<?php echo $estado?>"></td>
    </tr>
    <tr>
      <td>Cidade</td>
      <td><label for="cidade"></label>
      <input type="text" name="cidade" id="cidade" value="<?php echo $cidade?>"></td>
    </tr>
    <tr>
      <td>Telefone</td>
      <td><label for="telefone"></label>
      <input type="text" name="telefone" id="telefone" value="<?php echo $telefone?>" onkeypress="return mask(event, this, '(##) ####-####')" maxlength="14"></td>
    </tr>
    <tr>
      <td>Celular</td>
      <td><label for="celular"></label>
      <input type="text" name="celular" id="celular" value="<?php echo $celular?>" onkeypress="return maskCel(event, this, '(##) #####-####')" maxlength="15"></td>
    </tr>
    <tr>
      <td>Dívida</td>
      <td><label for="divida"></label>
      <input type="text" name="divida" id="divida" value="<?php echo $divida?>" onKeyPress="return(MascaraMoeda(this,'.',',',event))"></td>
    </tr>
    <tr>
      <td colspan="2"><input type="submit" name="atualizar" id="atualizar" value="Atualizar"></td>
    </tr>
  </table>
</div>
</form>
<p>&nbsp;</p>


</body>
</html>