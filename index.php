<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Josefin+Sans:ital,wght@0,400;1,300&display=swap" rel="stylesheet">
    <!-- bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <!-- JavaScript -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="./css/style.css">
    <title>Menu</title>
</head>
<body>
<?php
    if (file_exists('./xml/menu.xml')) {
        $xml = simplexml_load_file('./xml/menu.xml');
    } else {
        exit('Error abriendo menu.xml.');
    }
    
?>
<!-- Comienzo del Navbar -->
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <div class="container-fluid">
    <a class="navbar-brand" href=".">Menu</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <?php
                $aux=[];
                foreach ($xml->plato as $plato) {
                    if (!in_array((string)$plato['pla'],$aux)) {
                        echo '<li class="nav-item">';
                        echo '<a class="nav-link active" aria-current="page" href="?pla='.$plato['pla'].'">'.$plato['pla'].'</a>';
                        echo '</li>';
                        array_push($aux,(string)$plato['pla']);
                    }
                }
        ?>
      </ul>
    </div>
  </div>
</nav>
<!-- Fin del Navbar -->
<div class="margen">
    <div class="centro">
        <h1>MENU DE LA CASA</h1>
        <h2>BIENVENIDO A NUESTRO</h2>
        <h2>RESTAURANTE</h2>
    </div>
<!-- <img src="./img/albondigas-en-salsa-de-almendras.jpg" alt="">
<img src="./img/alcachofas-a-la-montillana-con-jamon.jpg" alt="">
<img src="./img/arroz-con-rabo-de-toro.jpg" alt="">
<img src="./img/atun-encebollado.jpg" alt="">
<img src="./img/berenjena-a-la-bolonesa-vegana-con-bechamel-de-coliflor.jpg" alt="">
<img src="./img/brocoli-salteado-con-cebolla-roja-y-almendras.jpg" alt="">
<img src="./img/calamares-en-salsa.jpg" alt="">
<img src="./img/carne-con-tomate.jpg" alt="">
<img src="./img/ensalada-de-col-con-nueces-pasas-y-manzana.jpg" alt="">
<img src="./img/ensalada-de-garbanzos-acelgas-y-hummus.jpg" alt="">
<img src="./img/espaguetis-a-la-bolonesa-350-g.jpg" alt="">
<img src="./img/guisantes-con-jamon.jpg" alt="">
<img src="./img/merluza-al-cava-con-gambas-350-g.jpg" alt="">
<img src="./img/quinoa-con-pollo-y-hortalizas.jpg" alt="">
<img src="./img/ragout-de-ternera-en-salsa-de-vino-tinto-350-g.jpg" alt="">
<img src="./img/risotto-de-champinones-con-bacon-y-parmesano-350-g.jpg" alt="">
<img src="./img/solomillo-de-cerdo-en-salsa-de-vino-fino.jpg" alt="">
<img src="./img/tallarines-a-la-carbonara.jpg" alt="">
<img src="./img/wok-de-verduras-con-soja-y-cacahuetes.jpg" alt=""> -->

<div class="row gx-0">
    <div class="column-1">  
    <?php 
            if(isset($_GET['pla'])) {
            foreach ($xml->plato as $plato) {
                if ($_GET['pla']==$plato['pla']) {
                echo "<div class='column2 flex'>";
                echo '<div class="column2">';
                echo "<h3>";
                echo $plato->nombre;
                echo "<br>";
                echo "</h3>";
                

                echo "<p class='desc'>$plato->descripcion</p>";
                echo "<h5>";
                echo $plato->calorias;
                echo "<br>";
                echo $plato->precio;
                echo "</h5>";
                echo '</div>';
                echo "<img src='$plato->link' alt=''>";
                echo "</div>";
                }
            }
        } else {
            foreach ($xml->plato as $plato) {
                echo $plato->nombre.' - ';
                echo $plato->precio.'<br>';
            }
        }
    ?>
    </div>
</div>
</div>

</body>
</html>