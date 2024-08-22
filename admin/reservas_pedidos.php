<?php
include 'acesso_com.php';
include '../conn/connect.php';
$lista = $conn->query("select * from reservas");
$row = $lista->fetch_assoc();
$rows = $lista->num_rows;

$result_events = "SELECT * FROM reservas";
$resultado_events = mysqli_query($conn, $result_events);
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/estilo.css">
    <link href='calendar/css/fullcalendar.min.css' rel='stylesheet' />
		<link href='calendar/css/fullcalendar.print.min.css' rel='stylesheet' media='print' />
		<link href='calendar/css/personalizado.css' rel='stylesheet' />
		<script src='calendar/js/jquery.min.js'></script>
		<script src='calendar/js/moment.min.js'></script>
		<script src='calendar/js/fullcalendar.min.js'></script>
		<script src='calendar/locale/pt-br.js'></script>
		<script>
			$(document).ready(function() {
				$('#calendar').fullCalendar({
					header: {
						left: 'prev,next today',
						center: 'title',
						right: 'month,agendaWeek,agendaDay'
					},
					defaultDate: Date(),
					navLinks: true, // can click day/week names to navigate views
					editable: true,
					eventLimit: true, // allow "more" link when too many events
					eventClick: function(event) {
						$('#visualizar #id').text(event.id);
						$('#visualizar #title').text(event.motivo);
						$('#visualizar #data').text(event.data.format('DD/MM/YYYY HH:mm:ss'));
						$('#visualizar #end').text(event.end.format('DD/MM/YYYY HH:mm:ss'));
						$('#visualizar').modal('show');
						return false;
					},
					
					selectable: true,
					selectHelper: true,
					select: function(start, end){
						$('#cadastrar #data').val(moment(start).format('DD/MM/YYYY HH:mm:ss'));
						$('#cadastrar #end').val(moment(end).format('DD/MM/YYYY HH:mm:ss'));
						$('#cadastrar').modal('show');						
					},
					events: [
						<?php
							while($row_events = mysqli_fetch_array($resultado_events)){
              $data = $row_events['data']." ".$row_events['hora'];
              $end = date('Y-m-d H:i:s', strtotime($data) + 3600); 
						?>
								{
								id: '<?php echo $row_events['id']; ?>',
								title: '<?php echo $row_events['motivo']; ?>',
								start: '<?php echo $data; ?>',
                end: '<?php echo $end; ?>',
								},
            <?php
							}
						?>
					]
				});
			});
			
			//Mascara para o campo data e hora
			function DataHora(evento, objeto){
				var keypress=(window.event)?event.keyCode:evento.which;
				campo = eval (objeto);
				if (campo.value == '00/00/0000 00:00:00'){
					campo.value=""
				}
			}
		</script>
    <title>RESERVAS</title>
</head>
<body>
  <main class="container">
   <?php include 'menu_adm.php'; ?>
    <h2 class="breadcrumb alert-dark text-center" >Fazer reserva da mesa </h2>
  <form>
  <div class="form-group">
  <label for="exampleFormControlSelect1">Motivo</label>
    <select class="form-control" id="exampleFormControlSelect1">
        
    <option>Aniversário</option>
    <option>Casamento</option>
    <option>Comemorações de trabalho</option>
    <option>Confraternização</option>
    <option>Formaturas</option>
    <option>Reuniões da familia</option>
    <option>Jubileus</option>  

    </select>
    
  <div class="form-group">
    <label for="exampleFormControlTextarea1">Comentários</label>
    <textarea class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
  </div>

  <input id="date" type="date">

  </form>

  <div class="container">	
			<div id='calendar'></div>
	</div>
<br>
    <div>
  <button type="button" class="btn btn-outline-dark btn-lg btn-block">Enviar</button>
    </div>
  </main>  
</body>
</html>