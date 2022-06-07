function readCookie(name){
    let contenidoCookie = "";
    let listaCookies = misCookies.split(";");
    for (let i = 0; i < listaCookies.length; i++) {
        if (listaCookies[i].includes(name)){
            contenidoCookie = listaCookies[i].substring(name.length);
        }
    }
    return contenidoCookie;
}
var misCookies = document.cookie;
var cookieIDClase = readCookie("ID_Clase=");