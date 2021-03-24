$(document).ready(function () {

});

function osszesToggle(event) {
    checkboxes = $(":checkbox");
    for (var i = 0, n = checkboxes.length; i < n; i++) {
        checkboxes[i].checked = event.checked;
    }
}

function munkalapToggle(event, name) {
    checkboxes = $("[name= " + name + "]");
    for (var i = 0, n = checkboxes.length; i < n; i++) {
        checkboxes[i].checked = event.checked;
    }
}

function osszesCheck(name, id) {
    checkboxes = $("[name=" + name + "]");
    checkboxAll = $("#all");
    checkboxSzallito = $('#' + id);
    var szamolo = 0;
    for (var i = 0, n = checkboxes.length; i < n; i++) {
        if (checkboxes[i].checked == false) {
            szamolo++;
        }
    }
    if (szamolo > 0) {
        checkboxAll[0].checked = false;
        checkboxSzallito[0].checked = false;
    }
    if(szamolo == 0){
        checkboxAll[0].checked = true;
        checkboxSzallito[0].checked = true;
    }
}

function osszLenyit(){
    $(".altabla").removeAttr('hidden');
    $(".altabla").show();
}

function osszBezar() {
    $(".altabla").attr('hidden', 'hidden');
    $(".altabla").hide();
}

function szallitoLenyit(szallito) {
    $("." + szallito).toggle();
    $("." + szallito).removeAttr('hidden');
}