
<!DOCTYPE html>
  <html>
    <head>
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <title>Pareto - Realizando Teste</title>
      <link rel="icon" href="<?php echo asset('images/pareto.png');?>" type="image/x-icon">
      <link href="https://fonts.googleapis.com/css?family=Montserrat|Source+Sans+Pro" rel="stylesheet">
      <link rel="stylesheet" href="<?php echo asset('css/normalize.css');?>">
      <link rel="stylesheet" href="<?php echo asset('css/animate.min.css')?>">
      <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css">
      <link rel="stylesheet" href="https://unpkg.com/purecss@1.0.0/build/pure-min.css" integrity="sha384-nn4HPE8lTHyVtfCBi5yW9d20FjT8BJwUXyWZT9InLYax14RDjBj46LmSztkmNP9w" crossorigin="anonymous">
      <link rel="stylesheet" href="<?php echo asset('css/dotest.min.css');?>">
    </head>

    <body>
      <a href="/app/test"><img id="back-link" title="Página Inicial" src="<?php echo asset('images/left-arrow.svg');?>"></a>

      <div id="wrapper">
        <div id="question-container" class="section animated fadeInDown">
          <!-- Irá conter a questão e input de resposta -->
          <div id="subject-holder">
            <!-- <p class="subject">Multiplicação</p> -->
          </div>

          <p class="container-text">Calcule o resultado da sequinte questão:</p>

          <div id="question-holder">
            <!-- <p class="question">(3 x 4) + (5 x 2)</p> -->
          </div>

          <ul id="input-holder">
            <li><input id="answer-input" type="text" name="answer" placeholder="Responda a questão..."></li>
            <li><input id="submit-answer" type="submit" value="OK!"/></li>
          </ul>

        </div>

        <div id="marker-container" class="section animated fadeInLeft">
          <!-- Irá conter os marcadores de questões corretas e erradas -->
          <div class="holder">
            <ul id="marker-list">
              <li class="marker right"><i class="fa fa-circle" aria-hidden="true"></i></li>
              <li class="marker right"><i class="fa fa-circle" aria-hidden="true"></i></li>
              <li class="marker wrong"><i class="fa fa-circle" aria-hidden="true"></i></li>
            </ul>
          </div>
        </div>

      </div>

      <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
      <script src="<?php echo asset('dist/app.bundle.js');?>"></script>
    </body>

  </html>
