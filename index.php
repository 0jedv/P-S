<?php
session_start();

if (!isset($_SESSION['jugadores'])) {
    $_SESSION['jugadores'] = [];
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $_SESSION['jugadores'] = [];
    
    for ($i = 0; $i < count($_POST['nombres']); $i++) {
        if (!empty($_POST['nombres'][$i]) && !empty($_FILES['fotos']['name'][$i])) {
            $ruta = './uploads/' . uniqid() . '_' . $_FILES['fotos']['name'][$i];
            move_uploaded_file($_FILES['fotos']['tmp_name'][$i], $ruta);
            $_SESSION['jugadores'][] = ['nombre' => $_POST['nombres'][$i], 'foto' => $ruta];
        }
    }
    header('Location: index.php');
    exit;
}

if (isset($_GET['limpiar'])) {
    session_destroy();
    header('Location: index.php');
    exit;
}

// Preparar datos para el HTML
$hayJugadores = !empty($_SESSION['jugadores']);
$jugadores = $_SESSION['jugadores'];
?>
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

            <?php if ($hayJugadores): ?>
            <div class="container-fluid mb-4">
                <h3 class="text-center mb-3">Jugadores Actuales</h3>
                <div class="row justify-content-center">
                    <?php foreach ($jugadores as $j): ?>
                    <div class="col-sm-6 col-md-4 col-lg-3 mb-3">
                        <div class="card p-3 text-center">
                            <img src="<?= $j['foto'] ?>" alt="<?= $j['nombre'] ?>" 
                                 style="width: 100%; height: 150px; object-fit: cover; border-radius: 10px;">
                            <h5 class="mt-2 text-white"><?= $j['nombre'] ?></h5>
                        </div>
                    </div>
                    <?php endforeach; ?>
                </div>
                <div class="text-center">
                    <a href="?limpiar=1" class="btn btn-danger">Limpiar Jugadores</a>
                </div>
            </div>
            <?php endif; ?>
            <form method="POST" enctype="multipart/form-data" id="formJugadores">
                <div class="container-fluid">
                    <div class="cuadro-jugadores row justify-content-center align-items-center" id="contenedorJugadores">
                        <div class="col-sm-12 col-md-6 col-lg-4 mb-3 tarjeta-jugador">
                            <div class="card p-4 d-flex gap-2">
                                <input type="text" name="nombres[]" placeholder="Nombre" required>
                                <input type="file" name="fotos[]" accept="image/*" required>
                            </div>
                        </div>

                        <div class="col-sm-12 col-md-6 col-lg-4 mb-3 tarjeta-jugador">
                            <div class="card p-4 d-flex gap-2">
                                <input type="text" name="nombres[]" placeholder="Nombre" required>
                                <input type="file" name="fotos[]" accept="image/*" required>
                            </div>
                        </div>

                        <div class="col-sm-12 col-md-6 col-lg-4 mb-3 tarjeta-jugador">
                            <div class="card p-4 d-flex gap-2">
                                <input type="text" name="nombres[]" placeholder="Nombre">
                                <input type="file" name="fotos[]" accept="image/*" required>
                            </div>
                        </div>
                    <div class="text-center mt-3">
                        <button type="button" class="btn btn-success" id="btnAgregarJugador">
                            + Agregar Jugador
                        </button>
                    </div>
                </div>
                <div class="text-center">
                    <button type="submit" class="boton p-3 mt-3" style="font-size: 1.2rem; font-weight: bold;">Iniciar Juego</button>
                </div>
            </form>
        </div>

        <a href="#header" class="boton boton-index d-flex "><img src="./src/img/favicon2.png"></a>
    </main>

    <footer class="text-center mt-5 mb-3">
        <p>&copy; 2025 Derechos Reservados para ojedvSccisors</p>
        <p>Juega con responsabilidad y solo si eres mayor de edad.</p>
    </footer>

    <script>
        document.getElementById('btnAgregarJugador').addEventListener('click', function() {
            const contenedor = document.getElementById('contenedorJugadores');
            const nuevaTarjeta = document.createElement('div');
            nuevaTarjeta.className = 'col-sm-12 col-md-6 col-lg-4 mb-3 tarjeta-jugador';
            nuevaTarjeta.innerHTML = `
                <div class="card p-4 d-flex gap-2">
                    <input type="text" name="nombres[]" placeholder="Nombre" required>
                    <input type="file" name="fotos[]" accept="image/*" required>
                    <button type="button" class="btn btn-danger btn-sm btnEliminar">Eliminar</button>
                </div>
            `;
            contenedor.appendChild(nuevaTarjeta);
            nuevaTarjeta.querySelector('.btnEliminar').addEventListener('click', function() {
                nuevaTarjeta.remove();
            });
        });
    </script>

</body>
</html>