<?php
  session_start();
  if ($_SESSION['id_estado'] != '2') {
    header("Location:login_admin.php");
  }
?>  
<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title></title>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">

<link rel="stylesheet" type="text/css" href="css/main_style.css">
<link rel='stylesheet' href='fullcalendar-3.9.0/fullcalendar.css' />
<script src='fullcalendar-3.9.0/lib/jquery.min.js'></script>
<script src='fullcalendar-3.9.0/lib/moment.min.js'></script>
<script src='fullcalendar-3.9.0/fullcalendar.js'></script>
<script src='fullcalendar-3.9.0/locale/es.js'></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

</head>
  <body data-spy="scroll" data-target=".navbar" data-offset="50" style="background-color: white;">
  <nav class="navbar navbar-expand-lg navbar-dark fixed-top" style="background-color: #512da8;">
  <a class="navbar-brand" href="#"><font face="Arial Black" color="#f44336"> FIDELA </font>Estilista</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
    <div class="navbar-nav">
      <a class="nav-item nav-link active" href="#section1">Agenda <span class="sr-only">(current)</span></a>
      <a class="nav-item nav-link" href="#">Bienvenido Peluquero/a</a>
      <a class="nav-item nav-link" href="peluquero/editard.php">Editar datos</a>
      <a class="nav-item nav-link" href="cerrarsesion.php">Cerrar Sesión</a>
    </div>
  </div>
</nav>
<div id="section1">
  <br>
  <br><h1>Agenda</h1>
<div id='calendar'>
</div>
	
	<script type="text/javascript">
	$(document).ready(function() {

  // page is now ready, initialize the calendar...

  $('#calendar').fullCalendar({
  	defaultTimedEventDuration: '00:30:00',
  	themeSystem: 'standard',
  	handleWindowResize: true,
  	events:'http://localhost/FEWEB/eventos/porpeluquero.php',
  	defaultView: 'agendaWeek',
  	hiddenDays: [ 0 ] ,
  	minTime: '10:00:00',
  	maxTime: '22:00:00',
  	slotDuration: '00:30:00',
  	header:{
  	left: 'basicDay,basicWeek,month, prev',
  	center: 'title' ,
  	right: 'next, today,agendaDay,agendaWeek'},
  	eventClick:function(calEvent,jsEvent,view){
  		$('#title').html(calEvent.title);
  		$('#nombre-cliente').html(calEvent.nombre_cliente);
      $('#apellido-cliente').html(calEvent.apellido_cliente);
      $('#telefono_cliente').html(calEvent.telefono_cliente);
      
  		$('#nombre-peluquero').html(calEvent.nombre_peluquero);
  		$('#nombre-servicio').html(calEvent.nombre_servicio);
  		$('#precio-servicio').html(calEvent.precio_servicio);
  		$('#start').html(calEvent.start);
  		$('#end').html(calEvent.end);

  		$("#modal-ver-reserva").modal();
   	},
   	dayClick: function(date, jsEvent, view){
   		$('#dia').val(date.format('YYYY-MM-DD'));
   		$("#modal-reservar").modal();

   	}


  })

});


	</script>
<!-- Button trigger modal -->
<!-- <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
  Launch demo modal
</button>
 -->
 <!-- Modal formulario reservar -->
 <div class="modal fade" id="modal-reservar" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="title">Agregar reserva</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <input type="text" hidden id="txt_usuario" value="<?php echo $_SESSION['id_peluquero'] ?>"><br>
        <label for="name_user">Indique Cliente</label>
              <?php
              $host = "localhost"; 
              $user = "root"; 
              $pw = "";
              $db = "peluqueria";

              $conexion = new mysqli($host,$user,$pw,$db);

                $query = $conexion->query("SELECT * FROM clientes");
                
                $row = $query->num_rows;
                ?>
                <select class="form-control" name="txt_peluquero" id="txt_cliente" >
                    <option value="" disabled selected>Seleccione Cliente</option>
                    <?php

                        while($row = $query->fetch_assoc()){ 
                            echo '<option value="'.$row['id_cliente'].'">'.$row['nombre_cliente'].'</option>';
                        }
                    
                    ?>
                </select><br>
    <label for="name_user">Indique Servicio</label>
              <?php
              $host = "localhost"; 
              $user = "root"; 
              $pw = "";
              $db = "peluqueria";

              $conexion = new mysqli($host,$user,$pw,$db);

                $query_servicios = $conexion->query("SELECT * FROM servicios");
                
                $row = $query_servicios->num_rows;
                ?>
                <select class="form-control" name="txt_servicio" id="txt_servicio" >
                    <option value="" disabled selected>Seleccione Servicio</option>
                    <?php

                        while($row = $query_servicios->fetch_assoc()){ 
                            echo '<option value="'.$row['id_servicio'].'">'.$row['nombre_servicio'].' Precio: $'.$row['precio_servicio'].'</option>';
                        }
                    
                    ?>
                </select><br>

    <!-- id servicio <input type="text" id="txt_servicio"><br> -->
    Dia<input type="date" name="dia" id="dia"><br>
    Hora<input type="time" id="hora_comienzo" value="15:00" min="10:00" max="22:00" step="1800">

    </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
        <button type="button" id="btn_reservar" class="btn btn-success">Reservar</button>
      </div>
    </div>
  </div>
</div>
<!-- Script -->
<script>
	$('#btn_reservar').click(function(){
      RecolectarDatosGUI();
      EnviarInformacion('agendar_peluquero',NuevoEvento);
		// var NuevoEvento= {
		// 	title:'Reservado',
		// 	id_peluquero:$('#txt_peluquero').val(),
		// 	id_cliente:$('#txt_cliente').val(),
		// 	id_servicio:$('#txt_servicio').val(),
		// 	start:$('#dia').val()+" "+$('#hora_comienzo').val()
		// };
		// $('#calendar').fullCalendar('renderEvent',NuevoEvento);
		// $("#modal-reservar").modal('toggle');

	});
  function RecolectarDatosGUI(){
    NuevoEvento= {
      title:'Reservado',
      id_cliente:$('#txt_usuario').val(),
      id_servicio:$('#txt_servicio').val(),
      start:$('#dia').val()+" "+$('#hora_comienzo').val()
    };
  };

    function EnviarInformacion(accion,objEvento){
    $.ajax({
      type:'POST',
      url:'eventos/todos.php?accion='+accion,
      data: objEvento,
        success:function(msg){
          if(msg){
          $('#calendar').fullCalendar('refetchEvents');
          $("#modal-reservar").modal('toggle');
        }

        }, 
        error:function(){
          alert("Hay un error");
        }
    });
  }
</script>
<!-- Modal ver reservas-->
<div class="modal fade" id="modal-ver-reserva" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="title"></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        Nombre del Cliente<div id="nombre-cliente"></div>
        Apellido del Cliente<div id="apellido-cliente"></div>
        Telefono del Cliente<div id="telefono_cliente"></div>
        Nombre del peluquero<div id="nombre-peluquero"></div>
        Servicio<div id="nombre-servicio"></div>
        Precio a pagar<div id="precio-servicio"></div>


 	  </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>

      </div>
    </div>
  </div>
</div>
</body>
</html>