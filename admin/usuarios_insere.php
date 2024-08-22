<?php 
include 'acesso_com.php';
include '../conn/connect.php';

// criar a estrutura da tabela 
if($_POST){
$login = $_POST['login'];
$senha = md5($_POST['senha']);
$nivel = $_POST['nivel'];
$insereUsuario = "insert Usuarios
    (login, senha, nivel) 
    values
    ('$login', '$senha', '$nivel')
    ";
    $resultado = $conn ->query($insereUsuario);
    if(mysqli_insert_id($conn)){
        header('location:usuarios_lista.php');
    }
}
// selecionar a lista de tipos para preencher o <select>
$listaTipo = $conn->query("select * from usuarios");
$rowTipo = $listaTipo->fetch_assoc();
$numLinhas = $listaTipo->num_rows;

?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <script src="https://kit.fontawesome.com/2495680ceb.js" crossorigin="anonymous"></script>
    <!-- Link para CSS específico -->
    <link rel="stylesheet" href="../css/estilo.css" type="text/css">
   
    <title> Usuario - Insere</title>
</head>
<body>
    <?php include "menu_adm.php";?> 
    <main>
        <div class="row">
            <div class="col-xs-12 col-sm-offset-2 col-sm-6  col-md-8">
                <h2 class="breadcrumb text-info">
                <a href="usuarios_lista.php">
                        <button class="btn btn-info">
                        <span class="glyphicon glyphicon-chevron-left"></span>
                        </button>
                        Inserindo Usuarios
                    </a>
                </h2>
                <div class="thumbnail">
                    <div class="alert alert-info" role="alert">
                        <form action="usuarios_insere.php" method="post"
                        name="form_insere" enctype="multipart/form-data"
                        id="form_insere">
                        <label for="Login">Login: </label>
                        <div class="input-group">
                            <span class="input-group-addon">
                            <span class="glyphicon glyphicon-user" aria-hidden="true" ></span>
                            </span>
                            <input type="text" name="login" id="login" class="form-control" autofocus required autocomplete="off" placeholder="Digite seu login.">                       
                        </div>
                    <label for="senha">Senha:</label> 
                    <div class="input-group">
                        <span class="input-group-addon">
                                <span class="glyphicon glyphicon-lock" aria-hidden="true"></span>
                        </span>
                           <input type="password" name="senha" id="senha" class="form-control" required autocomplete="off" placeholder="Digite sua senha.">
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
                        <input type="submit" name="enviar" id="enviar" class="btn btn-info btn-block" value="Cadastrar">               
                        </form>
                </div>
            </div>
        </div>
    </main>
</body>
</html>

