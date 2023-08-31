<?php require_once 'perso.php'; ?>
<!DOCTYPE html>
<html>

<head>
    <meta charset='utf-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <title>Page Title</title>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    <link rel='stylesheet' type='text/css' media='screen' href='css/main.css'>
</head>
<style>
    *{
        color: white;
    }
</style>
<body>
    <header class="content">
        <img class="ad-image" src="img/banner.jpg" alt="Publicidad">
        <div class="ad-image-text">Rubrica</div>
    </header>
    <nav id="menu" class="menu"></nav>
    <section>
    <?php
        require_once 'conexion.php';
        $database = new connexion();
        if (isset($_POST['submit'])) {
            $nombre = $_POST['nombre'];
            $pass = $_POST['pass'];

            if (isset($_POST['id']) && !empty($_POST['id'])) {
                $id = $_POST['id'];
                $database->actualizarUsuario($id, $nombre, $pass);
            } else {
                $database->insertarUsuario($nombre, $pass);
            }
        }

        if (isset($_GET['eliminar'])) {
            $id = $_GET['eliminar'];
            $database->eliminarUsuario($id);
        }

        // Obtener la lista de usuarios desde la base de datos
        $usuarios = $database->mostrarUsuarios();
    ?>

    <h1>Usuarios</h1>

    <!-- Formulario para agregar o actualizar usuarios -->
    <form method="post" id="usuarioForm" onsubmit="return validarFormulario()">
        <input type="hidden" name="id" value="<?php echo isset($_GET['editar']) ? $_GET['editar'] : ''; ?>">
        <label for="nombre">Nombre:</label>
        <input type="text" name="nombre" id="nombre" required>
        <label for="pass">Contraseña:</label>
        <input type="password" name="pass" id="pass" required>
        <button type="submit" name="submit">Guardar</button>
    </form>

    <br>

    <!-- Tabla que muestra los usuarios -->
    <table border="1">
        <tr>
            <th>ID</th>
            <th>Nombre</th>
            <th>Acciones</th>
        </tr>
        <?php foreach ($usuarios as $usuario): ?>
            <tr>
                <td><?php echo $usuario['id']; ?></td>
                <td><?php echo $usuario['nombre']; ?></td>
                <td>
                    <a href="usuarios.php?editar=<?php echo $usuario['id']; ?>">Editar</a>
                    <a href="usuarios.php?eliminar=<?php echo $usuario['id']; ?>">Eliminar</a>
                </td>
            </tr>
        <?php endforeach; ?>
    </table>
    <script src='js/main.js'></script>
    <!-- JavaScript para la validación del formulario -->
    <script>
        function validarFormulario() {
            // Obtener los valores del formulario
            var nombre = document.getElementById('nombre').value.trim();
            var pass = document.getElementById('pass').value.trim();

            // Verificar que los campos no estén vacíos
            if (nombre === '' || pass === '') {
                alert('Por favor, completa todos los campos.');
                return false; // Detener el envío del formulario
            }

            return true; // Permitir el envío del formulario
        }
    </script>

    </section>
</body>
</html>
