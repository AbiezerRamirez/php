<?php 
    // Definición de una clase. 
    class UnaClase { 
        // Cualquier propiedad. 
        private $x; 
        // Método constructor. 
        public function __construct($valor) { 
            $this->x = $valor; 
        } 
        // Método que lleva a cabo cualquier acción. 
        public function accion() { 
            // Por alguna razón, se prohíbe la acción 
            // si la propiedad es negativa: se produce una excepción. 
            if ($this->x < 0) { 
                throw new Exception('Acción prohibida',123); 
            } 
        } 
    } 

    // Crear dos objetos. 
    $objeto = new UnaClase(1);   
    try { 
        echo 'Objeto 1: '; 
        $objeto->accion(); // no va a provocar ninguna excepción 
        echo 'OK<br />'; 
    } catch (Exception $e) { 
        echo 'ERROR ',$e->getCode(),' - ',$e->getMessage(),'<br />'; 
    }   //Muestra...     Objeto 1: OK
    $objeto = new UnaClase(-1); 
    try { 
        echo 'Objeto 2: '; 
        $objeto->accion(); // va a provocar una excepción 
        echo 'OK<br />'; 
    } catch (Exception $e) { 
        echo 'ERROR ',$e->getCode(),' - ',$e->getMessage(),'<br />'; 
    }   //Muestra...     Objeto 2: ERROR 123 - Acción prohibida
    echo '--<br />';  

    // Lo mismo con un bloque finally.  
    $objeto = new UnaClase(1);   
    try { 
        echo 'Objeto 1: '; 
        $objeto->accion(); // no va a provocar ninguna excepción 
        echo 'OK. '; 
    } catch (Exception $e) { 
        echo 'ERROR ',$e->getCode(),' - ',$e->getMessage(),'. '; 
    } finally {  
        echo 'FINALLY<br />';  
    }  //Muestra...     Objeto 1: OK. FINALLY
    $objeto = new UnaClase(-1); 
    try { 
        echo 'Objeto 2: '; 
        $objeto->accion(); // producirá una excepción 
        echo 'OK. '; 
    } catch (Exception $e) { 
        echo 'ERROR ',$e->getCode(),' - ',$e->getMessage(),'. '; 
    } finally {  
        echo 'FINALLY<br />';  
    }   //Muestra...     Objeto 2: ERROR 123 - Acción prohibida. FINALLY
?> 
