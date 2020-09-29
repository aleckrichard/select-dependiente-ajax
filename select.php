<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <title>Select Ajax ciudades de Chile</title>
    <script src="//code.jquery.com/jquery-1.11.2.min.js"></script>
  </head>
  <body>
<div class="container">
    <h1 align="center">Select dependiente utilizando Ajax de las ciudades de Chile</h1><br>

    <select id="select_region" class="form-control">
      <option value="">Seleccione Región</option>
      <?php
      include_once 'conexion.php';
      $sql = "SELECT * FROM regiones";
      $ejecutar = mysqli_query( $conectar, $sql) or die ( "error en la consulta");
        while ($fila = mysqli_fetch_array($ejecutar)){
          $id_r = $fila['region_id'];
          $nombre_r = $fila['region_nombre'];
          echo "<option value='$id_r'>".$nombre_r."</option>";
        } ?>
    </select><br>

    <select id="select_provincia" class="form-control">
      <option value="">Seleccione Provincia</option>
    </select><br>

    <select id="resultado_comunas" class="form-control">
      <option value="">Seleccione Comuna</option>
    </select>
</div>


    <script>
    $(document).ready(function(){
      $("#select_region").on('change', function() {
        var valor_r = $('#select_region').val();
        // alert(valor_r);
        $.ajax({
          type:"POST",
          url:"buscar.php",
          data:{'id_region':valor_r},
          success:function(r){
            $('#select_provincia').html(r);
          }
        });
      });

      $("#select_provincia").on('change', function() {
        var valor = $('#select_provincia').val();
        // alert(valor);
        $.ajax({
          type:"POST",
          url:"buscar.php",
          data:{'id_provincia':valor},
          success:function(r){
            $('#resultado_comunas').html(r);
          }
        });
      });
    });
    </script>
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
  </body>
</html>
