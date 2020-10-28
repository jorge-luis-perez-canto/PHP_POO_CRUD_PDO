console.log('Fetch API funcionando');

var respuesta = document.getElementById('respuesta');
var formulario = document.getElementById('formularioGuardar');

formulario.addEventListener('submit', function (e) {
    e.preventDefault();
    var datos = new FormData(formulario);
    fetch('../controlador/post_v2.php', {
        method: 'POST',
        body: datos
    })
            .then(function (response) {
                if (response.ok) {
                    return response.text();
                } else {
                    throw "Error en la llamada";
                }
            })
            .then(function (texto) {
                console.log(texto);
                $('#modalGuardar').modal('hide');
                respuesta.innerHTML = texto;
            })           
            .catch(function (error) {
                console.log(error);
            })
})