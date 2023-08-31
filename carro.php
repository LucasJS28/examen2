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
        <div class="ad-image-text">Carro</div>
    </header>
    <nav id="menu" class="menu"></nav>
    <section>
        <article class="texto">
        <?php echo perso::valida(); ?><br>
        </article>
    </section>

    <footer>
        <img class="ad-image" src="img/bannerFoter.jpg" alt="Publicidad">
    </footer>
</body>
<script src='js/main.js'></script>
</html>