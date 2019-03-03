<?php
  session_start();
  if ($_SESSION['id_estado'] != '1') {
    header("Location:login_admin.php");
  }
?>  
<!doctype html>
<html lang="es">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="css/img-responsive.css">

    <title>Index Fidela Estilista</title>
  </head>
  <body data-spy="scroll" data-target=".navbar" data-offset="50" style="background-color: white;">
  <nav class="navbar navbar-expand-lg navbar-dark fixed-top" style="background-color: #512da8;">
  <a class="navbar-brand" href="#"><font face="Arial Black" color="#f44336"> FIDELA </font>Estilista</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
    <div class="navbar-nav">
      <a class="nav-item nav-link active" href="#section1">Datos Peluqueros <span class="sr-only">(current)</span></a>
      <a class="nav-item nav-link" href="#section2">Datos Clientes</a>
      <a class="nav-item nav-link" href="#section3">Servicios</a>
      <a class="nav-item nav-link" href="#section4">Reservas</a>
      <a class="nav-item nav-link" href="#">Bienvenido Admin</a>
      <a class="nav-item nav-link" href="cerrarsesion.php">Cerrar Sesión</a>
    </div>
  </div>
</nav>

<!-- Section 1 -->
<div id="section1">
<br>
<br>
<h1>Datos Peluqueros</h1>
<!-- Crud peluqueros-->
<div class="table-peluqueros"> 
  <div class="container">
  <table class="table table-hover table-dark">
  <thead>
  <tr>
  <th scope="col">Creación Peluquero Nuevo:</th>
  <th scope="col"><a href="admin/agregarp.php"><img src="iconos/plus.png" alt="" width="15%"></img></a></th>
  <!--  "logo designed by from Flaticon"  -->
  </tr>
    <tr>
      <th scope="col">Id</th>
      <th scope="col">Usuario Ingreso</th>
      <th scope="col">Contraseña</th>
      <th scope="col">Nombre</th>
      <th scope="col">Estado</th>
    <th scope="col">Cambios</th>
    <th scope="col">Eliminar</th>
    </tr>
  </thead>
  
    <?php
    $host = "localhost"; 
              $user = "root"; 
              $pw = "";
              $db = "peluqueria";

              $conexion = new mysqli($host,$user,$pw,$db);
    $query="Select peluqueros.id_peluquero, peluqueros.user_peluquero, peluqueros.pass_peluquero, peluqueros.nombre_peluquero, estado.estado
    from peluqueros, estado
    where peluqueros.id_estado = estado.id_estado";
    $resultado= $conexion->query($query);
    while($row=$resultado->fetch_assoc()){
  ?>  
  
  
  <tbody>
    <tr>
      <th><?php echo $row['id_peluquero']; ?></th>
      <td><?php echo $row['user_peluquero']; ?></td>
      <td><?php echo $row['pass_peluquero']; ?></td>
      <td><?php echo $row['nombre_peluquero']; ?></td>
      <td><?php echo $row['estado']; ?></td>
    <td><a href="admin/editarp.php?id_peluquero=<?php echo $row['id_peluquero']; ?>"><center><img src="iconos/editimagen.png" alt="" width="20%"></img></center></a></td>
    <td><a href="#" onclick="confirmareliminarpeluquero(<?php echo $row['id_peluquero']; ?>); return false;"><center><img src="iconos/cancelar.png" alt="" width="20%"></img></center></a></td>
    <!--  "logo designed by from Flaticon"  -->
    </tr>
  </tbody>
    <?php 
    
    }
  ?>  
</table>
</div>
</div>
</div>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<!-- Section 2 -->
<div id="section2">
<br>
<br>
<h1>Datos Clientes</h1>
  <div class="table-clientes"> 
  <div class="container">
 <!-- Crud clientes-->
    <table class="table table-hover table-dark">
        <thead>
        <tr>
          <th scope="col">Id cliente</th>
          <th scope="col">Nombre</th>
          <th scope="col">Apellido</th>
          <th scope="col">Rut</th>
          <th scope="col">Correo</th>
          <th scope="col">Usuario Ingreso</th>
          <th scope="col">Contraseña</th>
          <th scope="col">Estado</th>
          <th scope="col">Cambios</th>
          <th scope="col">Eliminar</th>
        </tr>
        </thead>
      
  <?php
    $host = "localhost"; 
              $user = "root"; 
              $pw = "";
              $db = "peluqueria";

              $conexion = new mysqli($host,$user,$pw,$db);
    $query="Select clientes.id_cliente, clientes.nombre_cliente, clientes.apellido_cliente, clientes.telefono_cliente, clientes.correo_cliente,
    clientes.user_cliente, clientes.pass_cliente, estado.estado
    from clientes, estado
    where clientes.id_estado = estado.id_estado order by clientes.id_cliente desc";
    $resultado= $conexion->query($query);
    while($row=$resultado->fetch_assoc()){
  ?>  
    <tbody>
      <tr>
        <th scope="row"><?php echo $row['id_cliente']; ?></th>
        <td><?php echo $row['nombre_cliente']; ?></td>
        <td><?php echo $row['apellido_cliente']; ?></td>
        <td><?php echo $row['telefono_cliente']; ?></td>
        <td><?php echo $row['correo_cliente']; ?></td>
        <td><?php echo $row['user_cliente']; ?></td>
        <td><?php echo $row['pass_cliente']; ?></td>
        <td><?php echo $row['estado']; ?></td>
        <td><a href="admin/editarc.php?id_cliente=<?php echo $row['id_cliente']; ?>"><center><img src="iconos/editimagen.png" alt="" width="25%"></img></center></a></td>
        <td><a href="#" onclick="confirmareliminarcliente(<?php echo $row['id_cliente']; ?>); return false;"><center><img src="iconos/cancelar.png" alt="" width="25%"></img></center></a></td>
        <!--  "logo designed by from Flaticon"  -->
      </tr>
    </tbody>
  <?php 
    
    }
  ?>  
    </table>
</div>
</div>
</div>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<!-- Section 3 -->
<div id="section3">
  <br>
  <br>
<h1>Servicios</h1>
  <!--CRUD Contenido-->
<div class="col-md-12"> 
  <form action="admin/insertar.php?accion=servicio" method="post" enctype="multipart/form-data">
    <div class="container navbar navbar-default"> 
      <br>
      <div class="card-header">
        <h2>Ingrese Servicios:</h2>
      </div>
      <br>
      <br>
      <div class="container">
        <div class="row">
        <div class="col">
          <label for="name_user">Nombre Servicio:</label>
          <input class="form-control" name="nombre_servicio" type="text" placeholder="Nombre de servicio" required="">
        </div>

        <div class="col">
          <label for="name_user">Descripción:</label>
          <input class="form-control" name="descripcion_servicio" type="text" placeholder="Descripcion" required="">
        </div>
        </div>
        <div class="row">    
        <div class="col">
          <label for="name_user">precio servicio:</label>
          <input class="form-control" name="precio_servicio" type="text" placeholder="precio servicio" required="">
        </div>
        <div class="col">
          <label for="name_user">Imagen:</label>
          <input class="form-control" name="img_servicio" type="file" placeholder="precio servicio" required="">
        </div>
        <div class="col">
          <label for="name_user">color Servicio:</label>
          <input class="form-control" name="color" type="color" placeholder="color de servicio" required="">
        </div>
        <div class="col">
          <label for="name_user">color de texto:</label>
          <input class="form-control" name="textColor" type="color" placeholder="color de texto" required="">
        </div>
        <div class="col">
          <label for="name_user">Ingresar:</label>
          <input type="submit" value="Ingresar Servicio" class="btn btn-primary" style="background-color: #512da8;">
        </div>
        </div>  
      </div>
    </div>
  </form>
  <br><br><br>
</div>

<div class="table-contenido"> 
  <div class="container">
  <table class="table table-hover table-dark">
  <thead>
    <tr>
      <th scope="col">Id</th>
      <th scope="col">Servicio</th>
      <th scope="col">Descripcion</th>
      <th scope="col">Imagen</th>
      <th scope="col">Precio</th>
    <th scope="col">Color</th>
    <th scope="col">Color Texto</th>
    <th scope="col">Cambios</th>
    <th scope="col">Eliminar</th>
    </tr>
  </thead>
  <tbody>
 
  <?php
    $host = "localhost"; 
    $user = "root"; 
    $pw = "";
    $db = "peluqueria";

              $conexion = new mysqli($host,$user,$pw,$db);
    $query="Select * from servicios ";
    $resultado= $conexion->query($query);
    while($row=$resultado->fetch_assoc()){
    ?>  
  
    <tr>
    <th scope="row"><?php echo $row['id_servicio']; ?></th>
    <td><?php echo $row['nombre_servicio']; ?></td>
    <td><?php echo $row['descripcion_servicio']; ?></td>
    <td><?php echo $row['img_servicio']; ?></td>
    <td><?php echo $row['precio_servicio']; ?></td>
    <td><?php echo $row['color']; ?></td>
    <td><?php echo $row['textColor']; ?></td>
    <td><a href="admin/editars.php?id_servicio=<?php echo $row['id_servicio']; ?>"><center><img src="iconos/editimagen.png" alt="" width="25%"></img></center></a></td>
    <td><a href="#" onclick="confirmareliminarservicio(<?php echo $row['id_servicio']; ?>); return false;"><center><img src="iconos/cancelar.png" alt="" width="25%"></img></center></a></td>
    </tr>
  
  <?php 
    
    }
  ?>  
  
  </tbody>
</table>
</div></div>
</div>
<!-- Section 4 -->
<div id="section4">
  <br>
  <br>
    <!--vista de reservas-->
    <h1>Reservas</h1>
<div class="table-reservas"> 
  <div class="container">
  <table class="table">
    <thead>
    <tr>
  <th scope="col">Reserva Nueva:</th>
  <th scope="col"><button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal-reservar"></button></th>
  <!--  "logo designed by from Flaticon"  -->
    <tr>
      <th>Id Caso</th>
      <th>Peluquero Asignado</th>
      <th>Cliente</th>
      <th>Servicio solicitado</th>
      <th>Fecha</th>
      <th>Cambiar Atención</th>
      <th>Borrar Atención</th>
    </tr>
    </thead>
    <tbody>
    
    <?php
    $host = "localhost"; 
    $user = "root"; 
    $pw = "";
    $db = "peluqueria";

    $conexion = new mysqli($host,$user,$pw,$db);

      $query="Select eventos.id_evento, peluqueros.nombre_peluquero, clientes.nombre_cliente, servicios.nombre_servicio, eventos.start
        from eventos, peluqueros, clientes, servicios
        where eventos.id_peluquero = peluqueros.id_peluquero
        and eventos.id_cliente = clientes.id_cliente
        and eventos.id_servicio = servicios.id_servicio
        order by eventos.start asc";
    $resultado= $conexion->query($query);
    while($row=$resultado->fetch_assoc()){
    ?>  
  
    <tr>
      <td><?php echo $row['id_evento']; ?></td>
      <td><?php echo $row['nombre_peluquero']; ?></td>
      <td><?php echo $row['nombre_cliente']; ?></td>
      <td><?php echo $row['nombre_servicio']; ?></td>
      <td><?php echo $row['start']; ?></td>
      <td><a href="admin/editare.php?id_evento=<?php echo $row['id_evento']; ?>"><center><img src="iconos/editimagen.png" alt="" width="25%"></img></center></a></td>
        <td><a href="#" onclick="confirmareliminarevento(<?php echo $row['id_evento']; ?>); return false;">><center><img src="iconos/cancelar.png" alt="" width="25%"></img></center></a></td>
    </tr>
    
    <?php 
    
      }
    ?>  
    
    </tbody>
  </table>
  </div>
</div>
<!-- Modal reserva -->
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
        <form method="POST" action="admin/insertar.php?accion=agendar_admin">
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
                <select class="form-control" name="txt_cliente" id="txt_cliente" >
                    <option value="" disabled selected>Seleccione Cliente</option>
                    <?php

                        while($row = $query->fetch_assoc()){ 
                            echo '<option value="'.$row['id_cliente'].'">'.$row['nombre_cliente'].' '.$row['apellido_cliente'].'</option>';
                        }
                    
                    ?>
                </select><br>
        <label for="name_user">Indique Peluquero</label>
              <?php
              $host = "localhost"; 
              $user = "root"; 
              $pw = "";
              $db = "peluqueria";

              $conexion = new mysqli($host,$user,$pw,$db);

                $query = $conexion->query("SELECT * FROM peluqueros");
                
                $row = $query->num_rows;
                ?>
                <select class="form-control" name="txt_peluquero" id="txt_peluquero" >
                    <option value="" disabled selected>Seleccione Peluquero</option>
                    <?php

                        while($row = $query->fetch_assoc()){ 
                            echo '<option value="'.$row['id_peluquero'].'">'.$row['nombre_peluquero'].'</option>';
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
                    <option value="" disabled selected>Seleccione servicio  </option>
                    <?php

                        while($row = $query_servicios->fetch_assoc()){ 
                            echo '<option value="'.$row['id_servicio'].'">'.$row['nombre_servicio'].' Precio: $'.$row['precio_servicio'].'</option>';
                        }
                    
                    ?>
                </select><br>

    Dia<input type="date" name="dia" id="dia"><br>
    Hora<input type="time" id="hora" name="hora" value="15:00" min="10:00" max="22:00" step="1800">

    </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
        <button type="submit" id="btn_reservar"class="btn btn-success">Reservar</button>
      </div>
    </div>
  </div>
</div></form>

<script type="text/javascript">
function confirmareliminarpeluquero(id) {
  var id = id;
//Ingresamos un mensaje a mostrar
var mensaje = confirm("¿Seguro que desea eliminar este peluquero? se eliminara toda la información asociada");
//Detectamos si el usuario acepto el mensaje
if (mensaje) {
alert("¡Gracias por aceptar!");
location.href ="admin/eliminar.php?id_peluquero=".concat(id).concat("&accion=peluquero");
}
//Detectamos si el usuario denegó el mensaje
else {
alert("¡Haz denegado el mensaje!");
}
}

function confirmareliminarcliente(id) {
  var id = id;
//Ingresamos un mensaje a mostrar
var mensaje = confirm("¿Seguro que desea eliminar este cliente? se eliminara toda la información asociada");
//Detectamos si el usuario acepto el mensaje
if (mensaje) {
alert("¡Gracias por aceptar!");
location.href ="admin/eliminar.php?id_cliente=".concat(id).concat("&accion=cliente");
}
//Detectamos si el usuario denegó el mensaje
else {
alert("¡Haz denegado el mensaje!");
}
}

function confirmareliminarservicio(id) {
  var id = id;
//Ingresamos un mensaje a mostrar
var mensaje = confirm("¿Seguro que desea eliminar este servicio? se eliminara toda la información asociada");
//Detectamos si el usuario acepto el mensaje
if (mensaje) {
alert("¡Gracias por aceptar!");
location.href ="admin/eliminar.php?id_servicio=".concat(id).concat("&accion=servicio");
}
//Detectamos si el usuario denegó el mensaje
else {
alert("¡Haz denegado el mensaje!");
}
}

function confirmareliminarevento(id) {
  var id = id;
//Ingresamos un mensaje a mostrar
var mensaje = confirm("¿Seguro que desea eliminar este evento? se eliminara toda la información asociada");
//Detectamos si el usuario acepto el mensaje
if (mensaje) {
alert("¡Gracias por aceptar!");
location.href ="admin/eliminar.php?id_evento=".concat(id).concat("&accion=evento");
}
//Detectamos si el usuario denegó el mensaje
else {
alert("¡Haz denegado el mensaje!");
}
}
</script>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
  </body>
</html>

