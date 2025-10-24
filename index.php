<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/bootstrap.min.css">
    <link rel="stylesheet" href="./css/styles.css">
    <title>Party & S.E.(X)</title>
</head>
<body>

   <header class="">
        <div class="container-fluid pt-2"> 
            
            <div class="header-content align-items-center row ">
                <div class="col-sm-6 col-md-4 col-lg-4 d-flex justify-content-center justify-content-md-start">
                    <a href="./index.php"><img src="./src/img/favicon2.png" class="favicon" ></a>
                </div>
                <div class="col-sm-6 col-md-4 col-lg-4 d-flex justify-content-center">
                    <img src="./src/img/Party & S.E.(X) Logo3.png" alt="Logo de Party & S.E.(X)" class="logo">
                </div>
                <nav class="main-nav col-sm-12 col-md-4 col-lg-4 d-flex justify-content-center justify-content-md-end " >
                    <a href="./pages/reglas.php" class="nav-link">Reglas</a>
                    <a href="./pages/contact.php" class="nav-link">Contacto</a>
                </nav>
            </div>
            
            <hr class="line-divider mb-5">
        </div>
    </header>

    <main class="hero-section">
        <div class="hero-content-wrapper">
            <div class="game-card">
                <h2>¡Bienvenido/a <a class="titulo">Party & S.E.(X)</a>!</h2>
                <p>Prepárate para las preguntas más atrevidas. ¡El juego está a punto de empezar!</p>
            </div>
            <form  method="get">
                <div class="container-fluid">
                    <div class="cuadro-jugadores row justify-content-center align-items-center">
                        <div class="col-sm-12 col-md-6 col-lg-4 mb-3">
                            <div class="card p-4 d-flex gap-2">
                            <?php
                            ?>
                            <input type="text" name="nombre" placeholder="Nombre" required>
                            <input type="file" name="upload">
                            </div>
                        </div>

                        <div class="col-sm-12 col-md-6 col-lg-4 mb-3">
                            <div class="card p-4 d-flex gap-2">
                            <input type="text" name="nombre" placeholder="Nombre">
                            <input type="file" name="upload">
                            </div>
                        </div>

                        <div class="col-sm-12 col-md-6 col-lg-4 mb-3">
                            <div class="card p-4 d-flex gap-2">
                            <input type="text" name="nombre" placeholder="Nombre">
                            <input type="file" name="upload">
                            </div>
                        </div>
                    </div>
                </div>
                
                <button type="submit" class="button p-1 d-flex justify-content-center mt-3">Iniciar Juego</button>
            </form>
            
            <?php 
                $nombre = $_GET["nombre"] ? htmlspecialchars($_GET["nombre"]) : '';
                if ($nombre) {
                    echo "<h3>¡Hola, $nombre! ¡Que comience la diversión!</h3>";
                }                
            ?>
        </div>
        <a href="index.php" class="boton boton-index d-flex "><img src="./src/img/favicon2.png"></a>

    </main>

    <footer class="text-center mt-5 mb-3">
        <p>&copy; 2025 Derechos Reservados para ojedvSccisors</p>
        <p>Juega con responsabilidad y solo si eres mayor de edad.</p>
    </footer>

</body>
</html>