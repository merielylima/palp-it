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

function myFunction() {
    document.getElementById("myDropdown").classList.toggle("show");
  }
  
  // Close the dropdown if the user clicks outside of it
  window.onclick = function(event) {
    if (!event.target.matches('.dropbtn')) {
      var dropdowns = document.getElementsByClassName("caixa");
      var i;
      for (i = 0; i < dropdowns.length; i++) {
        var openDropdown = dropdowns[i];
        if (openDropdown.classList.contains('show')) {
          openDropdown.classList.remove('show');
        }
      }
    }
  }