<?php

$conectar = mysqli_connect('localhost', 'usuario', 'pass','ciudades');

// Verificar conexión
if (isset($conectar)) {
  // echo "Conectado a la BD";
}else {
  die("Error en la conexion a la BD: " . mysqli_connect_error());
}
?>
