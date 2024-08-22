<?php 
include 'conn/connect.php';
$lista = $conn->query('select * from reservas ');
$row_reservas = $lista->fetch_assoc();
$num_linhas = $lista->num_rows;
 
?>


<!-- <div class="col-sm-6 col-md-12 bg-success"> 
<div class="card text-center" >
  <div class="card-header">
    Featured
  </div>
  <div class="card-body">
    <h5 class="card-title">Special title treatment</h5>
    <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
    <a href="#" class="btn btn-primary">Faça uma reserva</a>
  </div>
</div>
</div> -->


<div class="row">
<div class="text-center" class="card bg-dark text-white">
 <a href="admin/reservas_pedidos.php" class="btn"><img class="card-img " src="images/mesa-reservas.jpg" width="1100px" alt="mesa-reservas"></a>

</div>
</div>
