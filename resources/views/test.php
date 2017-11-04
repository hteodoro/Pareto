
<!DOCTYPE html>
  <html>
    <head>
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <title>Pareto - Teste de Desempenho</title>
      <link rel="icon" href="<?php echo asset('images/pareto.png');?>" type="image/x-icon">
      <link href="https://fonts.googleapis.com/css?family=Montserrat|Source+Sans+Pro" rel="stylesheet">
      <link rel="stylesheet" href="<?php echo asset('css/normalize.css');?>">
      <link rel="stylesheet" href="<?php echo asset('css/animate.min.css')?>">
      <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css">
      <link rel="stylesheet" href="https://unpkg.com/purecss@1.0.0/build/pure-min.css" integrity="sha384-nn4HPE8lTHyVtfCBi5yW9d20FjT8BJwUXyWZT9InLYax14RDjBj46LmSztkmNP9w" crossorigin="anonymous">
      <link rel="stylesheet" href="<?php echo asset('css/test.min.css');?>">
    </head>

    <body>

      <div id="side-menu">
        <!-- TODO: Trocar por imagem -->
        <h1 class="logo">Pareto</h1>
        <!-- /////////////////////// -->
        <ul class="list">
          <li class="item test"><a href="/app/test/">Testes</a></li>
          <li class="item map"><a href="#">Mapa</a></li>
          <li class="item perfil"><a href="#">Perfil</a></li>
          <li class="item bottom logout"><a href="/logout">Logout</a></li>
        </ul>
      </div>

      <div id="wrapper">
        <div class="section container animated fadeIn">
          <img class="section-img" src="<?php echo asset('images/ParetoLight.svg'); ?>">
          <p class="section-text">
            Realize os testes 80/20 para que sua escola e professores
            tenham a informação de onde estão suas verdadeiras dificuldades
            na disciplina de matemática! 
          </p>
          <a href="/app/test/do"><button class="section-link">Iniciar teste!</button></a>
        </div>
      </div>

    </body>
  </html>
