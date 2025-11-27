<?php
session_start();
$idioma = $_GET["idioma"] ?? "es";

$fichero = "$idioma.php";
include $fichero;

if($_SERVER["REQUEST_METHOD"] == "GET") {

    if(isset($_GET["modo"])){
        if ($_GET["modo"] == "oscuro" || $_GET["modo"] == "claro") {
            $_SESSION["modo"] = $_GET["modo"];
        }
        header("Location: InicioSesion.php?idioma=$idioma");
        exit;
    }

}

$modo = $_SESSION["modo"] ?? "claro";
$modo_css = "$modo.css";

?>


<!doctype html> 

<html lang="es"> 

<head> 

  <meta charset="utf-8" /> 

  <meta name="viewport" content="width=device-width,initial-scale=1" /> 

  <title><?= $eduhabla["Web title"]?></title> 

  


  <style> 

  body {
  font-family: Arial, sans-serif;
  margin: 0;
  padding: 0 20px;
}


.left {
  display: flex;
  align-items: center;
  gap: 14px;
}

.logo {
  width: 48px;
  height: 48px;
  object-fit: contain;
  cursor: pointer;
  border-radius: 6px;
  border: 1px solid #ccc;
  background: #fafafa;
  padding: 4px;
}


nav {
  display: flex;
  align-items: center;
  gap: 10px;
}

nav a {
  text-decoration: none;
  color: #333;
  padding: 8px 12px;
  font-weight: 600;
  transition: 0.2s;
}

nav a:hover {
  color: #0077cc;
}


.lang-btn {
  padding: 6px 12px;
  border: 1px solid #ffffffff;
  background: #fff;
  border-radius: 6px;
  cursor: pointer;
  font-size: 14px;
  transition: 0.2s;
}

.lang-btn:hover {
  border-color: #0077cc;
  color: #0077cc;
}


main {
  max-width: 900px;
  margin: 35px auto;
  padding: 20px;
}


h1 {
  text-align: center;
  font-size: 32px;
  margin: 0 0 10px;
  color: #111;
}


.avatar {
  width: 90px;
  height: 90px;
  border-radius: 50%;
  background: #eee;
  border: 2px solid #ccc;
  margin: 20px auto;
  display: flex;
  justify-content: center;
  align-items: center;
  overflow: hidden;
}



/* --- Footer --- */
footer {
  text-align: center;
  font-size: 14px;
  color: #666;
  padding: 20px 0;
  margin-top: 40px;
  border-top: 1px solid #ddd;
}

  </style> 
    <link rel="stylesheet" href="<?= $modo_css ?>">

</head> 

  

<body> 

  

  <header> 

    <div class="left"> 

      <img src="imagen.jpg" class="logo" alt="Logo" onclick="location.href='InicioSesion.php'"> 

      <strong>Web de X</strong> 

    </div> 

  

    <nav> 

      <a href="#inicio"><?= $eduhabla["Home"]?></a> 

      <a href="#contacto"><?= $eduhabla["Contact"]?></a> 

      <a href="?idioma=es&modo=<?= $modo ?>"><img src="banderas/es.png" width="40" alt="Español"></a>
      <a href="?idioma=en&modo=<?= $modo ?>"><img src="banderas/en.png" width="45" alt="Inglés" style="position: relative; top: -9px;"></a>
      <a href="?modo=oscuro&idioma=<?= $idioma ?>">oscuro</a>
      <a href="?modo=claro&idioma=<?= $idioma ?>">claro</a>
      <a href="index.php" style="color:#b00"><?= $eduhabla["Logout"]?></a>

    </nav> 

  </header> 

  

  

  <main id="inicio"> 

    <h1><?= $eduhabla["Home"]?></h1> 

  

    <div class="avatar"> <img src="agartha.jpg" alt="agartha"></div> 

  

    <details> 

      <summary><strong><?= $eduhabla["information"]?></strong></summary>
	

      <p> 

        <?= $eduhabla["Description text"]?> 

      </p> 

    </details> 

  

    <details> 

      <summary><strong><?= $eduhabla["Hobbies"]?></strong></summary> 

      <p> 

        <?= $eduhabla["Hobby 1"]?><br> 

        <?= $eduhabla["Hobby 2"]?><br> 

        <?= $eduhabla["Hobby 3"]?> 

      </p> 

    </details> 

  

    <details id="contacto"> 

      <summary><strong><?= $eduhabla["Contact"]?></strong></summary> 

      <p> 

        <?= $eduhabla["Contact email"]?>  

        <?= $eduhabla["Contact form hint"]?> 

      </p> 

    </details> 

  

    <footer> 

      <?= $eduhabla["Footer text"]?>

    </footer> 

  </main> 



</body> 

</html>