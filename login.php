<?php
require 'includes/config/database.php';
$db = conectarDB();

//Autenticar el usuario
$errores = [];
if($_SERVER['REQUEST_METHOD'] === 'POST'){
    //echo "<pre>";
    //var_dump($_POST);
    //echo "</pre>";

    $email = mysqli_real_escape_string($db,filter_var( $_POST['email'], FILTER_VALIDATE_EMAIL));
    $password = mysqli_real_escape_string($db, $_POST['password']);

    if (!$email) {
        $errores[] = "El email es obligatio o no es valido";
    }
    if (!$password) {
        $errores[] = "El Password es obligatorio";
    }
    if (empty($errores)) {
        //Revisar si el usuario existe
        $query = "SELECT * FROM usuarios WHERE email = '{$email}'";
        $resultado = mysqli_query($db,$query);
        var_dump($query);
        if ($resultado->num_rows) {
            //Revisar si el password es correcto
            $usuario = mysqli_fetch_assoc($resultado);

            //Verificar si el password es correcto
            $auth = password_verify($password, $usuario['password']);

            if ($auth) {
                session_start();
                //Llenar el arreglo de la sesion 
                $_SESSION['usuario'] = $usuario['email'];
                $_SESSION['login'] = true;
                header('Location: admin/index.php');
            }else{
                $errores[] = "El Password es Incorrecto";
            }
        }else{
            $errores[] = "El resultado no existe";
        }
    }

}


//Incluye el header
require 'includes/funciones.php';
incluirTemplates('header');
?>

<main class="contenedor seccion contenido-centrado">
    <h1>Iniciar Sesion</h1>
    <?php foreach( $errores as $error): ?>
        <div class="alerta error">
            <?php echo $error; ?>
        </div>
    <?php endforeach;?>
    <form class="formulario" method="POST">
        <fieldset>
            <legend>Email y Password</legend>
            <label for="email">Email</label>
            <input type="email" placeholder="Tu email" id="email" name="email" require>

            <label for="password">Password</label>
            <input type="password" placeholder="Tu Password" id="password" name="password" require>
        </fieldset>
        <input type="submit" value="Iniciar Sesion" class="boton boton-verde">
    </form>
</main>
<?php
incluirTemplates('footer');
?>