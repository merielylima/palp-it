kendo.bind($('body'));

var roles = {
    numerictextbox: "kendoNumericTextBox",
    combobox: "kendoComboBox",
    multiselect: "kendoMultiSelect"
}

function getWidget(element) {
  var role = element.data("role");
  role = roles[role];
    
  if (role) {
     return element.data(role);
  }    
}

$("label").click(function() {
   var label = $(this),
       id = label.attr("for"),
       widget;

    if (id) {
        widget = getWidget($("#" + id));
        if (widget) { 
            widget.focus();
            if (widget.open) {
                widget.open();
            }
        }
    }
});