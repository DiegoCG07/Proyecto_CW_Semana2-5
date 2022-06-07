<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Juegos</title>
        <!-- <link rel="stylesheet" href="../statics/styles/VistaPrinProf.css"> -->
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
        <br><br><br><br><br><br><br>
        
        <button id="btn-editar">Editar ahorcado</button>
        <button id="btn-vista">Vista Previa</button>
        <form id="formEditar" style="display: none;">
            <br><br>
            <fieldset style="width: 400px; color: black;">
                <legend>Editar Ahorcado</legend>
                <br><br><label for="input">Agrega un palabra menor a 10 caracteres: </label><br><br>
                <input type="text" name="input" id="input" maxlength="10">
                <button id="agregar">Agregar</button>
                <ul id="lista"></ul><br>
                <label for="estado">Estado del juego: </label>
                <select name="estado" id="estado">
                    <option value="1">Oculto</option>
                    <option value="2">No oculto</option>
                </select><br><br>
                <button id="enviar">Enviar</button>
            </fieldset>
        </form>

        <script src=" https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js "></script>
        <script src="../dynamics/JS/juegosProf.js"></script>
    </body>
</html>