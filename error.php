<?php
$idioma = $_GET["idioma"] ?? "es";

$fichero = "$idioma.php";
include $fichero;

?>


<!DOCTYPE html> 
<html lang="es"> 
<head> 
    <meta charset="UTF-8"> 
    <meta name="viewport" content="width=device-width, initial-scale=1.0"> 
    <title>Error de inicio de sesión</title> 
<style>
/* ============================
   ESTILOS GENERALES
============================ */
body {
    margin: 0;
    padding: 0;
    font-family: Arial, Helvetica, sans-serif;
    background: #f8d7da; /* color suave de error */
    color: #721c24;      /* tono rojo oscuro */
    display: flex;
    justify-content: center;
    align-items: center;
    height: 100vh;
    position: relative; /* para colocar el contenedor de idiomas */
}

/* ============================
   CONTENEDOR DE IDIOMAS
============================ */
.lang-container {
    position: absolute;
    top: 15px;
    right: 15px;
    display: flex;
    gap: 10px; /* separa los botones automáticamente */
}

.lang-container a {
    text-decoration: none;
    font-weight: bold;
    color: #0078ff;
}

.lang-container a img {
    width: 40px;
    height: auto;
    border-radius: 4px;
    vertical-align: middle;
}

/* ============================
   CONTENEDOR DE ERROR
============================ */
.error-container {
    background: #f5c6cb;
    padding: 40px 30px;
    border-radius: 12px;
    box-shadow: 0 4px 12px rgba(0,0,0,0.15);
    text-align: center;
    width: 380px;
}

/* ============================
   TITULO Y TEXTO
============================ */
.error-container h1 {
    font-size: 2rem;
    margin-bottom: 20px;
    font-weight: bold;
}

.error-container p {
    font-size: 1.1rem;
    margin-bottom: 20px;
}

/* ============================
   BOTÓN
============================ */
.error-container a {
    display: inline-block;
    margin-top: 10px;
    padding: 12px 25px;
    background: #721c24;
    color: white;
    text-decoration: none;
    font-weight: bold;
    border-radius: 6px;
    transition: 0.3s;
}

.error-container a:hover {
    background: #5a161c;
}

/* ============================
   RESPONSIVE (opcional)
============================ */
@media (max-width: 420px) {
    .error-container {
        width: 90%;
        padding: 30px 20px;
    }
}
</style>

</head> 
<body>
<div class="lang-container">
    <a href="?idioma=es"><img src="banderas/es.png" alt="Español"></a>
    <a href="?idioma=en"><img src="banderas/en.png" alt="Inglés"></a>
</div>

    <div class="error-container"> 
        <h1>¡Error 404!</h1> 
        <p><?= $eduhabla["Failed attemps to log in detected"]?></p>
         <p></p>  
        <a href="index.php"><?= $eduhabla["Go back to login page"]?></a> 
    </div> 
</body> 
</html> 



 