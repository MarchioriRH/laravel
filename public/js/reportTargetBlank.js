
document.getElementById('reportForm').addEventListener('submit', function(event) {
    event.preventDefault(); // Prevenir el envío del formulario por defecto
    var form = event.target;
    var url = form.action;
    var params = new URLSearchParams(new FormData(form)).toString();
    window.open(url + '?' + params, '_blank');
});
