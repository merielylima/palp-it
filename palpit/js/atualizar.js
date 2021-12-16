//por enquanto o editar não esta ativado, ou seja está h i d d e n
var lsActive = document.querySelector(".left-side--active"); 
var lsHidden = document.querySelector(".hidden"); 

var edit = document.querySelector("#btn-edit"); 
var cancel = document.querySelector("#btn-cancel");  

edit.addEventListener('click',() =>{
    lsActive.classList.add("hidden");
    lsHidden.classList.remove("hidden");

})
cancel.addEventListener('click',() =>{
    lsActive.classList.remove("hidden");
    lsHidden.classList.add("hidden");   
})
userMenu.addEventListener('click',() =>{
    lsActive.classList.remove("hidden");
    lsHidden.classList.add("hidden");   
})


var menuActive = document.querySelector(".caixa"); 
var menuHidden = document.querySelector(".desactive"); 

var menu = document.querySelector("#menu_popup"); 

menu.addEventListener('click',() =>{
    menuHidden.classList.remove("desactive");
    menuActive.classList.add("caixa"); 
})