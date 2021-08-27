 var linha = 0;

function adicionarItem(){
  var nivel = document.getElementById("nivel").value;
  var disciplina = document.getElementById("disciplina").value;
  console.log(nivel, disciplina)

  var tabela = document.getElementById("tabela");
  var newRow = document.createElement("tr");
  tabela.appendChild(newRow);

  var newTd = document.createElement("td");
  newTd.textContent = nivel;
  newTd.classList.add("row-table");
  newRow.appendChild(newTd);
  var newInput = document.createElement("input");
  newInput.type = "hidden";
  newInput.value = nivel;
  newTd.appendChild(newInput);
  newInput.name = "nivel_"+ linha;

  newTd = document.createElement("td");
  newTd.classList.add("row-table");
  newTd.innerHTML = disciplina;
  newRow.appendChild(newTd);
  newInput = document.createElement("input");
  newInput.type = "hidden";
  newInput.value = disciplina;
  newTd.appendChild(newInput);
  newInput.name = "disciplina_" + linha;

  newTd = document.createElement("td");
  var newButton = document.createElement("button");
  newButton.id = "button_" + linha;
  newButton.name = "button_" + linha;

  newButton.classList.add("button");
  newTd.classList.add("row-table");
  newButton.classList.add("button-remove");
  newTd.appendChild(newButton);
  newRow.appendChild(newTd);
  linha = linha +1;

  newButton.addEventListener("click", function(event, outro) {
  console.log(event.relatedTarget);
 });
}

var fileInput = document.querySelector('.input--file');
var fileInputText = document.querySelector('.input--file-text');
fileInputTextContent = fileInputText.textContent;

fileInput.addEventListener('change', function (e) {
	var value = e.target.value.length > 0 ? e.target.value : fileInputTextContent;
	fileInputText.textContent = value.replace('C:\\fakepath\\', '');
});
