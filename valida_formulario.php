
<?php
	$db = mysqli_connect('localhost', 'root', '', 'elp');
	if(!$db){
		exit('Fallo en la conexion');
	}



	if(isset($_POST['prod1']) AND isset($_POST['prod2']) AND isset($_POST['nombre'])){
		if( $_POST['prod1'] != "" AND $_POST['prod2'] != "" AND $_POST['nombre'] != "") {

			$nombre = $_POST['nombre'];
			$preguntas = $_POST['prod1']; // Returns an array
			$respuestas = $_POST['prod2']; // Returns an array
			
			$sql = "INSERT INTO formularios VALUES (null,'$nombre');";
			$consulta = mysqli_query($db, $sql);

			$sql1 = "SELECT ID FROM formularios ORDER BY ID DESC;";
			$consulta1 = mysqli_query($db, $sql1);
			$fila1= mysqli_fetch_row($consulta1);

			if($fila1){
				$aux = 0;
				$length = count($preguntas);
				while($aux < $length){
					$numPR = $aux + 1;
					$sql2 = "INSERT INTO tests VALUES ('$fila1[0]', $numPR,'$preguntas[$aux]', '$respuestas[$aux]');";
					$consulta2 = mysqli_query($db, $sql2);
					$aux++;

				}
			}
	
			mysqli_close($db);
			header('Location: /elp');
		}
		else{
			mysqli_close($db);
			header('Location: valida_formulario.php?error=si');
		}
	}
	else{
		mysqli_close($db);
		header('Location: valida_formulario.php?error=si');
	}

	
	
?>
