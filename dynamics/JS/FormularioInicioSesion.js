window.addEventListener("load", ()=>{
    const formInicio = document.getElementById("formInicio");
    const btnInicio = document.getElementById("btn-inicio");
    const btnRegistro = document.getElementById("btn-registro");

    function verificaDatos(){
        let todobien = false;
        if(formInicio.correo.value == "" || formInicio.contrasena.value == ""){
            alert("Porfavor llena todos los datos");
        } else {
            todobien = true;
        }
        return todobien;
    }

    function verifInicioSesion(){
        let datosForm = new FormData(formInicio);
        fetch("./dynamics/php/FormularioInicioSesion.php",{
            method:"POST",
            body:datosForm,
        })
            .then((response)=>{
                return response.json();
            })
            .then((datosJSON)=>{
                if(datosJSON.ok == true){
                    if(datosJSON.texto == "Usuario no registrado"){
                        alert(datosJSON.texto);
                        btnRegistro.style.display = "block";
                    } else if(datosJSON.texto == "Contraseña incorrecta"){
                        alert(datosJSON.texto);
                    } else {
                        alert(datosJSON.texto);
                    }
                } else if(datosJSON.ok == false){
                    alert(datosJSON.texto);
                }
            });
    }

    btnInicio.addEventListener("click",(evento)=>{
        evento.stopPropagation();
        evento.preventDefault();
        btnRegistro.style.display = "none";
        if(verificaDatos() == true){
            // alert("Puede continuar");
            verifInicioSesion();
        } else {
            // alert("Datos inválidos");
        }
    });
});