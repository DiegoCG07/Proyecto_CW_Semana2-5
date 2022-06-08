selectP = document.getElementById("publicaciones");
divMaterial = document.getElementById("material");
divTareas = document.getElementById("tareas");


window.addEventListener("load", ()=>{


    selectP.addEventListener("click",()=>{
        if(selectP.value == 1){
            divTareas.style.display = "block";
            divMaterial.style.display = "none";
        } else if(selectP.value == 2) {
            divTareas.style.display = "none";
            divMaterial.style.display = "block";
        }
    });

});

