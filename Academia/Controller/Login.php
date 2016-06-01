<?php  
	class Login
	{
		public $email;
		public $password;
		public $mensaje;

		public function verificar()
		{
			$model = new Conexion;
			$conexion = $model->conectar();
			$sql = 'SELECT U.idusuario, U.password, U.alias, U.nombres, U.apellidos, E.tipo ,E.idestado, R.privilegio, R.idrol FROM usuario U INNER JOIN estado E ON U.estado_idestado = E.idestado
                INNER JOIN rol R ON U.rol_idrol = R.idrol WHERE ';
			$sql .= 'alias=:alias AND password=:password';
			$consulta = $conexion->prepare($sql);
			$consulta->bindParam(':alias', $this->usuario, PDO::PARAM_STR);
			$consulta->bindParam(':password', $this->password, PDO::PARAM_STR);
			$consulta->execute();
			$total = $consulta->rowCount();
			if($total == 0)
			{
				$this->mensaje = '<script type="text/javascript"> alert("Error al iniciar sesión credenciales no validas");</script>';
			}
			else
			{

				$fila = $consulta->fetch();
				session_start();
				$_SESSION['login']= true;
				$_SESSION['idusuario']= $fila['idusuario'];
				$_SESSION['nombres']= $fila['nombres'];
				$_SESSION['apellidos']= $fila['apellidos'];
				$_SESSION['idrol']= $fila['idrol'];
				$_SESSION['valido'] = $fila['idestado'];
				$_SESSION['privilegio'] = $fila['privilegio'];
				header('location: ../View/dashboard.php');


			}

		}
	}
?>
