<?php
session_start();

if (!isset($_SESSION['jugadores'])) {
    $_SESSION['jugadores'] = [];
}
if($cont_jugadores = count($_SESSION['jugadores'])) {
        mostrarJugadores();

}

// Variables

$hayJugadores = !empty($_SESSION['jugadores']);

?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="./js/index.js"></script>
    <link rel="stylesheet" href="./css/bootstrap.min.css">
    <link rel="stylesheet" href="./css/styles.css">
    <title>Party & S.E.(X)</title>
</head>
<body>

   <header id="header">
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

            

            <form method="POST" enctype="multipart/form-data" id="formJugadores">
                <div class="container-fluid">
                    <div class="cuadro-jugadores row justify-content-center align-items-center" id="contenedorJugadores">
                        <div class="col-sm-12 col-md-6 col-lg-4 mb-3 tarjeta-jugador">
                            <div class="card p-4 d-flex gap-2">
                                <input type="text" name="nombres[]" placeholder="Nombre">
                                <input type="file" name="fotos[]" accept="image/*">
                            </div>
                        </div>

                        <div class="col-sm-12 col-md-6 col-lg-4 mb-3 tarjeta-jugador">
                            <div class="card p-4 d-flex gap-2">
                                <input type="text" name="nombres[]" placeholder="Nombre">
                                <input type="file" name="fotos[]" accept="image/*">
                            </div>
                        </div>

                        <div class="col-sm-12 col-md-6 col-lg-4 mb-3 tarjeta-jugador">
                            <div class="card p-4 d-flex gap-2">
                                <input type="text" name="nombres[]" placeholder="Nombre">
                                <input type="file" name="fotos[]" accept="image/*">
                            </div>
                        </div>
                    </div>
                    <div class="d-flex justify-content-center gap-3 mt-3">
                        <button type="button" onclick="añadirTarjeta()" class="p-3 bg-color-secundary">Añadir Jugador</button>  <?php //Se le pone type="button" porque al estar dentro del formulario, si no pones nada lo considera como el submit. Z>Se le pone type="button" porque al estar dentro del formulario, si no pones nada lo considera como el submit. ?>

                        
                        <button class="submit p-3 bg-primary ">Validar Jugadores</button>
                    </div>
                </div>
            </form>
        </div>

        <a href="#header" class="boton boton-index d-flex "><img src="./src/img/favicon2.png"></a>
    </main>

    <footer class="text-center mt-5 mb-3">
        <p>&copy; 2025 Derechos Reservados para ojedvSccisors</p>
        <p>Juega con responsabilidad y solo si eres mayor de edad.</p>
    </footer>

    <?php
    function mostrarJugadores() {
        echo "<script>
            const contenedorJugadores = document.getElementById('contenedorJugadores');
            contenedorJugadores.innerHTML = '';";
        
        foreach ($_SESSION['jugadores'] as $jugador) {
            $nombre = htmlspecialchars($jugador['nombre'], ENT_QUOTES, 'UTF-8');
            $foto = htmlspecialchars($jugador['foto'], ENT_QUOTES, 'UTF-8');
            
            echo "
            const tarjetaJugador = document.createElement('div');
            tarjetaJugador.className = 'col-sm-12 col-md-6 col-lg-4 mb-3 tarjeta-jugador';
            tarjetaJugador.innerHTML = `
                <div class='card p-4 d-flex gap-2'>
                    <input type='text' name='nombres[]' value='{$nombre}' required>
                    <input type='file' name='fotos[]' accept='image/*' required>
                    <img src='{$foto}' alt='Foto de {$nombre}' class='img-fluid mt-2'>
                </div>
            `;
            contenedorJugadores.appendChild(tarjetaJugador);
            ";
        }
        
        echo "</script>";
    }
    ?>

</body>
</html>