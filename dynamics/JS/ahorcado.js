window.addEventListener("load",()=>{
    const win = new Audio("../statics/media/audio/win.mpeg");
    const ganaste = new Audio("../statics/media/audio/ganaste.mpeg");
    const lose = new Audio("../statics/media/audio/lose.mpeg");

    const canvas = document.getElementById("mi-canvas");
    const ctx = canvas.getContext("2d");
    var cx = canvas.width/2, cy = canvas.height/2;

    var frases_base = [];
    cargaFrases();
    var palabra_base = [], palabra_usuario = [], vida = 3, i = 0;

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
    function cargaFrases(){
        frases_base = [];
        let datosForm = new FormData();
        // Agrego cookie
        let ID_Clase = readCookie("ID_Clase=");
        datosForm.append("ID_Clase",ID_Clase);
        fetch("../dynamics/php/ahorcadoFrases.php",{
            method:"POST",
            body:datosForm,
        })
            .then((response)=>{
                return response.json();
            })
            .then((datosJSON)=>{
                if(datosJSON.ok == true){
                    for(resultado of datosJSON.resultados){
                        frases_base.push(resultado.frase);
                    }
                } else {
                    alert(datosJSON.texto);
                }
            });
    }

    function inicializarV(){
        palabra_base = [];
        palabra_usuario = [];
        vida = 3;
        i = 0;
    }

    const ahorcado = document.getElementById("ahorcado");
    const carousel = document.getElementById("carouselExampleControls");
    const title = document.getElementById("title");
    const juego = document.getElementById("juego");
    const vidas = document.getElementById("vidas");
    const comprobar = document.getElementById("btn-Comprobar");
    const letraIntroducida = document.getElementById("letra");
    const botones = document.getElementById("botones");
    const total = document.getElementById("total");

    ahorcado.addEventListener("click",()=>{
        carousel.style.display = "none";
        title.innerHTML = "Ahorcado";
        title.style.marginTop = "20vw";
        juego.style.display = "flex";
        botones.style.display = "flex";
        jugando(i);
    });

    function fondo(){
        ctx.fillStyle = "green";
        ctx.fillRect(0,0,canvas.width,canvas.height);
        ctx.fillStyle = 'white';
        ctx.font = "25px monospace";
        ctx.textAlign = "center";
        let datos = palabra_usuario.join(' ');
        ctx.fillText(datos,cx,35);
        vidas.innerHTML = vida;
        total.innerHTML = i+" palabra(s) encontradas de "+frases_base.length;
    }

    function jugando(i){
        if(i < frases_base.length){
            palabra_base = frases_base[i].split("");
            for (letra of palabra_base) {
                palabra_usuario.push('_');
            }
            fondo();
        } else {
            ganaste.volume = .2;
            ganaste.play();
            alert("¡GANASTE! ya no hay más palabras");
            juego.style.display = "none";
            botones.style.display = "flex";
        }
    }

    comprobar.addEventListener("click",()=>{
        if(letraIntroducida.value != ""){
            let letra_usuario = letraIntroducida.value.toUpperCase();
            letraIntroducida.value = "";
            for(let i=0; i<palabra_base.length; i++){
                if(letra_usuario == palabra_base[i]){
                    palabra_usuario[i] = palabra_base[i];
                }
            }
            if(palabra_base.includes(letra_usuario) == false){
                vida--;
                lose.volume = .2;
                lose.play();
            }
            if(vida == 0){
                alert("Perdiste :( La palabra era "+palabra_base.join(''));
                alert("Se reinicia el juego desde el principio");
                inicializarV();
                jugando(i);
            } else if(palabra_usuario.includes("_") == false){
                win.volume = .2;
                win.play();
                alert("¡Ganaste! La palabra era "+palabra_base.join(''));
                palabra_base = [];
                palabra_usuario = [];
                vida = 3;
                i++;
                jugando(i);
            }
            fondo();
        } else {
            alert("Ingresa una letra");
        }
    });

    botones.addEventListener("click",(evento)=>{
        if(evento.target.id == "btnJugar"){
            inicializarV();
            jugando(i);
            juego.style.display = "flex";
        } else if(evento.target.id == "btnRegresar"){
            inicializarV();
            carousel.style.display = "flex";
            title.innerHTML = "Juegos";
            title.style.marginTop = "0";
            juego.style.display = "none";
            botones.style.display = "none";
        } 
    });
});