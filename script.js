// Código JavaScript para el cronómetro
window.onload = function () {
  //iniciamos el cronometro
  cronometro();
  //iniciamos funcion para menu en pantalas pequeñas
  botonesMenu();
  //iniciamos funcion para convertir las letras a mayusculas
  convertirMayusculas();

  document.getElementById("enviar").addEventListener("click", validar);
  /**
   * Funcion que ejecutará todas las validaciones del formulario
   * si alguna validacion devuelve false se dentendrá el envio del formulario
   */

  function validar(formulario) {
    if (
      validarNombre() &&
      validarApellido1() &&
      validarApellido2() &&
      validarDni() &&
      validarFechaNacimiento()&&
      validarMatricula()&&
      validarEmail()
    ) {
      return true;
    } else {
      formulario.preventDefault(); // Evita que el formulario se envíe
      return false;
    }
  }

  /**
   * funcion para el cronometro
   */
  function cronometro() {
    // definimos la fecha límite del evento
    var fechaLimite = new Date("Sep 14, 2024 10:00:00").getTime();

    // Seleccionar el elemento por id y lo asignamos a una variable
    var cronoElemento = document.getElementById("crono");

    // cremos funcionm que actualizara el cronómetro
    function actualizarCrono() {
      // obtenemos fecha y hora actuales
      var ahora = new Date().getTime();

      // restaremos la fecha límite del evento con la actual y almacenamos en una variable
      var tiempoRestante = fechaLimite - ahora;

      // si el tiempo restante ha llegado a 0 mostramos un mensaje y lo deytenemos
      if (tiempoRestante < 0) {
        cronoElemento.innerHTML = "FIANALIZADO";
        clearInterval(x);
        return;
      }

      // Calcular los días, horas, minutos y segundos restantes
      var dias = Math.floor(tiempoRestante / (1000 * 60 * 60 * 24));
      var horas = Math.floor(
        (tiempoRestante % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60)
      );
      var minutos = Math.floor(
        (tiempoRestante % (1000 * 60 * 60)) / (1000 * 60)
      );
      var segundos = Math.floor((tiempoRestante % (1000 * 60)) / 1000);

      // Mostrar el tiempo restante en el elemento con id "crono"
      cronoElemento.innerHTML =
        dias + "d " + horas + "h " + minutos + "m " + segundos + "s ";
    }
    // actualizamos el crono con setinterval cada 1 segundo y lo almacenamos en la variable x
    var x = setInterval(actualizarCrono, 1000);

    // Actualizar el cronómetro una vez inmediatamente para evitar el retraso inicial
    actualizarCrono();
  }

  /**
   * funcion para menú pantallas pequeñas
   */
  function botonesMenu() {
    // Seleccionamos el boton por su etiqueta
    var boton = document.querySelector("#logo button");
    var click = true;

    // Añadir un eventlistener para un 'click'
    boton.addEventListener("click", function () {
      // Aquí puedes colocar el código que se ejecutará cuando se haga clic en el botón
      if (click) {
        click = !click;
        document.querySelector("#menu").classList.add("activo");
      } else {
        click = !click;
        document.querySelector("#menu").classList.remove("activo");
      }
    });
  }

  /**
   * función para convertir todo los inputs en mayúsculas
   */
  function convertirMayusculas() {
    // Lógica para la validación del formulario
    var inputs = document.querySelectorAll("input");
    inputs.forEach(function (input) {
      input.addEventListener("blur", convertirLetras);
    });

    function convertirLetras(event) {
      var input = event.target;
      input.value = input.value.toUpperCase();
    }
  }

  /**
   * valida el nombre de los participantes
   * @returns {boolean} - devolvera true si en la validación no aparece algun erroreturns
   */
  function validarNombre() {
    //creamos expresión regular para recibir solo letras
    var patron = /^[a-zA-Z\s]+$/;
    var errorNombre = "";

    //realizamos un bucle para que recorra todas las variables de nomebde los participantes
    for (var i = 1; i <= 4; i++) {
      var nombre = document.getElementById("nombre_" + i).value;

      if (!patron.test(nombre)) {
        //si nombre contiene algo divferente a letras agrega el mensaje a la variable errores
        errorNombre +=
          "El campo nombre del participante " +
          i +
          " solo puede contener letras. <br>";
      }
      //si la variable errorNombre contiene un mensja lo insertaremos en el elemento con id errorres
      //y devolveremos false
      if (errorNombre !== "") {
        document.getElementById("errores").innerHTML = errorNombre;
        //hacemos que se dirija la pantalla hacia el error
        window.scrollTo({ top: 0, behavior: "smooth" });
        return false;
      }
    }
    //si todo esta bien devolveremos true
    return true;
  }
  /**
   * valida el primer apellido de los participantes
   * @returns {boolean} - devolvera true si en lka validación no aparece algun error
   */
  function validarApellido1() {
    //creamos expresión regular para recibir solo letras
    var patron = /^[a-zA-Z\s]+$/;
    var errorApellido1 = "";

    //realizamos un bucle para que recorra todas las variables de nomebde los participantes
    for (var i = 1; i <= 4; i++) {
      var apellido1 = document.getElementById("apellido1_" + i).value;
      if (!patron.test(apellido1)) {
        //si apellidos contienen algo divferente a letras agrega el mensaje a la variable errores
        errorApellido1 +=
          "los campos del primer apellido del participante " +
          i +
          " solo pueden contener letras. <br>";
      }
      //si la variable errorApellidos contiene un mensaje lo insertaremos en el elemento con id errorres
      //y devolveremos false
      if (errorApellido1 !== "") {
        document.getElementById("errores").innerHTML = errorApellido1;
        //hacemos que se dirija la pantalla hacia el error
        window.scrollTo({ top: 0, behavior: "smooth" });
        return false;
      }
    }
    //si todo esta bien devolveremos true
    return true;
  }

  /**
   * valida el segundo apellido de los participantes
   * @returns {boolean} - devolvera true si en lka validación no aparece algun error
   */
  function validarApellido2() {
    //creamos expresión regular para recibir solo letras
    var patron = /^[a-zA-Z\s]+$/;
    var errorApellido2 = "";

    //realizamos un bucle para que recorra todas las variables de nomebde los participantes
    for (var i = 1; i <= 4; i++) {
      var apellido2 = document.getElementById("apellido2_" + i).value;
      if (!patron.test(apellido2)) {
        //si apellidos contienen algo divferente a letras agrega el mensaje a la variable errores
        errorApellido2 +=
          "los campos del segundo apellido del participante " +
          i +
          " solo pueden contener letras. <br>";
      }
      //si la variable errorApellidos contiene un mensaje lo insertaremos en el elemento con id errorres
      //y devolveremos false
      if (errorApellido2 !== "") {
        document.getElementById("errores").innerHTML = errorApellido2;
        //hacemos que se dirija la pantalla hacia el error
        window.scrollTo({ top: 0, behavior: "smooth" });
        return false;
      }
    }
    //si todo esta bien devolveremos true
    return true;
  }

  /**
   * valida los dni de los participante.
   * @returns {boolean} -devolvera true si en la validación no aparece algun error
   */
  function validarDni() {
    // creamos expresion regular para validar el formato del dni, 8 dígitos seguidos y una letra
    var patron = /^\d{8}[a-zA-Z]$/;
    var errorDni = "";
    // Recorremos los campos de DNI de los participantes
    for (var i = 1; i <= 4; i++) {
      var dni = document.getElementById("dni_" + i).value;

      if (!patron.test(dni) || comprobarDni(dni)) {
        // agregamos un mensaje de error si el DNI coincide con el patrón
        errorDni +=
          "El DNI introducido del participante " +
          i +
          " no es correcto, debe tener un formato '12345678A' <br>";
      }

      // Si hay un mensaje de error, mostrarlo y detener el envío del formulario
      if (errorDni !== "") {
        document.getElementById("errores").innerHTML = errorDni;
        // Hacer scroll hacia el inicio de la página donde se encuentra el mensaje de error
        window.scrollTo({ top: 0, behavior: "smooth" });
        return false;
      }
    }

    function comprobarDni(dni) {
      //asigamos la letra del dni a una variable, extraemos el caracter en la posicion 8
      var letraDni = dni.charAt(8);
      //asignamos los números del dni a una variable, son substring seleccionamos desde el indice 0 hasta el 8 sin incluirlo, tambien lo conversimos en entero con parseint.
      var numerosDni = parseInt(dni.substring(0, 8));
      //calculamos la letra que deberia esperarse, calculando el resto del nuemro entero entre 23
      var indiceLetras = numerosDni % 23;
      //definimos el conjunto de letras donde se buscará por un indice
      var letras = "TRWAGMYFPDXBNJZSQVHLCKE";
      //definimos la letra correcta extrayendo del conjunto de letras el indice que nos ha dao la operacion
      var letraCorrecta = letras.charAt(indiceLetras);
      if (letraDni == letraCorrecta) {
        return false;
      } else {
        return true;
      }
    }
    // Si no hay errores, devolver true
    return true;
  }

  /**
   * valida las fechas de naciemieto de los participante.
   * @returns {boolean} -devolverá true si en la validación no aparece algun error
  
   */
  function validarFechaNacimiento() {
    //variable que alamcenará los errores
    var errorFechaNacimiento = "";
    //recorremos las fechas de naciemietno de todos los participantes
    for (var i = 1; i <= 4; i++) {
      //se obtiene la feca almacenada por id y se alamacena en una variable
      var fechaNacimiento = document.getElementById(
        "fechaNacimiento_" + i
      ).value;
      //creamos un objeto de tipo fecha con el texto almacenado en fecha de naciemiento
      var fecha = new Date(fechaNacimiento);
      //para que nadie pueda introducir una fecha mayor a la actual
      var fechaActual = new Date();
      // variable para que nadie pueda iuntroducir una menor a 1900
      var fechaMinima = new Date("1900-01-01");

      // Verificar si la fecha es válida
      if (
        isNaN(fecha.getTime()) ||
        fecha > fechaActual ||
        fecha < fechaMinima
      ) {
        // La fecha no es válida o es mayor que la fecha actual
        errorFechaNacimiento +=
          "fecha de nacimiento no válida en participante " + i + "<br>";
      } else {
        // Formatear la fecha en dd-mm-aaaa
        var dia = fecha.getDate();
        var mes = fecha.getMonth() + 1;
        var anio = fecha.getFullYear();
        var fechaFormateada = dia + "-" + mes + "-" + anio;
      }
      //si la variable errorApellidos contiene un mensaje lo insertaremos en el elemento con id errorres
      //y devolveremos false
      if (errorFechaNacimiento !== "") {
        document.getElementById("errores").innerHTML = errorFechaNacimiento;
        //hacemos que se dirija la pantalla hacia el error
        window.scrollTo({ top: 0, behavior: "smooth" });
        return false;
      }
    }
    // Actualizar el valor del campo de fecha de nacimiento en el formulario
    document.getElementById("fechaNacimiento_" + i).value = fechaFormateada;
    //si todo esta bien devolveremos true
    return true;
  }

  function validarMatricula() {
    //creamos expresion regular que aceptara letras o numeros
    var patron = /^[a-zA-Z0-9]*$/;
    //definismo la variable que almacenará el error
    var errorMatricula = "";
    //recorremos los datos lamacenado en matreicula de todos los participantes
    for (var i = 1; i <= 4; i++) {
      var matricula = document.getElementById("matricula_" + i).value;
      if (!patron.test(matricula)) {
        errorMatricula +=
          "La matrícula del vehículo del participante " +
          i +
          " solo puede contener letras o números. <br>";
      }
    }

    if (errorMatricula !== "") {
      document.getElementById("errores").innerHTML = errorMatricula;
      window.scrollTo({ top: 0, behavior: "smooth" });
      return false;
    }
    return true;
  }

  function validarEmail(){
    /*definimos una expresion regular donde el e-mail debe comenzar con caracteres alfanuméricos, guines, etc
    Debe tener @ después de los caracteres iniciales
    Después de la arroba puede haber caracteres alfanuméricos, puntos,guines
    Debe haber un punto después del segundo grupo de caractere
    Debe terminar con 2 o 3 letras*/
    var patron = /^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,4}$/;
    //definismo la variable que almacenará el error
    var errorEmail="";
    //recorremos los datos lamacenado en matreicula de todos los participantes
    for (var i = 1; i <= 4; i++) {
      var email = document.getElementById("email_" + i).value;
      if (!patron.test(email)) {
        errorEmail += "el email introducido del participante " +i +" no es valido. <br>";
      }
    }

    if (errorEmail !== "") {
      document.getElementById("errores").innerHTML = errorEmail;
      window.scrollTo({ top: 0, behavior: "smooth" });
      return false;
    }
    return true;

  }

};
