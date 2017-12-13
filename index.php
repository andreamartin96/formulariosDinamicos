<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../../../../favicon.ico">

    <title>Cuestionarios ELP</title>

    <!-- Fuentes -->
    <link href="https://fonts.googleapis.com/css?family=Lobster" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Indie+Flower" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Gloria+Hallelujah" rel="stylesheet">

    <!-- Bootstrap core CSS -->

    <link href="styles/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

    <!-- Custom styles for this template -->
    <link href="styles/style.css" rel="stylesheet">


    

  </head>

  <body>
    <!-- <div id="bg"><img src="img/sylvaneth.jpg"></div> -->

    <nav class="navbar navbar-expand-md fixed-top navbar-dark bg-dark" style="position: fixed;">
      <img src="img/ucm.png" alt="logo" width="50px" height="45px">
      <a class="navbar-brand" style="color: yellow;" href="#">Examenes ELP</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExampleDefault" aria-controls="navbarsExampleDefault" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse" id="navbarsExampleDefault">
        <ul class="navbar-nav mr-auto">

          <li class="nav-item active margenDer margenIzq">
            <a class="nav-link" href="./"><span class="glyphicon glyphicon-home" ></span> Inicio <span class="sr-only">(current)</span></a>
          </li>

        </ul>
      </div>
    </nav>

    <div class="container">

      <div class="row row-offcanvas row-offcanvas-right">

        <div class="col-12 col-md-9">
          <p class="float-right d-md-none">
            <button type="button" class="btn btn-primary btn-sm" data-toggle="offcanvas">Toggle nav</button>
          </p>
          <div class="jumbotron sombra">
            <h1>¡Bienvenido/a a esta página!</h1>
            <p id="titulo">Aquí podrás encontrar una larga lista de cuestionarios sobre preguntas típicas de los examenes de ELP. ¡Pero no solo eso! Sino que también tendrás la posibilidad de crear los tuyos propios.</p>
          </div>
          <div class="row" id="formularios" style="text-align: center;">          
            
            <!-- Formularios dinamicos -->

            <?php
              $db = mysqli_connect('localhost', 'root', '', 'elp');
              if(!$db){
                exit('Fallo en la conexion');
              }
              $sql1 = "SELECT ID, Nombre FROM formularios ORDER BY ID ASC;";
              $consulta1 = mysqli_query($db, $sql1);
              $fila1= mysqli_fetch_row($consulta1);

              while($fila1){
                ?>
                <div class="col-5 col-lg-4">
                      <h2 class="titulo2"><?php echo $fila1[1]; ?></h2>
                      <p><a class="btn btn-secondary" id="<?php echo $fila1[0]; ?>"  href="test.php?id=<?php echo$fila1[0]; ?>" role="button">Comenzar &raquo;</a></p>
                    </div><!--/span-->
                    <?php
                    $fila1= mysqli_fetch_row($consulta1);
              }
            ?>

          </div><!--/row-->

        </div><!--/span-->

        <div class="col-6 col-md-3 sidebar-offcanvas" id="sidebar">
          <div class="list-group">
            <p class="list-group-item active" id="idMenu">Menú de Navegación</p>
            <a href="formulario.php" class="list-group-item " id="linksMenu">Crear un nuevo formulario.</a>
          </div>
        </div> <!--/span-->
      </div><!--/row-->

      <hr>

      <footer>
        <p>Esta página ha sido realizada por Andrea Martín &copy;</p>
      </footer>

    </div><!--/.container-->

    


    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="js/popper.min.js"></script>
    <!-- <script src="js/bootstrap.min.js"></script> -->
    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <script src="js/ie10-viewport-bug-workaround.js"></script>
    <script src="js/offcanvas.js"></script>

  </body>

  <script type="text/javascript">
    function muestraForms(){

        // funcion ajax que devuelve todos los formularios
      
        $.ajax({
          type: "POST",
          dataType: "html",
          url: "sqlFormularios.php",
          data: {},
          success: function(data, textStatus) {
            $("#formularios").html(data);
          }
        }).done(function(msg) {
     
            
        });

      };
  </script>
  
</html>
