function menu() {
    const menuContainer = document.getElementById('menu');
    // Realizar la petición AJAX
    const xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function () {
        if (this.readyState === 4 && this.status === 200) {
            // Insertar el contenido del menú en el contenedor
            menuContainer.innerHTML = this.responseText;
        }
    };
    xhttp.open('GET', 'menu.html', true);
    xhttp.send();
}

function validar(){
    var no=document.getElementById('nom').value;
    var de=document.getElementById('des').value;
    if (no!="" && de!=""){
        return true;
    }else{
        alert("ingrese valores....!!!")
        return false;
    }
}
menu();

