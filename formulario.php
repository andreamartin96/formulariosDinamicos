<!DOCTYPE html>
<html lang="es">
<head>
    <title>Formulario</title>
    <!-- Librerias -->

    <link href="http://netdna.bootstrapcdn.com/bootstrap/3.0.3/css/bootstrap.min.css" rel="stylesheet">
    <link href="http://cdnjs.cloudflare.com/ajax/libs/jQuery-Validation-Engine/2.6.4/validationEngine.jquery.css" rel="stylesheet">
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
	<script src="http://cdnjs.cloudflare.com/ajax/libs/jQuery-Validation-Engine/2.6.4/jquery.validationEngine.min.js"></script>
	<script src="http://cdnjs.cloudflare.com/ajax/libs/jQuery-Validation-Engine/2.6.4/languages/jquery.validationEngine-es.js"></script>

	<!-- Fuentes -->
    <link href="https://fonts.googleapis.com/css?family=Lobster" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Indie+Flower" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Gloria+Hallelujah" rel="stylesheet">

    <!-- Bootstrap core CSS -->

    <link href="styles/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

    <!-- Custom styles for this template -->
    <link href="styles/style.css" rel="stylesheet">

    <!-- Estilos extras -->

	<style>
		.top-buffer { 
			margin-top:20px; 
		}
	</style>

</head>
<body> 

</head>
<body>
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
<div id="container ">
	<div class="row-fluid top-buffer">
		<div class="col-lg-6 col-lg-offset-3 text-center">
			<form id="miform" method="post" name="miform" action="valida_formulario.php">
				<table id="tblprod" class="table table-hover table-bordered">
					  <thead>
					  	<tr>
					  		<td colspan="2">
					  			<label class="titulo2">Escriba un nombre para identificar al formulario: </label>
					  			<input type="text" class="form-control validate[required]" name="nombre" value=""  placeholder="Nombre del Formulario... " />
					  		</td>
					  	</tr>
						<tr>
						  <th class="titulo3">Preguntas del cuestionario</th>
						  <th class="titulo3">Respuestas que se almacenarán en la BD</th>
						</tr>
					  </thead>
					  <tbody>
					  	
						<tr>
						  <td>
						  	<div class="form-group col-lg-12">
						  		<label>Pregunta 1</label>
								<input type="text" class="form-control validate[required]" name="prod1[]" />
							</div>
						  </td>
						   <td>
							<div class="form-group col-lg-12">
								<label>Respuesta 1</label>
								<textarea class="form-control validate[required]" name="prod2[]"></textarea>
							</div>
						 </td>
						</tr>

					  </tbody>
					</table>
					<button id="btnadd" class="btn btn-primary">Agregar Nuevo</button>
					<button id="btnsubmit" type="submit" class="btn btn-success">Guardar</button>
			</form>
		</div>
	</div>
</div>

<script type="text/javascript">
	$(function() {
		var count = 1;
	    jQuery("#miform").validationEngine({promptPosition : "centerRight:0,-5"});
		
	   $(document).on("click","#btnadd",function( event ) {  
		  count++;
	      $('#tblprod tr:last').after('<tr><td><div class="form-group col-lg-12"><label>Pregunta '+count+'</label><input class="form-control validate[required]" type="text" name="prod1[]" /></div></td><td><div class="form-group col-lg-12"><label>Respuesta '+count+'</label><textarea class="form-control validate[required]" name="prod2[]"></textarea></td></tr>');
	      event.preventDefault();
	   });
	   


	   /*$( "#miform" ).submit(function( event ) {
	      var frm = $(this);
		  var formulario = $(this).serialize();
		  
		  if($('#miform').validationEngine('validate')){
		  $.post( "valida_formulario.php", formulario)
			    .done(function(data){
			      //alert(data);
				  //$(frm)[0].reset();
				})
				.fail(function() {
	           	  alert( "Error no pude enviar los datos" );
				});
		  }
		  event.preventDefault();
		});*/
	});


</script>

</body>
</html>