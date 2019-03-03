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
  <body data-spy="scroll" data-target=".navbar" data-offset="50" style="background-color: #512da8;">
  <nav class="navbar navbar-expand-lg navbar-dark fixed-top" style="background-color: #512da8;">
  <a class="navbar-brand" href="#"><font face="Arial Black" color="#f44336"> FIDELA </font>Estilista</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
    <div class="navbar-nav">
      <a class="nav-item nav-link active" href="#section1">Home <span class="sr-only">(current)</span></a>
      <a class="nav-item nav-link" href="#section2">Nosotros</a>
      <a class="nav-item nav-link" href="#section3">Servicios</a>
      <a class="nav-item nav-link" href="#section4">Contacto</a>
      <a class="nav-item nav-link" href="#section5">Ubicacion</a>
      <a class="nav-item nav-link" href="#section6">Ingresar/ Registrar</a>
    </div>
  </div>
</nav>

<!-- Section 1 -->
<div id="section1">
  <center>
  <div id="demo" class="carousel slide" data-ride="carousel">

  <!-- Indicators -->
  <ul class="carousel-indicators">
    <li data-target="#demo" data-slide-to="0" class="active"></li>
    <li data-target="#demo" data-slide-to="1"></li>
    <li data-target="#demo" data-slide-to="2"></li>
    <li data-target="#demo" data-slide-to="3"></li>
  </ul>

  <!-- The slideshow -->
  <div class="carousel-inner">
    <div class="carousel-item active">
      <img src="img/1.jpg" width="100%" class="view-desktop" >
      <img src="img/1-2.jpg" width="90%"class="view-mob img-mob" >
    </div>
    <div class="carousel-item">
      <img src="img/2.jpg" width="100%" class="view-desktop">
      <img src="img/2-2.jpg" width="90%"class="view-mob img-mob" >
    </div>
    <div class="carousel-item">
      <img src="img/3.jpg" width="100%" class="view-desktop">
      <img src="img/3-2.jpg" width="90%"class="view-mob img-mob" >
    </div>
    <div class="carousel-item">
      <img src="img/4.jpg" width="100%" class="view-desktop">
      <img src="img/4-2.jpg" width="90%"class="view-mob img-mob" >
    </div>
  </div> 

  <!-- Left and right controls -->
  <a class="carousel-control-prev" href="#demo" data-slide="prev">
    <span class="carousel-control-prev-icon"></span>
  </a>
  <a class="carousel-control-next" href="#demo" data-slide="next">
    <span class="carousel-control-next-icon"></span>
  </a>

</div>
</center>
</div>  
<!-- Section 2 -->
<div id="section2">
  <div class="jumbotron">
  <h1 class="display-4">Hola, Nosotros somos Fidela Estilista!</h1>
  <p class="lead">Una peluquería al servicio de usted y la comunidad. Buscamos abrirnos espacio y ganar su confianza y cariño con especialistas bastante calificados.</p>

  
</div>
</div>
<!-- Section 3 -->
<div id="section3">
  <div class="jumbotron jumbotron-fluid">
  <div class="container">
    <h1 class="display-4">Servicios</h1>
    <p class="lead">Estos son los servicios que ofrecemos.</p>
    <?php
              $host = "localhost"; 
              $user = "root"; 
              $pw = "";
              $db = "peluqueria";

              $conexion = new mysqli($host,$user,$pw,$db);

                $query = $conexion->query("SELECT * FROM servicios");
                
                $row = $query->num_rows;

                while($row = $query->fetch_assoc()){ 
  echo '<div class="card" style="width: 18rem;">
  <img class="card-img-top" src="servicios/'.$row['img_servicio'].'" alt="Card image cap">
  <div class="card-body" style="background-color: '.$row['color'].';">
    <font color="'.$row['textColor'].'">
    <h5 class="card-title">'.$row['nombre_servicio'].'</h5>
    <p class="card-text">'.$row['descripcion_servicio'].'</p>
    </font>
  </div>
</div> <br>';
                        }
                    
                    ?>

  </div>
</div>
</div>
<!-- Section 4 -->
<div id="section4">
    <div class="jumbotron">
  <h1 class="display-4">Contacto</h1>
  <p class="lead"></p>
	<ul>
		<img src="iconos/casita.png" width="35px" height="35px">&nbsp; AV.Larrain 6642, local N° 8 Santiago, Chile<br><br>
    <img src="iconos/fb.png" width="35px" height="35px">&nbsp; <a href="https://www.facebook.com/BellasyAlocadas%20/">Facebook</a><br><br>
    <img src="iconos/instagram.png" width="35px" height="35px">&nbsp; <a href="https://www.instagram.com/bellasyalocadas">Instagram</a><br><br>
		<img src="iconos/wsp.png" width="35px" height="35px">&nbsp; (+569) 5783 8157<br><br>
		<img src="iconos/email.png" width="35px" height="35px">&nbsp; bellasyalocadas@gmail.com<br><br>
		<img src="iconos/bueno.png" width="35px" height="35px">&nbsp; Nuevo Local establecido<br>
	</ul>
</div>
<!-- Section 5 -->
<div id="section5">
    <div class="jumbotron">
  <h1 class="display-4">Ubicación</h1>
  <p class="lead">AV.Larrain 6642, local N° 8
					Santiago, Chile</p>
  <hr class="my-4">
    			  <div id="section-map" class="clearfix">      
<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d26631.16246765289!2d-70.58149656858816!3d-33.45203398255156!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x9662ce47ee320fc7%3A0xcc2fd576e08e035f!2sAv.+Larrain+6642%2C+La+Reina%2C+Regi%C3%B3n+Metropolitana!5e0!3m2!1ses!2scl!4v1541690292580" width="800" height="600" frameborder="0" style="border:0" allowfullscreen></iframe></div>
</div>
<!-- Section 6 -->
<font color="white">
<div id="section6">
    <!-- Ingresar y Registrar -->
  <div class="reging">
<div class="container">
  <div class="row">
    <div class="col">
      <span>Registrar</span>
        <form  action="validar.php" method="POST">
        <div class="form-group">
        <label for="exampleInputPassword1">Nombre Cliente:</label>
        <input type="text" class="form-control" id="exampleInputPassword1" name="nombre_cliente" placeholder="Nombre Cliente" required>
        </div>
        
        <div class="form-group">
        <label for="exampleInputPassword1">Apellido Cliente:</label>
        <input type="text" class="form-control" id="exampleInputPassword1" name="apellido_cliente"  placeholder="Apellido Cliente" required>
        </div>
        
        <div class="form-group">
        <label for="exampleInputPassword1">Telefono Cliente:</label>
        <input type="text" class="form-control" id="exampleInputPassword1" name="telefono_cliente" placeholder="Ingrese su telefono" required>
        <small id="emailHelp" class="form-text text-muted">Ejemplo: +56999999999</small>
        </div>
      
        <div class="form-group">
        <label for="exampleInputEmail1">Dirección Email:</label>
        <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="correo_cliente" placeholder="Ingrese Email" required>
        </div>
        
        <div class="form-group">
        <label for="exampleInputPassword1">Creación Usuario:</label>
        <input type="text" class="form-control" id="exampleInputPassword1" aria-describedby="emailHelp" name="user_cliente" placeholder="Ingrese Su Usuario" required>
        </div>
        
        <div class="form-group">
        <label for="exampleInputPassword1">Contraseña:</label>
        <input type="password" class="form-control" id="exampleInputPassword1" name="pass_cliente" id="pass_cliente" placeholder="Su Contraseña" required>
        </div>
        <input type="text" hidden name="id_estado" value="3"> 
        <button type="submit" class="btn btn-primary" style="background-color: #f44336;" id="accion" name="accion" value="registrar-cliente">Crear Usuario</button>
      </form> 
    </div>
    <div class="col">
      <span>Ingresar</span>
      <form action="validar.php" method="post">
        <div class="form-group">
        <label for="exampleInputEmail1">Ingrese su Nombre Usuario</label>
        <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="txtlogin" placeholder="Ingrese nombre de usuario">
        </div>
        <div class="form-group">
        <label for="exampleInputPassword1">Contraseña</label>
        <input type="password" class="form-control" id="exampleInputPassword1" name="txtpass" placeholder="contraseña">
        </div>

        <button type="submit" class="btn btn-primary" id="accion" name="accion" value="login-cliente" border="no-border" style="background-color: #f44336;">Ingresar</button>
      </form>
    </div>
  </div>

</div>
</div>

</div>
</font>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
  </body>
</html>