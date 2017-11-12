
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
      <link rel="stylesheet" href="http://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
      <link rel="stylesheet" href="https://unpkg.com/purecss@1.0.0/build/pure-min.css" integrity="sha384-nn4HPE8lTHyVtfCBi5yW9d20FjT8BJwUXyWZT9InLYax14RDjBj46LmSztkmNP9w" crossorigin="anonymous">
      <link rel="stylesheet" href="<?php echo asset('css/dotest.min.css');?>">
    </head>

    <body>
      <a id="back-link" href="#modal"></a>

      <div class="modal" id="modal">
        <div class="modal-container">
          <p class="modal-text">
            É necessário que o teste
            seja finalizado para que possamos salvar
            o seu nível de desempenho nas disciplinas,
            deseja mesmo sair?
          </p>

          <div id="button-holder">
            <a href="#"><p class="option-button nope">Cancelar</p></a>
            <a href="/app/test"><p class="option-button okay">Sair</p></a>
          </div>

          <a class="close" href="#"></a>
        </div>
      </div>

      <div id="wrapper">
        <div id="question-container" class="section animated fadeInDown">
          <!-- Irá conter a questão e input de resposta -->
          <div id="subject-holder">
            <!-- Matéria e dificuldade carregadas através do React -->
          </div>

          <p class="container-text">Calcule o resultado da sequinte questão:</p>

          <!-- Irá receber mensagem de erro quando a resposta for vazia -->
          <div id="error">
            <!-- Mensagem carregada através do React -->
          </div>

          <div id="question-holder">
            <!-- Perguntas carregadas através do React -->
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
              <li class="marker right"></li>
              <li class="marker right"></li>
              <li class="marker wrong"></li>
            </ul>
          </div>
        </div>

      </div>

      <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
      <script src="<?php echo asset('dist/app.bundle.js');?>"></script>
    </body>

  </html>
