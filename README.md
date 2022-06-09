# Proyecto final del CW2022: Desarrollo de un aula virtual para la ENP 6

## Descripción del proyecto:
Desarrollo de un sistema de índole educativa enfocado principalmente en satisfacer las necesidades educativas de la comunidad de la *Escuela Nacional Preparatoria N° 6 "Antonio Caso"*.

### Explicación:
El presente proyecto funge como aula virtual para los estudiantes de la *Escuela Nacional Preparatoria N° 6 "Antonio Caso" UNAM*.

### Importancia:
Debido a la pandemia generada por el virus SARS-CoV-2, el uso de aulas virtuales se popularizó bastante. Por lo que, se requirió desarrollar un proyecto para satisfacer de una mejor manera con las necesidades particulares de los alumnos de la *Escuela Nacional Preparatoria N° 6 "Antonio Caso"*.

### Tecnologías utilizadas:
1. Cascading Style Sheets `CSS`
2. HyperText Markup Language `HTML`
3. Hypertext Preprocessor  `PHP`
4. `JavaScript`
5. `MySQL`
6. `Git`

## Instrucciones de instalación del proyecto:

1. Descargar un servidor local que contenga un sistema de gestión de base de datos, sugerimos el manejador de red **XAMPP**.
2. Prender el servidor local. En caso de que tu servidor local sea *Xampp* activar **Apache** y **MySQL**.
3. Descargar la base de datos dentro de la carpeta: `C:/xampp/mysql/bin`.
4. Acceder mediante la terminal con la ruta antes mencionada y ejecutar el comando: 
```SQL
./mysql -u root
```
5. Usar la base de datos mysql con el comando:
```SQL
USE mysql
```
6. Ejecutar las siguientes líneas de código para la creación de un usuario:
```SQL
CREATE USER ‘proyectocw’@’localhost’ IDENTIFIED BY ‘bimbunuelos6’;
GRANT DELETE, INSERT, SELECT, UPDATE ON proyectofinal_cw.* TO ‘proyectocw’@’localhost’;
```
7. Después de haber ejecutado los comandos, salir de **MariaDB** con el comando `EXIT`
8. Acceder de nuevo con el comando: 
```SQL
./mysql -u proyectocw -p
```
    Con la contraseña "bimbunuelos6"

9. Una vez completadas las instrucciones anteriores editar el archivo **config-plantilla.php** y cambiarle el nombre a **config.php**, completando los datos requeridos con la información antes dada.

## Instrucciones de uso del proyecto:
Instrucciones para el usuario:
1. Abrir el archivo **index.php** en tu navegador desde el servidor local.
2. La vista inicial es un inicio de sesión, en caso de no contar con una cuenta te dará la opción de registrarte y una vez completado el registro podrás iniciar sesión.

Información para el programador:

1. El proyecto está conformado por 5 carpetas en la rama inicial (*templates, dynamics, statics, docs y libs*) y un archivo index.
- **Templates:**

    En esta carpeta se ubican las vistas de toda la página, 
- **Dynamics:**

    Esta carptea se encuentra subdividida en archivos **JS** y **PHP** respectivamente, vitales en el funcionamiento del proyecto.

    - **JS:** Contiene los archivos necesarios para hacer del proyecto una interfaz web interactiva.
        
    - **PHP:** Contiene los archivos necesarios para hacer la conexion y el uso de información almacenada en bases de datos.

- **Statics:**

    Esta carpeta contiene todos los archivos relacionados con la estética del proyecto, subdivididos en: *Files, Fonts, Media y Styles*

    **Files:** Guarda los archivos generados por los usuarios en publicaciones.

    **Fonts:** Contiene los archivos utilizados para la implementación de fuentes alternativas.

    **Media:** Contiene los archivos multimedia utilizados en la página.

    **Styles:** Contiene los archivos *CSS* utilizados para el diseño estructural y visual.


## Créditos:
1. **María José García Olán:** La implementación de diseño general del proyecto y estructuras generales en las vistas, optimización de código, el desarrollo de maquetado y partes del funcionamiento de las vistas de alumno mediante.  
2. **Rodríguez Sánchez Ricardo:** Desarrollo del diseño general del proyecto y vistas del profesor, administrador, moderador y perfil de todos los usuarios.
3. **Zarco Romero José Antonio:** Se encargó principalmente del diseño, creación y documentación de la base de datos, así como su conexión con la página mediante peticiones HTTP con fetch y el uso de archivos PHP. También, desarrolló la plantilla del juego "Ahorcado", el foro de preguntas y los formularios de Inicio de Sesión y Registro, incluyendo el cuidado de datos del usuario.

### Agradecimientos a:
- Bootstrap: Framework de código abierto.
- Unsplash: Fuente de internet de imágenes de uso libre.