<?php
	// TODO 12
	// Comprobar que el CN del certificado es un usuario en la BD.

	session_start();
		include ("includes/abrirbd.php");
		$sql = "SELECT * FROM usuarios WHERE user ='{$_SERVER['SSL_CLIENT_S_DN_CN']}'";
		$resultado = mysqli_query($link, $sql);

		if (mysqli_num_rows($resultado) == 1) {
			$usuario = mysqli_fetch_assoc($resultado);
				// TODO 3 La condición del if es que el password sea correcto 	
				$_SESSION['autenticado'] = 'correcto';
				$_SESSION['permisos'] = str_split($usuario['permisos']);
				$_SESSION['user'] = $usuario['user'];
				header("Location:MasterWeb.php");
		
		} else {
			$_SESSION['autenticado'] = 'incorrecto';
			header("Location: NoAuth.php");
		}
		mysqli_close($link);

?>