window.addEventListener("load", () =>{
    fetch("../dynamics/php/VistaPrinProf.php")
        .then((response)=>{
            return response.json();
        })
        .then((datosJSON)=>{
            if(datosJSON.ok == true){
                let contenedorGrupos = document.getElementById("contenedorGrupos");
                contenedorGrupos.innerHTML = "";
                //console.log(datosJSON);
                for(resultado of datosJSON.resultado){
                    contenedorGrupos.innerHTML += "<div id='"+ resultado.ID_Clase +"' class='grupos'><span>Clase: "+ resultado.Materia +"</span><br><span>Grupo: "+ resultado.Grupo +"</span><br><span>Código de clase: "+ resultado.ID_Clase +"</span></div>";
                    //selectgrupo.innerHTML+="<option value='"+resultado.id+"'>"+resultado.numero+"</option>";
                }
            } else {
                alert(datosJSON.texto);
            }
        });
    const contenedorGrupos = document.getElementById("contenedorGrupos");
    contenedorGrupos.addEventListener("click", (evento) =>{
        let claseSeleccionada = evento.target.id;
        console.log(claseSeleccionada);
        if(claseSeleccionada != ''){
            document.cookie = 'ID_Clase ='+claseSeleccionada;
            window.location = "./VistaClaseProf.php";
        }
    })
});