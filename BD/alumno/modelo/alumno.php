<?php
	class Alumno {
		private $id;
		private $Sexo;
		private $Nombre;
		private $Apellido;
		private $Fotografia;
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
	