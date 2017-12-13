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

        
          <p class="float-right d-md-none">
            <button type="button" class="btn btn-primary btn-sm" data-toggle="offcanvas">Toggle nav</button>
          </p>

          <div class="jumbotron sombra">
            
            <?php

              if(isset($_GET['id'])){
                if( $_GET['id'] != "") {


                  $db = mysqli_connect('localhost', 'root', '', 'elp');
                  if(!$db){
                    exit('Fallo en la conexion');
                  }

                  $id = $_GET['id'];
                  $arrayRespuestas = [];
                  $aux = 0;

                  $sql = "SELECT Nombre FROM formularios WHERE ID = '$id';";
                  $consulta = mysqli_query($db, $sql);
                  $fila = mysqli_fetch_row($consulta);

                  if ($fila) {
                    ?>
                      <h1><?php echo $fila[0]; ?></h1>
                      <br>
                    <?php
                  }

                  $sql1 = "SELECT NumPR, Pregunta, Respuesta FROM tests WHERE IDFormulario = '$id' ORDER BY NumPR ASC;";
                  $consulta1 = mysqli_query($db, $sql1);
                  $fila1= mysqli_fetch_row($consulta1);

                  while($fila1){
                    $arrayRespuestas[$aux] = $fila1[2];
                    ?>
                      <div class="row row-offcanvas">
                        <p><b><?php echo $fila1[0]; ?>. <?php echo $fila1[1]; ?> </b></p>
                      </div><!--/span-->
                      <div style="margin-left: 28px;">
                        <div class="row row-offcanvas">
                          <p><b class="subr">Respuesta:</b>
                            <br>
                            <br>
                            <textarea rows="5" cols="90" name="respuesta[]"></textarea>
                          </p>
                        </div><!--/span-->
                        <div class="respuestasCorrectas row row-offcanvas hidden">
                          <p style="color: blue"><b>
                            <span class="subr">Respuesta correcta:</span>
                            <br>
                            <span class="titulo2"><?php echo $fila1[2]; ?><span>
                          </b></p>
                        </div><!--/span-->
                      </div>

                      <hr>

                    <?php
                    $fila1= mysqli_fetch_row($consulta1);
                  }
                  ?> 
                    <div class="row row-offcanvas">
                      <button class="btn btn-success" id="resolver" onclick="resolver()"> &laquo; Mostrar Respuestas &raquo; </button>
                    </div>
                  <?php
                }
              }
            ?>

            
          </div>
          


        
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
    function resolver(){
      [].forEach.call(document.querySelectorAll('.respuestasCorrectas'), function (el) {
        el.classList.remove("hidden");
      });
    }
  </script>
  
</html>
