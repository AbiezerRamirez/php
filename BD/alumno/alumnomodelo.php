<?php

	class AlumnoModelo {

		private $pdo; // Variable con la conexión

		// Constructor
		public function __CONSTRUCT() {
			try {
				$this->pdo = new PDO('mysql:host=localhost;dbname=test', 'root', '');
				$this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);		        
			} catch(Exception $e) {
				die($e->getMessage()); // como exit
			}
		}

		// Consulta de todos los elementos (READ de CRUD)
		// en este caso, función que devuelve un array de objetos alumno con todos los alumnos de la BD
		public function Listar() {
			try {
				$result = array();  //array de alumnos

				$stm = $this->pdo->prepare("SELECT * FROM alumnos");
				$stm->execute();

				// Agrego cada alumno al array de objetos Alumno
				foreach($stm->fetchAll(PDO::FETCH_OBJ) as $r) { // PDO::FETCH_OBJ devuelve un objeto anónimo
					$alumno = new Alumno();

					$alumno->__SET('id', $r->id);
					$alumno->__SET('Nombre', $r->Nombre);
					$alumno->__SET('Apellido', $r->Apellido);
					$alumno->__SET('Sexo', $r->Sexo);
					$alumno->__SET('FechaNacimiento', $r->FechaNacimiento);

					$result[] = $alumno;
				}

				return $result;
			} catch(Exception $e) {
				die($e->getMessage());
			}
		}

		// Consulta de un elemento (READ de CRUD)
		// en este caso, función que devuelve el alumno con código $id que me pasan
		public function Obtener($id) {
			try {
				$stm = $this->pdo
						->prepare("SELECT * FROM alumnos WHERE id = ?"); //https://www.php.net/manual/es/pdostatement.fetchall.php			

				$stm->execute(array($id)); // porque "WHERE id = ?", es decir, debo indicar la variable a sustituir por ?
				$r = $stm->fetch(PDO::FETCH_OBJ);

				$alumno = new Alumno();

				$alumno->__SET('id', $r->id);
				$alumno->__SET('Nombre', $r->Nombre);
				$alumno->__SET('Apellido', $r->Apellido);
				$alumno->__SET('Sexo', $r->Sexo);
				$alumno->__SET('FechaNacimiento', $r->FechaNacimiento);

				return $alumno;
			} catch (Exception $e) {
				die($e->getMessage());
			}
		}

		// Eliminación (DELETE de CRUD)
		// en este caso, función que elimina el alumno con código $id que me pasan
		public function Eliminar($id) {
			try {
				$stm = $this->pdo
						->prepare("DELETE FROM alumnos WHERE id = ?");			          

				$stm->execute(array($id));
			} catch (Exception $e) {
				die($e->getMessage());
			}
		}

		// Actualización (UPDATE de CRUD)
		// en este caso, función que modifica los datos del objeto alumno con código $id que me pasan
		public function Actualizar(Alumno $data) {
			try {
				$sql = "UPDATE alumnos SET 
							Nombre          = ?, 
							Apellido        = ?,
							Sexo            = ?, 
							FechaNacimiento = ?
						WHERE id = ?";

				$this->pdo->prepare($sql)
					->execute(
						array(
							$data->__GET('Nombre'), 
							$data->__GET('Apellido'), 
							$data->__GET('Sexo'),
							$data->__GET('FechaNacimiento'),
							$data->__GET('id')
						)
					);
			} catch (Exception $e) {
				die($e->getMessage());
			}
		}

		// Inserción (CREATE de CRUD)
		// en este caso, función que inserta los datos del objeto alumno que me pasan
		public function Registrar(Alumno $data) {
			try {
				$sql = "INSERT INTO alumnos (Nombre,Apellido,Sexo,FechaNacimiento) VALUES (?, ?, ?, ?)";

				$this->pdo->prepare($sql)
					->execute(
						array(
							$data->__GET('Nombre'), 
							$data->__GET('Apellido'), 
							$data->__GET('Sexo'),
							$data->__GET('FechaNacimiento')
						)
					);
			} catch (Exception $e) {
				die($e->getMessage());
			}
		}

	}
