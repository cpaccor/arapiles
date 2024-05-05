<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contacto</title>
    <script src="script.js"></script>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <header>
    <nav>
        <div id="logo">
            <a href="index.html">
                <img src="img/Logo_Naranja.webp" alt="logo">
            </a>
            <button></button>
        </div>

        <div id="menu">
            <ul>
                <li class="botonMenu">
                    <a class="txtBoton" href="reglamento.html">REGLAMENTO</a>
                </li>
                
                <li class="botonMenu">
                    <a class="txtBoton" href="inscripcion.html">INSCRIPCION</a>
                </li>
                
                <li class="botonMenu">
                    <a class="txtBoton" href="index.html">INICIO</a>
                </li>

            </ul>
        </div>
    </nav>
</header>
<div id="cardCrono" style="display: none;">
    <div id="crono">

    </div>
</div>


<!-- Formulario de contacto -->
<h1 class="tituloFormContacto">Formulario de contacto</h1>
<!--mensaje de contacto enviado correctamente-->
<p class="mensajeContacto">Si tienes alguna pregunta no dudes en contactarnos <br>
O puedes llamarnos al telf: 123456789</p>
<!--creamos un fragmento de php que valorará si se ha recibido mediante el metodo get
mensaje-enviado=true para generar un texto -->
<?php if(isset($_GET['mensaje_enviado']) && $_GET['mensaje_enviado'] == 'true'): ?>
    <div >
        <p class="mensajeEnviado">¡El mensaje ha sido enviado correctamente!</p>
    </div>
<?php endif; ?>    
<form action="https://formsubmit.co/cristian_pac@live.com" method="POST" id="formContacto">
        <label for="nombre">Nombre</label>
        <input type="text" id="nombre" name="name" required="">
        <label for="email">Email</label>
        <input type="email" id="email" name="email" required="">
        <label for="mensaje">Mensaje</label>
        <textarea id="textoContacto" name="coment"cols="25" rows="4"></textarea>
		<input type="hidden" name="_captcha" value="false">
		<input type="hidden" name="_next" value="https://cpacdev.es/contacto.php?mensaje_enviado=true">
        
        <button type="submit">Enviar mensaje</button>
</form>

<footer>
    <p>
        &copy; 2024 CE Arapiles. Todos los derechos reservados.
    </p>
</footer>
</html>