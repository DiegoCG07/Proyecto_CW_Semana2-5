window.addEventListener("load", () =>{
    fetch("../dynamics/php/VistaPrinProf.php")
        .then((response)=>{
            return response.json();
        })
        .then((datosJSON)=>{
            if(datosJSON.ok == true){
                let contenedorGrupos = document.getElementById("contenedorGrupos");
                contenedorGrupos.innerHTML = "";
                for(resultado of datosJSON.resultado){
                    contenedorGrupos.innerHTML += "<div id='"+ resultado.ID_Clase +"' class='grupos'>Clase: "+ resultado.Materia +"<br>Grupo: "+ resultado.Grupo +"<br>Código de clase: "+ resultado.ID_Clase +"</div>";
                }
            } else {
                alert(datosJSON.texto);
            }
        });
    const contenedorGrupos = document.getElementById("contenedorGrupos");
    contenedorGrupos.addEventListener("click", (evento) =>{
        let claseSeleccionada = evento.target.id;
        console.log(claseSeleccionada);
        console.log(evento.target);
        if(claseSeleccionada != ''){
            document.cookie = 'ID_Clase ='+claseSeleccionada;
            window.location = "./VistaClaseProf.php";
        }
    })
});