<?php 
include 'acesso_com.php';
include '../conn/connect.php';
$lista = $conn->query("select * from tipos");
$row = $lista->fetch_assoc();
$rows = $lista->num_rows;


?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> Tipos - Lista </title>
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/estilo.css">
</head>
<body class="">
    <main class="container">
        <?php include 'menu_adm.php'; ?>
        <h2 class="breadcrumb alert-warning">Lista de Tipos</h2>
        <table class="table table-hover table-condensed tb-opacidade bg-warning">
            <thead>
                <th class="hidden">ID</th>
                <th>Id</th>
                <th>SIGLA</th>
                <th>ROTULO</th>
                <th>
                    <a href="tipos_insere.php" target="_self" class="btn btn-primary btn-xs" role="button">
                        <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
                        <span class="hidden-xs">ADICIONAR</span>
                    </a>
                </th>
            </thead>   
            
            <tbody><!-- <tbody> inicio corpo da tabela -->
             <!-- inicio estrutura repetição -->
             <?php do{?>
                <tr>
                    <td class="hidden">
                        <?php echo $row['id']; ?>
                    </td>
                    <td>
                    <?php echo $row['id']; ?>
                    <span class="visible-xs"></span>
                    <span class="hidden-xs"></span>
                </td>
                <td>
                    <?php 
                 
                    echo $row['sigla'];
                    ?>
                </td>
                <td>
                    <?php echo $row['rotulo']; ?>
                </td>
                <td>
                <a
                                href="tipos_atualiza.php?id=<?php echo $row['id'] ?>" 
                                role="button" 
                                class="btn btn-warning btn-xs"
                            >
                                <span class="glyphicon glyphicon-refresh"></span>
                                <span class="hidden-xs">ALTERAR</span>
                            </a>
                    <button
                        data-nome="<?php echo $row['sigla']; ?>"
                        data-id="<?php echo $row['id']; ?>"
                        class="delete btn btn-xs btn-danger" 
                        >
                        <span class="glyphicon glyphicon-trash"></span>
                        <span class="hidden-xs">EXCLUIR</span>
                    </button>
                </td>
                </tr>
                <?php }while($row = $lista-> fetch_assoc()); ?>
                
            </tbody>  <!-- final corpo da tabela -->
        </table>
    </main>
    <!-- inicio do modal para exculir... -->
    <div class="modal fade" id="modalEdit" role="dialog">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4>Vamos deletar?</h4>
                    <button class="close" data-dismiss="modal" type="button">
                        &times;

                    </button>


                 
                 Deseja mesmo excluir o item?
            <h4><span class="nome text-danger"></span></h4>
        </div>
        <div class="modal-footer">
            <a href="#" type="button" class="btn btn-danger delete-yes">
                Confirmar
            </a>

            <button class="btn btn-success" data-dismiss="modal">
                Cancelar
            </button>
            </div class="modal-body">
          </div>
        </div>
    </div>  
</body>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script src="../js/bootstrap.min.js"></script>
<script type="text/javascript">
    $('.delete').on('click',function(){
        var nome = $(this).data('sigla'); //busca o nome com a descrição (data-nome)
        var id = $(this).data('id'); // busca o id (data-id)
        //console.log(id + ' - ' + nome); //exibe no console
        $('span.nome').text(nome); // insere o nome do item na confirmação
        $('a.delete-yes').attr('href','tipos_excluir.php?id='+id); //chama o arquivo php para excluir o produto
        $('#modalEdit').modal('show'); // chamar o modal
    });
</script> 

<?php 

?>
</html>