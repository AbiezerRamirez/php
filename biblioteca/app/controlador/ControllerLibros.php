<?php 
Class ControllerLibros {
    
    public static $conexion;
    
    public function __construct() {
        self::$conexion = Conectar::conexion();
    }

    public static function presentacion() {
        $parametros = array(
            'mensaje' => '',
            'fecha' => date('d-m-Y'),
        );
        require 'app/vista/presentacion.php';
    }

    public static function listarLibros() {        
        //Mostrar mensaje sobre libro añadido        
        //$mensaje = 'Libro modificado';
        isset($_REQUEST['mensaje']) ? $mensaje= $_REQUEST['mensaje'] : $mensaje = '';       
        $parametros = array(
            'libros' => Libros::listarLibros(),
            'mensaje' => $mensaje,
        );        
        require 'app/vista/VmostrarLibros.php';
    }

    public static function ver() {
        if (isset($_REQUEST['id'])) {
            $id = $_REQUEST['id'];            
            $libro = Libros::dameLibro($id);
            $parametros = $libro;
        }
        require 'app/vista/VverLibro.php';
    }

    public static function insertarLibro() {
        $error=NULL;
        !isset($_SESSION['nombre']) ? header('location:index.php') : NULL;
        $parametros = array(
            'titulo' => '',
            'nombre' => '',
            'editorial' => '',
            'tema' => '',                      
            'mensaje' => ''
        );
        
        $autores     = Autores::listarAutores();
        $temas       = Libros::listarTemas();
        $editoriales = Libros::listarEditoriales();
       
        if (isset($_REQUEST['nombre'])) {
            FiltrarTraitMatriz::filtrarM($_REQUEST);
            $parametros['titulo']=isset ($_REQUEST['titulo'])? $_REQUEST['titulo']:'';
            $parametros['nombre'] = isset($_REQUEST['nombre']) ? ucwords($_REQUEST['nombre']) : '';
            $parametros['editorial']= isset($_REQUEST['editorial']) ? $_REQUEST['editorial'] : '';
            $parametros['tema'] = isset($_REQUEST['tema']) ? $_REQUEST['tema'] : '';
            $parametros['mensaje']="Libro añadido correctamente";
            foreach ($parametros as $indice=>$valor)  {
                if (empty($valor)) {
                    $error=1;
                    $parametros['mensaje']="Error al insertar el registro.Comprueba los campos";
                    break;
                }
            }
            if (!isset($error)) {
                $id = Autores::buscarAutorNombre($parametros['nombre']);  
                if ($id==false)  {
                    $id=Autores::insertarAutor($parametros['nombre']);
                    //$titulo,$editorial,$tema,$idAutor,                   
                    //insertar autor y recuperar id
                    //insertar libro con el id recibido
                }
                else {
                    $id=$id['id'];
                    $existe = Libros::buscarTituloAutor($parametros['titulo'], $id);
                }
                if (!$existe) {
                    $idLibro = Libros::insertarLibro($parametros['titulo'], $parametros['editorial'], $parametros['tema'], $id);
                    $mensaje= "El libro ". $parametros['titulo']." se añadió correctamente" ;
                    header("location:index.php?ctl=listarLibros&mensaje=$mensaje");
                   //ControllerLibros::listarLibros()  VmostrarLibros.php?mensaje=$mensaje");
                }
                else {
                   $titulo= $parametros['titulo'];
                   $parametros['mensaje'] = "El libro $titulo ya existe en la base de datos";
                }
                //exit;               
            }
        }
        require 'app/vista/VinsertarLibro.php';
    }
    
}





?>