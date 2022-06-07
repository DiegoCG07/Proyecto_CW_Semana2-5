window.addEventListener("load",()=>{
    const agregar = document.getElementById("agregar");
    const input = document.getElementById("input");
    const estado = document.getElementById("estado");
    const lista = document.getElementById("lista");
    const enviar = document.getElementById("enviar");
    var palabras = [];
    const btnEditar = document.getElementById("btn-editar");
    const btnVista = document.getElementById("btn-vista");
    const formEditar = document.getElementById("formEditar");

    btnEditar.addEventListener("click",()=>{
        formEditar.style.display = "block";
        btnEditar.style.display = "none";
    });

    btnVista.addEventListener("click",()=>{
        window.location = "./ahorcado.html";
    });

    agregar.addEventListener("click", (evento) => {
        evento.preventDefault();
        evento.stopPropagation();
        if(input.value.length <= 10 && input.value != ""){
            let palabraExist = false;
            for(let i=0; i<palabras.length; i++){
                if(input.value == palabras[i]){
                    palabraExist = true;
                }
            }
            if(palabraExist == false){
                let palabraNueva = input.value.toUpperCase();
                input.value = "";
                lista.innerHTML += '<li>'+palabraNueva+' <input type="reset" value="Borrar" class="boton" id="'+palabraNueva+'"></li>';
                palabras.push(palabraNueva);
            } else {
                alert("Ya existe esa palabra");
            }
        } else {
            alert("Datos inválidos");
        }
    });

    lista.addEventListener("click", (evento) => {
        if (evento.target.className === 'boton'){
            evento.target.parentElement.outerHTML = '';
            let namePalabra = evento.target.id;
            let posicionPalabra = palabras.indexOf(namePalabra);
            palabras.splice(posicionPalabra,1);
        }
    });
    
    function readCookie(name){
        let misCookies = document.cookie;
        let contenidoCookie = "";
        let listaCookies = misCookies.split(";");
        for (let i = 0; i < listaCookies.length; i++) {
            if (listaCookies[i].includes(name)){
                contenidoCookie = listaCookies[i].substring(name.length);
            }
        }
        return contenidoCookie;
    }

    function subePalabras(){
        let datosForm = new FormData();
        datosForm.append("arr_palabras",palabras);
        // Agrego cookie
        let ID_Clase = readCookie("ID_Clase=");
        datosForm.append("ID_Clase",ID_Clase);
        // Estado
        let ID_EstadoJuego = estado.value;
        datosForm.append("ID_EstadoJuego",ID_EstadoJuego);
        fetch("../dynamics/php/creaJuego.php",{
            method:"POST",
            body:datosForm,
        })
            .then((response)=>{
                return response.json();
            })
            .then((datosJSON)=>{
                if(datosJSON.ok == true){
                    alert(datosJSON.texto);
                    btnEditar.style.display = "block";
                    formEditar.style.display = "none";
                } else {
                    alert(datosJSON.texto);
                }
            });
    }

    enviar.addEventListener("click", (evento) => {
        evento.stopPropagation();
        evento.preventDefault();
        console.log(palabras);
        subePalabras();
    });
});