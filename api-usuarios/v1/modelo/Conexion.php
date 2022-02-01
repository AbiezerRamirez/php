<?php
include_once 'config.php';
class Conexion 

{
    protected $conexion;        
    
    public function  __construct()
    {
        try {
            $this->conexion = new PDO('mysql:host=' . HOST . ';dbname=' . DATABASE . ';port=' . PORT . ';charset=' . CHARSET, USERNAME, PASSWORD);

            $this->conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            
            return $this->conexion;
            
        } catch (PDOException $e) {
            exit("Error: " . $e->getMessage());
        }
    }
}