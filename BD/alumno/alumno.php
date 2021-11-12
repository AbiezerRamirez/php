<?php
	class Alumno {
		private $id;
		private $Nombre;
		private $Apellido;
		private $Sexo;
		private $FechaNacimiento;

		/* 
		public function getId(): int{
        	return $this->id;
    	}

    	public function setId(int $id){
        	$this->id = $id;
    	}
		*/

		public function __GET($k){ return $this->$k; }
		public function __SET($k, $v){ return $this->$k = $v; }
	}
	