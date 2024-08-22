<?php 
include 'acesso_com.php';
include '../conn/connect.php';

if($_POST){ 
    $id = $_POST['id'];
    $sigla = $_POST['sigla'];
    $rotulo = $_POST['rotulo'];

$update = "update tipos
            set sigla = '$sigla',
            rotulo = '$rotulo'
            where id = $id;";

$resultado = $conn->query($update);
if($resultado){
    header('location:tipos_lista.php');
  }
}
if($_GET){
    $id_form = $_GET['id'];
}else{
    $id_form = 0;
}
$lista = $conn->query("select * from tipos where id = $id_form");
$row = $lista->fetch_assoc();
// selecionar a lista de tipos para preencher o <select>

?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/estilo.css">
    <title>Tipo - Insere </title>
</head>
<body>
    <?php include "menu_adm.php";?>
    <main class="container">
        <div class="col-xs-12 col-sm-offset-2 col-sm-6  col-md-8">
            <h2 class="breadcrumb text-warning">
                <a href="tipos_lista.php">
                <button class="btn btn-warning">
                        <span class="glyphicon glyphicon-chevron-left"></span>
                    </button>
                </a>
                Inserindo Tipos
            </h2>
            <div class="thumbnail">
                <div class="alert alert-warning" role="alert">
                    <form action="tipos_atualiza.php" method="post"
                    name="form_insere" enctype="multipart/form-data"
                    id="form_insere">
                  <!-- campo id deve permanecer oculto "hidden" -->
                  <input type="hidden" name="id" id="id" value="<?php echo $row['id']; ?>">

                  <label for="Sigla">Sigla:</label>
                        <div class="input-group"> 
                            <span class="input-group-addon">
                          <span class="	glyphicon glyphicon-th-list" aria-hidden="true" ></span>
                        </span>
                        <input type="text" name="sigla" id="sigla"
                        class="form-control" placeholder="Digite a sigla do tipo"
                         maxlength="100" required value="<?php echo $row['sigla'] ?>">
        
                        </div>
                        <label for="rotulo">Rotulo:</label>    
                        <div class="input-group">
                           <span class="input-group-addon">
                                <span class="glyphicon glyphicon-list-alt" aria-hidden="true"></span>
                           </span>
                           <input type="text" name="rotulo" id="rotulo"
                            class="form-control" placeholder="Digite rotulo do tipo"
                            maxlength="100" required value="<?php echo $row['rotulo'] ?>">
                        </div>                     
                        <br>

                        <input type="submit" name="atualizar" id="atualizar" class="btn btn-warning btn-block" value="Atualizar">       
                </form>
                </div>
            </div>
        </div>

    </main>
</body>
</html>

