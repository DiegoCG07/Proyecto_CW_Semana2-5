<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Crear clase</title>
    <link rel="stylesheet" href="../statics/styles/crearClaseProf.css">
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
        <br><br>
        <span>Crear clase</span>
    </div>


    <div id="borde">

        <span id="crea">Crea una clase: </span><br><br>

        <form action="" id="formulario">
            <label for="grupo">Grupo</label>
            <select name="grupo" id="grupo">
                <option value=""></option>
            </select><br><br>

            <label for="materia">Materia</label>
            <select name="materia" id="materia">
                <option value=""></option>
            </select><br><br>

            <label for="descripcion">Descripcion: </label>
            <input type="text" name="descripcion" id="descripcion"><br><br>

            <button type="submit" id="btnEnviar">Enviar</button>
        </form>

    </div>


    
    <script src=" https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js "></script>
    <script src="../dynamics/JS/crearClaseProf.js"></script>
</body>
</html>