<?php

include_once 'conexion.php';
$id_region = $_POST['id_region'];
$id_provincia = $_POST['id_provincia'];

if (isset($id_region)){

  $sql_r="SELECT provincia_id, provincia_nombre
    from provincias
    where region_id=$id_region";
  $result_r=mysqli_query($conectar,$sql_r);

    while ($ver_r=mysqli_fetch_row($result_r)) {
      echo '<option value='."$ver_r[0]".'>'."$ver_r[1]".'</option>';
    }
}

if (isset($id_provincia)) {

  $sql="SELECT comuna_id, comuna_nombre
    from comunas
    where provincia_id=$id_provincia";
  $result=mysqli_query($conectar,$sql);

    while ($ver=mysqli_fetch_row($result)) {
      echo '<option value='."$ver[0]".'>'."$ver[1]".'</option>';
    }
}

	?>
