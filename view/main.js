const desp_menu =  document.getElementById("desp_menu");
const boton_desp = document.getElementById("desplegable");
const flecha = document.getElementById("flecha");

boton_desp.addEventListener("click", mostrarMenu);

function mostrarMenu(){
    desp_menu.classList.toggle("hidden");
    flecha.classList.toggle("rotate-180");
}


const xBtn = document.getElementById("xBtn");

const grisSq = document.querySelector("#grisSq");
const aggSq = document.querySelector("#aggSq");

xBtn.addEventListener("click", mostrar);


function mostrar(){
    grisSq.classList.toggle("hidden");
    aggSq.classList.toggle("hidden");
}


