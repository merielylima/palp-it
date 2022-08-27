var ppDell = document.getElementById("pp-del");
function openpp(button){
    ppDell.style.display = "block";
}
function closepp(button){
    ppDell.style.display = "none";
}

var ppDwn = document.getElementById("pp-dwn");
function opnpp(button){
    ppDwn.style.display = "block";
}
function clspp(button){
    ppDwn.style.display = "none";
}


var  perfil_edit = document.querySelector("#read-more--container"); 
var  perfil_noedit = document.querySelector("#read-less--container"); 

var readMore = document.querySelector("#read-more");
var readLess = document.querySelector("#read-less");


readMore.addEventListener('click',() =>{
    perfil_edit.classList.add("hidden");
    perfil_noedit.classList.remove("hidden");

})
readLess.addEventListener('click',() =>{
    perfil_edit.classList.remove("hidden");
    perfil_noedit.classList.add("hidden");
    
})

function options() {
    document.getElementById("options").classList.toggle("show-options");
}

  // Close the dropdown if the user clicks outside of it
window.onclick = function(event) {
    if (!event.target.matches('.options-btn')) {
        var dropdowns = document.getElementsByClassName("options-container");
        var i;
        for (i = 0; i < dropdowns.length; i++) {
            var openDropdown = dropdowns[i];
            if (openDropdown.classList.contains('show-options')) {
                openDropdown.classList.remove('show-options');
            }
        }
    }
}