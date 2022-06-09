let meses = ["Enero","Febrero","Marzo","Abril","Mayo","Junio","Julio","Agosto","Septiembre","Octubre","Noviembre","Diciembre"];
let fecha = new Date();
let dia = fecha.getDate();
let mes = fecha.getMonth();
let año = fecha.getFullYear();

const flechaAntes = document.getElementById("flechaAntes");
const flechaDespues = document.getElementById("flechaDespues");
const datos = document.getElementById("datos");
const dias = document.getElementById("dias");

function despliegaDatos(){
    fecha.setFullYear(año,mes,dia);
    datos.innerHTML = meses[mes] + " " + año;
    let diasTotales = new Date(año, mes, 0).getDate();
    dias.innerHTML = "";
    let empiezaMes = new Date(año,mes,1).getDay();
    for(let i=empiezaMes;i>0;i--){
        dias.innerHTML += "<div class='calendario' id='dia' style='background-color: beige;'></div>";
    }
    for(let i=1; i<(diasTotales+1); i++){
        let dias = document.getElementById("dias");
        dias.innerHTML += "<div class='calendario' id='dia'>"+i+"</div>";
    }
}

despliegaDatos();

flechaAntes.addEventListener("click",()=>{
    if(mes != 0){
        mes--;
    } else {
        mes = 11;
        año--;
    }
    despliegaDatos();
});

flechaDespues.addEventListener("click",()=>{
    if(mes != 11){
        mes++;
    } else {
        mes = 0;
        año++;
    }
    despliegaDatos();
});