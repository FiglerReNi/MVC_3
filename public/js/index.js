$(document).ready(function () {
    $('#fonixForm').submit(function () {
        return false;
    });

    $('#mentes').click(function () {
        $('#load').removeAttr('hidden');
        $('#mentes').attr('hidden', 'hidden');
        var datas = $("#fonixForm").serializeArray();
        var munkalapok = [];
        if(datas == null || datas == ''){
            alert('Nem jelöltél ki')
        }else{
            jQuery.each(datas, function (i, data) {
                munkalapok.push(data.value);
            });
            munkalapok = JSON.stringify(munkalapok);
            $.post('', {
                'munkalapok': munkalapok,
            }) .done (function () {
                $('#mentes').removeAttr('hidden');
                $('#load').attr('hidden', 'hidden');
                location.reload();
            })
        }
    })
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