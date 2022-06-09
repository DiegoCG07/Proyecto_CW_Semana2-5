window.addEventListener("load", ()=>{
    const btnAgregar = document.getElementById("btn-agregar");
    const divAgregar = document.getElementById("contenedor-agregar");
    const unidad = document.getElementById("unidad");
    const tema = document.getElementById("tema");
    const btnEnviar = document.getElementById("btn-enviar");
    let agregar = false;

    /* Peticiones
    ------------------------------------------------------------------------------------------------*/
    // Despliega las materias
    fetch("../dynamics/php/materia.php")
        .then((response)=>{
            return response.json();
        })
        .then((datosJSON)=>{
            if(datosJSON.ok == true){
                let selectmateria = document.getElementById("select-materia");
                selectmateria.innerHTML = "";
                for(resultado of datosJSON.resultados){
                    selectmateria.innerHTML+="<option value='"+resultado.id+"'>"+resultado.numero+"</option>";
                }
            } else {
                alert(datosJSON.texto);
            }
        });

    /* Eventos
    ------------------------------------------------------------------------------------------------*/
    btnAgregar.addEventListener("click", ()=>{
        if(agregar == false){
            divAgregar.style.display = "block";
            agregar = true;
        } else {
            divAgregar.style.display = "none";
            agregar = false;
        }
    });
    btnEnviar.addEventListener("click",(evento)=>{
        if(unidad.value == "" || tema.value == ""){
            evento.stopPropagation();
            evento.preventDefault();
            alert("Por favor llena todos los datos");
        } else {
            alert("Se mandaron los datos");
            document.cookie = "Vista=form";
        }
    });
});