window.addEventListener('load', ()=>{
    const btnEnviar = document.getElementById("btnEnviar");
    const descripcion = document.getElementById("descripcion");
    const formulario = document.getElementById("formulario");

    fetch("../dynamics/php/gruposClase.php")
        .then((response)=>{
            return response.json();
        })
        .then((datosJSON)=>{
            if(datosJSON.ok == true){
                let selectgrupo = document.getElementById("grupo");
                selectgrupo.innerHTML = "";
                for(resultado of datosJSON.resultados){
                    selectgrupo.innerHTML+="<option value='"+resultado.id+"'>"+resultado.numero+"</option>";
                }
            } else {
                alert(datosJSON.texto);
            }
        });

    fetch("../dynamics/php/materia.php")
        .then((response)=>{
            return response.json();
        })
        .then((datosJSON)=>{
            if(datosJSON.ok == true){
                let selectgrupo = document.getElementById("materia");
                selectgrupo.innerHTML = "";
                // console.log(datosJSON);
                for(resultado of datosJSON.resultados){
                    selectgrupo.innerHTML+="<option value='"+resultado.id+"'>"+resultado.numero+"</option>";
                }
            } else {
                alert(datosJSON.texto);
            }
        });

    function verificarDatos(){
        let todoBien = (descripcion.value == '')?false:true;
        return todoBien;
    }

    btnEnviar.addEventListener("click", (evento)=>{
        evento.stopPropagation();
        evento.preventDefault();
        if(verificarDatos() == true){
           let datosForm = new FormData(formulario);
           fetch("../dynamics/php/formCrearClase.php",{
                method:"POST", 
                body: datosForm,
           })
                .then((response)=>{
                        return response.json();
                    })
                .then((datosJSON)=>{
                    if(datosJSON.ok == true){
                        alert(datosJSON.texto);
                        window.location = "./VistaPrinProf.php";
                    } else {
                        alert(datosJSON.texto);
                    }
                });
        }else{
            alert("nou");
        }
    })
});