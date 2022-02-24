var btnInicio = document.querySelector("#btn-inicio");
var btnPerfil = document.querySelector("#btn-perfil");
var btnContribuicoes = document.querySelector("#btn-contribuicoes");


btnInicio.addEventListener('click',() =>{
    btnInicio.classList.add("active");
    btnPerfil.classList.remove("active");
    btnContribuicoes.classList.remove("active");
})

btnPerfil.addEventListener('click',() =>{
    btnInicio.classList.remove("active");
    btnPerfil.classList.add("active");
    btnContribuicoes.classList.remove("active");
})

btnContribuicoes.addEventListener('click',() =>{
    btnInicio.classList.remove("active");
    btnPerfil.classList.remove("active");
    btnContribuicoes.classList.add("active");
})