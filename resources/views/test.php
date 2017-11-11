
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
      <link rel="stylesheet" href="http://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
      <link rel="stylesheet" href="https://unpkg.com/purecss@1.0.0/build/pure-min.css" integrity="sha384-nn4HPE8lTHyVtfCBi5yW9d20FjT8BJwUXyWZT9InLYax14RDjBj46LmSztkmNP9w" crossorigin="anonymous">
      <link rel="stylesheet" href="<?php echo asset('css/test.min.css');?>">
    </head>

    <body>

      <div class="modal" id="modal">
        <div class="modal-container">
          <p class="modal-text">
            Quando iniciado é necessário que o teste
            seja finalizado para que possamos salvar
            o seu nível de desempenho nas disciplinas,
            deseja mesmo iniciar?
          </p>

          <div id="button-holder">
            <a href="#"><p class="option-button nope">Cancelar</p></a>
            <a href="/app/test/do"><p class="option-button okay">Iniciar</p></a>
          </div>

          <a class="close" href="#"></a>
        </div>
      </div>

      <?php include_once __DIR__ . '/../templates/sidemenu.php'; ?>

      <div id="wrapper">
        <div class="section container animated fadeIn">
          <img class="section-img" src="<?php echo asset('images/ParetoLight.svg'); ?>">
          <p class="section-text">
            Realize os testes 80/20 para que sua escola e professores
            tenham a informação de onde estão suas verdadeiras dificuldades
            na disciplina de matemática!
          </p>
          <!-- <a href="/app/test/do"><button class="section-link">Iniciar teste!</button></a> -->
          <a href="#modal"><button class="section-link">Iniciar teste!</button></a>
        </div>
      </div>

    </body>
  </html>
