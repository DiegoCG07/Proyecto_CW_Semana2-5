window.addEventListener('load', ()=>{
    const btnEnviar = document.getElementById("btnEnviar");
    const codigo = document.getElementById("codigo");
    const formulario = document.getElementById("formulario");

    function verificarDatos(){
        let todoBien = (codigo.value == '' || codigo.value.length != 6)?false:true;
        return todoBien;
    }

    btnEnviar.addEventListener("click", (evento)=>{
        evento.stopPropagation();
        evento.preventDefault();
        if(verificarDatos() == true){
           let datosForm = new FormData(formulario);
           fetch("../dynamics/php/inscripcion.php",{
                method:"POST", 
                body: datosForm,
           })
                .then((response)=>{
                        return response.json();
                    })
                .then((datosJSON)=>{
                    if(datosJSON.ok == true){
                        alert(datosJSON.texto);
                        window.location = "./alumnoTablero.php";
                    } else {
                        alert(datosJSON.texto);
                    }
                });
        }else{
            alert("El código ingresado es inválido");
        }
    })
});