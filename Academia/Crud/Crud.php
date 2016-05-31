<?php 
	class Crud
	{
		public $insertInto;
		public $insertColumns;
		public $insertValues;
		public $mensaje;
		public $select;
		public $from;
		public $condition;
		public $rows;
		public $fetch;

		public function Create()
		{
			$model = new Conexion;
			$conexion = $model->conectar();
			$insertInto = $this->insertInto;
			$insertColumns = $this->insertColumns;
			$insertValues = $this->insertValues;
			$sql = "INSERT INTO $insertInto ($insertColumns) VALUES ($insertValues)"; 
			$consulta = $conexion->prepare($sql);
			if (!$consulta)
			{
				$this->mensaje = "Error al crear el registro";
			}
			else
			{
				$consulta->execute();
				$this->mensaje= "Registro creado Correcamente";
			}

		}

		public function Read()
		{
			$model = new Conexion;
			$conexion = $model->conectar();
			$select = $this->select;
			$from = $this->from;
			$condition = $this->condition;
			if($condition != '')
			{
				$condition = " WHERE ". $condition;
			}

			$sql = "SELECT $select FROM $from $condition";

			$consulta = $conexion->prepare($sql);
			$consulta->execute();
			$this->fetch = $consulta;


			while ($filas = $consulta->fetch())
			{
				$this->rows[] = $filas;
			}
		}
	}
?>