<?php 
include 'acesso_com.php';
include '../conn/connect.php';

if($_POST){ 
    $id = $_POST['id'];
    $login = $_POST['login'];
    $senha = md5($_POST['senha']);
    $nivel = $_POST['nivel'];

$update = "update usuarios
            set login = '$login', senha = '$senha', nivel = '$nivel'  where id = $id;";

$resultado = $conn->query($update);
if($resultado){
    header('location:usuarios_lista.php');
  }
}
if($_GET){
    $id_form = $_GET['id'];
}else{
    $id_form = 0;
}
$lista = $conn->query("select * from usuarios where id = $id_form");
$row = $lista->fetch_assoc();

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/estilo.css">
    <title> Usuario - Insere </title>
</head>
<body>
    <main>
    <?php include "menu_adm.php";?>
    </main class="container">
    <div class="col-xs-12 col-sm-offset-2 col-sm-6  col-md-8">
        <h2 class="breadcrumb text-info">
        <a href="usuarios_lista.php">
                <button class="btn btn-info">
                        <span class="glyphicon glyphicon-chevron-left"></span>
                    </button>
                </a>
                Inserindo Usuarios
        </h2>
        <div class="thumbnail">
            <div  class="alert alert-info" role="alert">
                <form action="usuarios_atualiza.php" method="post"
                    name="form_insere" enctype="multipart/form-data"
                    id="form_insere">
                    <!-- campo id deve permanecer oculto "hidden" -->
                  <input type="hidden" name="id" id="id" value="<?php echo $row['id']; ?>">
                  
                  <label for="Login">Login: </label>
                        <div class="input-group">
                            <span class="input-group-addon">
                            <span class="glyphicon glyphicon-user" aria-hidden="true" ></span>
                            </span>
                            <input type="text" name="login" id="login" class="form-control" autofocus required autocomplete="off" required value="<?php echo $row['login'] ?>">                       
                        </div>

                    <label for="senha">Senha:</label> 
                    <div class="input-group">
                        <span class="input-group-addon">
                                <span class="glyphicon glyphicon-lock" aria-hidden="true"></span>
                        </span>
                           <input type="password" name="senha" id="senha" class="form-control" required autocomplete="off" >
                    </div>  
                    
                    <label for="nivel">Nivel:</label>
                    <div class="input-group">
                          <span class="input-group-addon">
                                <span class="glyphicon glyphicon-tasks" aria-hidden="true"></span>
                        </span>
                        <select name="nivel" id="nivel" class="form-control">
                            <option value="com">Comun</option>
                            <option value="sup">Super</option>
                        </select>
                    </div>
                    <br>
                    <input type="submit" name="atualizar" id="atualizar" class="btn btn-info btn-block" value="Atualizar">       
                    </form>
                </div>
        </div>
    </div>
</body>
</html>