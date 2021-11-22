<?php 
    /* Podemos crear nuestras propias clases de excepción ampliando la clase Exception de base.
    class MiExcepción extends Exception {
        // definición de la clase
    } */

    //En este caso, se pueden utilizar varios bloques catch para procesar diferentes clases de excepción.
    // Por ejemplo:
    try {   
        // código susceptible de generar errores   
        //... 
    // } catch (MiException $e) {   
        // código destinado a procesar los errores de la clase MiException   
        //... 
    } catch (Exception $e) {   
        // código destinado a procesar los errores de la clase Exception de base
        //...   
    } 

    //También se puede definir un bloque catch para tratar varias clases de excepción diferentes; esta funcionalidad es práctica cuando se deben tratar varias excepciones de la misma manera.
    // Por ejemplo:

    // try {   
        // código susceptible de generar errores  
        //...  
    // } catch (Exception1 | Exception2 $e) {  
        // código destinado a tratar errores de las  
        // clases Exception1 y Exception 2  
        //...  
    // } 

    //Desde la versión 8, throw es una expresión que puede utilizarse en un contexto en el que se 
    //espera una expresión, lo cual puede ser interesante para crear una excepción si fuera necesario.
    // Por ejemplo:

    //Con el operador ternario (?):
    $n = is_array($t) ? count($t) : throw new exception('Matriz esperada'); 

    //Con el operador de unión NULL (??):
    $valor = $valor1 ?? $valor2 ?? throw new Exception('Valor obligatorio'); 

    //Con la expresión match:
    $valor = match($x) {
        1 => 'uno',
        2 => 'dos',
        default => throw new Exception('x debe ser igual a 1 o 2') 
    }; 
?>