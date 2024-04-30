// Código JavaScript para el cronómetro
window.onload = function() {
    // Definir la fecha límite del evento (Año, Mes (0-11), Día, Hora, Minutos, Segundos)
    var countDownDate = new Date("Sep 14, 2024 10:00:00").getTime();

    // Seleccionar el elemento donde se mostrará el cronómetro
    var countdownElement = document.getElementById("crono");

    // Función para actualizar el cronómetro
    function updateCountdown() {
        // Obtener la fecha y hora actuales
        var now = new Date().getTime();

        // Calcular la distancia entre la fecha actual y la fecha límite del evento
        var distance = countDownDate - now;

        // Si el evento ha expirado, mostrar un mensaje y detener el cronómetro
        if (distance < 0) {
            countdownElement.innerHTML = "EXPIRADO";
            clearInterval(x);
            return;
        }

        // Calcular los días, horas, minutos y segundos restantes
        var days = Math.floor(distance / (1000 * 60 * 60 * 24));
        var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
        var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
        var seconds = Math.floor((distance % (1000 * 60)) / 1000);

        // Mostrar el tiempo restante en el elemento con id "crono"
        countdownElement.innerHTML = days + "d " + hours + "h " +
            minutes + "m " + seconds + "s ";
    }

    // Actualizar el cronómetro cada segundo
    var x = setInterval(updateCountdown, 1000);

    // Actualizar el cronómetro una vez inmediatamente para evitar el retraso inicial
    updateCountdown();

    /** funcionalidad del boton del menu para pantallas pequeñas */
    // Seleccionamos el boton por su etiqueta
    var boton = document.querySelector('#logo button');
    var click = true;

    // Añadir un eventlistener para un 'click'
    boton.addEventListener('click', function() {
    // Aquí puedes colocar el código que se ejecutará cuando se haga clic en el botón
        if (click) {
            click = !click;
            document.querySelector('#menu').classList.add("activo");
        } else {
            click = !click;
            document.querySelector('#menu').classList.remove("activo");
        }
    });
};