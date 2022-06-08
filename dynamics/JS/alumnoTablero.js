window.addEventListener("load", ()=>{

    const divClases = document.getElementById("clases");

    fetch("../dynamics/php/clases.php")
    .then((response)=>{
        return response.json();
    })
    .then((datosJSON)=>{
        console.log(datosJSON);
        if(datosJSON.ok == true){
            let divClases = document.getElementById("clases");
           divClases.innerHTML = "";
            for(resultado of datosJSON.resultado){
                divClases.innerHTML += '<div class="card"><div class="card-body"><h5 class="card-title">Materia:'+resultado.Materia+'</h5><p class="card-text">Profesor:'+ resultado.Profesor + '</p><a id="'+resultado.ID_Clase+'" class="btn btn-primary">Ver</a></div></div>';
            }
        } else {
            alert(datosJSON.texto);
        }
    });

    divClases.addEventListener("click", (evento)=>{
        var btnVer = evento.target.id;
        if(btnVer!=''){
            document.cookie='ID_Clase='+ btnVer;
            window.location ="./alumnoClase.php"
        }
    })

});
