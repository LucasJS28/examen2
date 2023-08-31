<?php require_once 'perso.php'; ?>
<!DOCTYPE html>
<html>

<head>
    <meta charset='utf-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    <link rel='stylesheet' type='text/css' media='screen' href='css/main.css'>

</head>

<body>
    <header class="content">
        <img class="ad-image" src="img/banner.jpg" alt="Publicidad">
        <div class="ad-image-text">Repete - examen</div>
    </header>
    <nav id="menu" class="menu"></nav>
    <section>
        <article class="texto">
            <?php echo perso::valida(); ?><br>
            <h1 class="title">instrucciones</h1>
            <br>
            <br>
            En el presente examen se solicita que se cumplan las siguientes actividades
            Donde tendrán 2 horas para el desarrollo de la actividad, y no tendrán acceso a internet y el uso de
            celular esta estrictamente prohibido siendo causal de la reprobación del presente examen así como el ser
            sorprendido usando cualquier tipo de página ajena a los apuntes personales.
            <br><br>
            Las actividades solicitadas son:
            <div class="contenido">
                <ol>
                    <li>En la sección “Personajes”, "Ingresar Nuevo", "carro de compra" se debe generar los códigos necesarios para que no se puede ingresar a estas secciones sin haber iniciado session.</li>
                    <li>Agregue una nueva opción al menú para la administración de usuarios.</li>
                    <li>En la nueva seccion de administración de usuarios agregue un formulario para crear los nuevos usuarios.</li>
                    <li>Además, agregue una sección donde mostrar de los usuarios registrados.</li>
                    <li>Debe implementarse la funcionalidad de poder cambiar la contraseña con validación de cambio de contraseña, solicitando reingresar la anterior y pidiendo la nueva 2 veces en campos de tipo "password".</li>
                    <li>Implemente la funcionalidad de poder eliminar un usuario, quitando la posibilidad de eliminar al usuario "admin" el cual no puede ser modificado por ningún usuario, solo puede ser modificado por el mismo usuario y no eliminado.</li>
                    <li>El formulario de ingreso del nuevo usuario debe ser validado por javascript donde los valores deben esta completos para poder registrar uno nuevo.</li>
                    <li>Implemente la función para hacer la página responsiva en el css.</li>
                </ol>
                <br>
            </div>
        </article>
    </section>
    <footer>
        <img class="ad-image" src="img/bannerFoter.jpg" alt="Publicidad">
    </footer>
</body>
<script src='js/main.js'></script>

</html>