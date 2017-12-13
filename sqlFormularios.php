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
          <h2><?php $fila1[1] ?></h2>
          <p><a class="btn btn-secondary" id="<?php $fila1[0] ?>" href="#" role="button">Comenzar &raquo;</a></p>
        </div><!--/span-->
        <?php
        $fila1= mysqli_fetch_row($consulta1);
	}
?>