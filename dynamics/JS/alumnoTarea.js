window.addEventListener("load", ()=>{

    const btnAñadir = document.getElementById("btnAñadir");
    const btnEnviar = document.getElementById("btnEnviar");
    const divArchivo = document.getElementById("archivo");
    let i = 1;

    btnAñadir.addEventListener("click", ()=>{
        
        if(i % 2 != 0){
            divArchivo.style.display = "block";
            i++;
        }else{
            divArchivo.style.display = "none";
            i++;
        }
    });

    btnEnviar.addEventListener("click", ()=> {
        divArchivo.style.display = "none";
        btnAñadir.removeEventListener;
        btnAñadir.style.display = "none";
    })


});