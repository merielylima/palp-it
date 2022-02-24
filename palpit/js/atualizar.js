//por enquanto o editar não esta ativado, ou seja está h i d d e n
var perfil_edit = document.querySelector("#perfil-edit"); 
var perfil_noedit = document.querySelector("#perfil-noedit"); 

var edit = document.querySelector("#btn-edit"); 
var cancel = document.querySelector("#btn-cancel");  

edit.addEventListener('click',() =>{
    perfil_noedit.classList.add("hidden");
    perfil_edit.classList.remove("hidden");

})
cancel.addEventListener('click',() =>{
    perfil_edit.classList.add("hidden");
    perfil_noedit.classList.remove("hidden");
    
})


/* When the user clicks on the button, 
toggle between hiding and showing the dropdown content */

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
  
