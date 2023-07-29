<?php
require '../../includes/funciones.php';
$auth = estaAutenticado();

if (!$auth) {
  header('Location ../../index.php');
}

//Base de datos
require '../../includes/config/database.php';
$db = conectarDB();

//Consultar para obtener los vendedores

$consulta = "SELECT * FROM vendedores";
$resultado = mysqli_query($db, $consulta);

//Arreglo con mensaje de errores
$errores = [];

$titulo = '';
$precio = '';
$imagen = '';
$descripcion = '';
$habitaciones = '';
$wc = '';
$estacionamiento = '';
$vendedores_Id = '';

//Ejecutar el codigo despues de que el usuario envia el formulario
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  
  /*
  echo "<pre>";
  var_dump($_POST);
  echo "</pre>";

  echo "<pre>";
  var_dump($_FILES);
  echo "</pre>";
*/


  $titulo = mysqli_real_escape_string($db, $_POST['titulo']);
  $precio = mysqli_real_escape_string($db, $_POST['precio']);
  $descripcion = mysqli_real_escape_string($db, $_POST['descripcion']);
  $habitaciones = mysqli_real_escape_string($db, $_POST['habitaciones']);
  $wc = mysqli_real_escape_string($db, $_POST['wc']);
  $estacionamiento = mysqli_real_escape_string($db, $_POST['estacionamiento']);
  $vendedores_Id = mysqli_real_escape_string($db, $_POST['vendedor']);
  $creado = mysqli_real_escape_string($db, date('Y/m/d'));

  //Asignar files hacia una variable

  $imagen = $_FILES['imagen'];


  if (!$titulo) {
    $errores[] = "Debes añadir un titulo";
  }

  if (!$precio) {
    $errores[] = "El precio es obligatorio";
  }
  if (strlen($descripcion) < 50) {
    $errores[] = "La descripcion es obligatoria";
  }
  if (!$habitaciones) {
    $errores[] = "El numero de habitaciones es obligatorio";
  }
  if (!$wc) {
    $errores[] = "El numero de baños es obligatorio";
  }
  if (!$estacionamiento) {
    $errores[] = "El numero de estacionamientos es obligatorio";
  }
  if (!$vendedores_Id) {
    $errores[] = "Selecciona un vendedor";
  }
  if (!$imagen['name'] || $imagen['error']) {
    $errores[] = "La imagen es obligatoria";
  }

  //Validar por tamaño

   $medida = 1000 * 1000;
  if ($imagen['size']> $medida) {
    $errores[] = 'La imagen es muy pesada';
  }

  /** 
    echo "<pre>";
    var_dump($errores);
    echo "</pre>";
    exit;
   */

  //Revisar que el arreglo de errores este vacio

  if (empty($errores)) {

    //Subida de archivos

    //Crear carpeta 
    $carpetaImagenes = '../../imagenes/';
    
    if(!is_dir($carpetaImagenes)){
      mkdir($carpetaImagenes);
    }
    //Generar un nombre unico
    $nombreImagen = md5(uniqid(rand(),true)). ".jpg";

    //Subir la imagen 
    move_uploaded_file($imagen['tmp_name'], $carpetaImagenes . $nombreImagen );
    



    //Insertar los valores 

    $query = "INSERT INTO propiedades (titulo, precio, imagen, descripcion, habitaciones, wc, estacionamiento, creado, vendedores_id) VALUES ('$titulo', '$precio', '$nombreImagen', '$descripcion', '$habitaciones', '$wc', '$estacionamiento', '$creado','$vendedores_Id')";

    $resultado = mysqli_query($db, $query);

    if ($resultado) {
      header('Location: ../index.php?resultado=1');
    }
  }
}



incluirTemplates('header');
?>

<main class="contenedor seccion">
  <h1>Crear</h1>
  <?php foreach($errores as $error): ?>
    <div class="alerta error">
      <?php echo $error ?>
    </div>
   
  <?php endforeach; ?>
  <a href="../index.php" class="boton boton-verde">Regresar</a>

  <form action="crear.php" class="formulario" method="POST" enctype="multipart/form-data">
    <fieldset>
      <legend>Informacion General</legend>

      <label for="titulo">Titulo: </label>
      <input type="text" id="titulo" placeholder="Titulo propiedad" name="titulo" value="<?php echo $titulo ?>" >

      <label for="precio">Precio: </label>
      <input type="number" id="precio" placeholder="Precio propiedad" name="precio" value="<?php echo $precio ?>">

      <label for="imagen">Imagen: </label>
      <input type="file" id="imagen" accept="image/jpeg, image/png" name="imagen">

      <label for="descripcion">Descripcion: </label>
      <textarea id="descripcion" name="descripcion"><?php echo $descripcion ?></textarea>
    </fieldset>

    <fieldset>
      <legend>Informacion Propiedad</legend>

      <label for="habitaciones">Habitaciones: </label>
      <input type="number" id="habitaciones" placeholder="Ej: 3" min="1" max="9" name="habitaciones" value="<?php echo $habitaciones ?>">

      <label for="wc">Baños: </label>
      <input type="number" id="wc" placeholder="Ej: 3" min="1" max="9" name="wc" value="<?php echo $wc ?>">

      <label for="estacionamientos">Estacionamiento: </label>
      <input type="number" id="estacionamiento" placeholder="Ej: 3" min="1" max="9" name="estacionamiento" value="<?php echo $estacionamiento ?>">
    </fieldset>

    <fieldset>
      <legend>Vendedor</legend>
      <select name="vendedor">
        <option value="">--Seleccione--</option>
        <?php while($vendedor = mysqli_fetch_assoc($resultado) ): ?>
            <option <?php echo $vendedores_Id === $vendedor['id'] ? 'selected' : ''; ?> value="<?php echo $vendedor['id'];  ?>"><?php echo $vendedor['nombre']. " " . $vendedor['apellido']; ?></option>
        <?php endwhile; ?>
      </select>
    </fieldset>
    <input type="submit" value="Crear Propiedad" class="boton boton-verde">
  </form>
</main>
<?php
incluirTemplates('footer');
?>