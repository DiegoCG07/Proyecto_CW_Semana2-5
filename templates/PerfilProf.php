<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Participantes</title>
    <link rel="stylesheet" href="../statics/styles/PerfilProf.css">
    <link rel="stylesheet" href="../libs/bootstrap-5.2.0-beta1-dist/css/bootstrap.css">
</head>
<body>
    <nav class="navbar bg-light fixed-top">
        <div class="container-fluid">

            <a class="navbar-brand" id="titulo">Coyo 6</a>

            <button id="boton" class="navbar-toggler" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasNavbar" aria-controls="offcanvasNavbar">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasNavbar" aria-labelledby="offcanvasNavbarLabel">
                
                <div class="offcanvas-header">
                    <h5 class="offcanvas-title" id="offcanvasNavbarLabel">Opciones</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
                </div>
                
                <div class="offcanvas-body">
                    <ul class="navbar-nav justify-content-end flex-grow-1 pe-3">
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="#">Perfil</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="https://www.prepa6.unam.mx/ENP6/_P6/">Conoce nuestro plantel</a>
                        </li>
                        <li class="nav-item">
                                <a class="nav-link active" aria-current="page" href="https://www.prepa6.unam.mx/ENP6/_P6/">Prepa 6</a>
                        </li>
                    </ul>
                
                </div>
            </div>
        </div>
    </nav>

    <div id="titulo2">
        <br>
        <span>Perfil</span>
    </div>

    <div id="borde">
        <div id="subtitulo">
            <span>General</span>
        </div>

        <div class="contenido">
            <span class="pregunta">Nombre: </span>
            <span class="descripcion">Juan</span>
            <span class="pregunta">Apellidos: </span>
            <span class="descripcion">Perez Lopez</span>
            <span class="pregunta">Dirección de Email: </span>
            <span class="descripcion">Juanito@gmail.com</span>
            <span class="pregunta">Nombre de Usuario: </span>
            <span class="descripcion">JuanitoElPro</span>
            <span class="pregunta">Número Telefónico: </span>
            <span class="descripcion">5511223344</span>
            <span class="pregunta">Número de Trabajador: </span>
            <span class="descripcion">AAAA123456AAA</span>
            
        </div>
    </div>

    <div id="nombre">
        <div id="contenidoNombre">
            <span>Nombre</span>
        </div>
    </div>

    
    <script src=" https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js "></script>
</body>
</html>