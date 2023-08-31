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

<body>
    <header class="content">
        <img class="ad-image" src="img/banner.jpg" alt="Publicidad">
        <div class="ad-image-text">Ingresar Nuevo</div>
    </header>
    <nav id="menu" class="menu"></nav>
    <section>
        <article id="contenido" class="texto">
            <?php echo perso::valida(); ?><br>
            <h1 class="title">Ingreso de nuevo personaje</h1>
            <div class="contenido">
                <table>
                    <form method="POST" onsubmit="return validar()">
                        <tr>
                            <td><label for="nombre">Nombre:</label></td>
                            <td><input type="text" id="nom" name="nombre" ></td>
                        </tr>
                        <tr>
                            <td><label for="descripcion">Descripción:</label></td>
                            <td><textarea id="des" name="descripcion" ></textarea></td>
                        </tr>
                        <tr>
                            <td colspan="2">
                                <button type="submit">Guardar</button>
                            </td>
                        </tr>
                    </form>
                </table>
                <br>
                <br>
                <br>
            </div>
        </article>
    </section>

    <footer>
        <img class="ad-image" src="img/bannerFoter.jpg" alt="Publicidad">
    </footer>
</body>
<script src='js/main.js'> <?php perso::insertar(); ?></script>

</html>