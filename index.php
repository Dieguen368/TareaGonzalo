<?php 

session_start();

if(!isset($_SESSION["numero_fallos"])){
    $_SESSION["numero_fallos"] = 0;
}
$usuario_correcto = "admin";
$contraseña_correcta = "1234";

$idioma = $_GET["idioma"] ?? "es";

$fichero = "$idioma.php";

if($_SERVER["REQUEST_METHOD"] == "GET") {

    if(isset($_GET["modo"])){
        if(!isset($_SESSION["modo"])){
            $_SESSION["modo"] = "oscuro";
        } else {
            if ($_SESSION["modo"] == "claro")
                $_SESSION["modo"] = "oscuro";
            else
                $_SESSION["modo"] = "claro";
        }
    }

}

$modo = $_SESSION["modo"] ?? "claro";

$modo = "$modo.css";

include $fichero;

 $num_fallos = $_SESSION["numero_fallos"];


if($_SERVER["REQUEST_METHOD"] == "POST") {
    $usuario = $_POST["user"] ?? "";
    $contraseña = $_POST["pass"] ?? "";

   
    if($usuario != "" || $contraseña != ""){
        if($usuario_correcto == $usuario && $contraseña_correcta == $contraseña){
            header( "Location: InicioSesion.php");
        }elseif($usuario_correcto != $usuario || $contraseña_correcta != $contraseña) {
            $_SESSION["numero_fallos"]++;
        }
    }

    if($num_fallos >= 3){
        $_SESSION["numero_fallos"] = 0;
        header( "Location: error.php");


    }
}
?>

<html>

<style>
/* ============================
   ESTILOS GENERALES
============================ */
body {
    margin: 0;
    padding: 0;
    font-family: Arial, Helvetica, sans-serif;
    background: #f5f5f5;
    color: #222;
    display: flex;
    flex-direction: column;
    align-items: center;
    padding-top: 40px;
    position: relative; /* necesario para colocar elementos arriba derecha */
}

/* ============================
   LINKS SUPERIORES (idioma y modo)
   Colocados arriba a la derecha
============================ */
body > a {
    position: absolute;
    top: 15px;
    margin-left: 10px;
    text-decoration: none;
    color: #0078ff;
    font-weight: bold;
}

body > a:hover {
    text-decoration: underline;
}

/* Posiciones exactas */
body > a:nth-of-type(1) { right: 15px; }   /* oscuro */
body > a:nth-of-type(2) { right: 75px; }   /* claro */
body > a:nth-of-type(3) { right: 130px; }  /* bandera ES */
body > a:nth-of-type(4) { right: 180px; }  /* bandera EN */

body > a img {
    vertical-align: middle;
    border-radius: 4px;
}

/* ============================
   CONTENEDOR DE LOGIN
============================ */
form {
    background: white;
    padding: 25px;
    border-radius: 12px;
    box-shadow: 0 4px 12px rgba(0,0,0,0.15);
    margin-top: 20px;
    width: 320px;
    display: flex;
    flex-direction: column;
    gap: 12px;
}

/* ============================
   CAMPOS DE TEXTO
============================ */
input[type="text"],
input[type="password"] {
    padding: 10px;
    border: 1px solid #ccc;
    border-radius: 6px;
    font-size: 16px;
}

input[type="text"]:focus,
input[type="password"]:focus {
    outline: none;
    border-color: #0078ff;
    box-shadow: 0 0 4px rgba(0,120,255,0.4);
}

/* ============================
   BOTÓN
============================ */
input[type="submit"] {
    padding: 10px;
    font-size: 16px;
    background: #0078ff;
    color: white;
    border: none;
    border-radius: 6px;
    cursor: pointer;
    transition: 0.2s;
}

input[type="submit"]:hover {
    background: #005fcc;
}

/* ============================
   TEXTOS
============================ */
p {
    font-size: 18px;
}

/* Mensaje de fallo */
p:last-child {
    color: #d10000;
    font-weight: bold;
    text-align: center;
}

</style>
<link rel="stylesheet" href="<?= $modo ?>">
<body>
<a href="?modo=oscuro">oscuro</a>
<a href="?modo=claro">claro</a>
<a href="?idioma=es"><img src="banderas/es.png" width="40" alt="Español"></a>
<a href="?idioma=en"><img src="banderas/en.png" width="45" alt="Inglés" style="position: relative; top: -9px;"></a>

<p><?= $eduhabla["name"]?> </p>
    
<form method="POST">
   <input type="text" name="user">
   <input type="password" name="pass"> 
   <input type="submit">
   <p><?php echo $num_fallos?></p>
   </form>
   <?php if($_SESSION["numero_fallos"] > 0): ?> 
    <p>fallo...</p>
    <?php endif; ?>

</body>
</html>