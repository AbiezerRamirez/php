<?php

// ESTRUCTURA A

/* 
<form action=“mis_ficheros.php" method="post" enctype="multipart/form-data">
<p>Imágenes:
<input type="file" name="imagenes[]" />
<input type="file" name="imagenes[]" />
<input type="file" name="imagenes[]" />
<input type="submit" value="Enviar" />
</p>
</form> 
*/

// $_FILES A

// array (size=1)
//     'imagenes' => array (size=5)
//         'name' => array (size=3)
//             0 => string 'actor2.jpg' (length=10)
//             1 => string 'actriz16.jpg' (length=12)
//             2 => string 'Formularios.docx' (length=24)
//         'type' => array (size=3)
//             0 => string 'image/jpeg' (length=10)
//             1 => string 'image/jpeg' (length=10)
//             2 => string 'application/vnd.openxmlformats-officedocument.wordprocessingml.document' 
//         (length=71)
//         'tmp_name' => array (size=3)
//             0 => string 'C:\wamp64\tmp\phpB8EB.tmp' (length=25)
//             1 => string 'C:\wamp64\tmp\phpB90B.tmp' (length=25)
//             2 => string 'C:\wamp64\tmp\phpB90C.tmp' (length=25)
//         'error' => array (size=3)
//             0 => int 0
//             1 => int 0
//             2 => int 0
//         'size' => array (size=3)
//             0 => int 7333
//             1 => int 5506
//             2 => int 15741

// ESTRUCTURA B

/* 
form enctype="multipart/formdata" action="mis_ficheros.php" method="POST">
<input name="primerfichero" type="file" />
<input name="segundofichero" type="file" />
<input name="tercerfichero" type="file" />
<input type="submit" value="Subir_archivo" />
</form> 
*/

// $_FILES B

// C:\wamp64\www\calculadora\mis_ficheros.php:3:
// array (size=3) 
//     'primerfichero' => 
//         array (size=5)
//         'name' => string 'actor2.jpg' (length=10)
//         'type' => string 'image/jpeg' (length=10)
//         'tmp_name' => string 'C:\wamp64\tmp\phpD25B.tmp' (length=25)
//         'error' => int 0
//         'size' => int 7333
//     'segundofichero' => 
//         array (size=5)
//         'name' => string 'actor5.jpg' (length=10)
//         'type' => string 'image/jpeg' (length=10)
//         'tmp_name' => string 'C:\wamp64\tmp\phpD25C.tmp' (length=25)
//         'error' => int 0
//         'size' => int 5594
//     'tercerfichero' => 
//         array (size=5)
//         'name' => string 'actriz19.jpg' (length=12)
//         'type' => string 'image/jpeg' (length=10)
//         'tmp_name' => string 'C:\wamp64\tmp\phpD28C.tmp' (length=25)
//         'error' => int 0
//         'size' => int 56845 


// SOLO IMAGENES

/* 
<form action=”procesando.php" method="post" enctype="multipart/form-data" > 
Sube una imagen:
<input type="hidden" name=MAX_FILE_SIZE value=10000 />
<input type="file" name=“mifoto" accept="image/png, .jpeg, .jpg, image/gif">
<input type="submit" value="Subir imagen">
</form> 
*/