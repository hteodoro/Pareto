
<!DOCTYPE html>
  <html>
    <head>
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <title>Pareto - Professores</title>
      <link rel="icon" href="<?php echo asset('images/pareto.png');?>" type="image/x-icon">
      <link href="https://fonts.googleapis.com/css?family=Montserrat|Source+Sans+Pro" rel="stylesheet">
      <link rel="stylesheet" href="<?php echo asset('css/normalize.css');?>">
      <link rel="stylesheet" href="<?php echo asset('css/animate.min.css')?>">
      <link rel="stylesheet" href="http://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
      <link rel="stylesheet" href="https://unpkg.com/purecss@1.0.0/build/pure-min.css" integrity="sha384-nn4HPE8lTHyVtfCBi5yW9d20FjT8BJwUXyWZT9InLYax14RDjBj46LmSztkmNP9w" crossorigin="anonymous">
      <link rel="stylesheet" href="<?php echo asset('css/teachers.min.css');?>">
    </head>

    <body>

      <?php include_once __DIR__ . '/../templates/sidemenu.php'; ?>

      <div id="wrapper">
          <div class="section" id="upper-options">
            <ul id="selectors" class="animated fadeInDown">
              <li class="item">
                <input type="text" name="search" placeholder="Busque um professor..." class="search">
              </li>
              <li class="item">
                <span class="icon" id="search-icon"></span>
              </li>
            </ul>
          </div>

          <div class="section" id="info-section">
            <ul id="info-holder" class="animated fadeInUp">

              <div class="modal" id="deleteModal">
                <div class="modal-container">
                  <p class="modal-text">
                    Tem certeza que deseja deletar o professor Wesley Hammer?
                  </p>

                  <div id="button-holder">
                    <a href="#"><p class="option-button nope">Cancelar</p></a>
                    <a href="/app/teachers/"><p class="option-button okay">Deletar</p></a>
                  </div>

                  <a class="close" href="#"></a>
                </div>
              </div>

              <li class="item">
                <ul class="info-list pure-g">
                  <li class="info-title pure-u-1-3">Nome</li>
                  <li class="info-title pure-u-1-3">Disciplina</li>
                  <li class="info-title pure-u-1-3">Deletar Professor</li>
                </ul>
              </li>

              <li class="item">
                <ul class="info-list pure-g">
                  <li class="info-item name pure-u-1-3">Wesley Hammer</li>
                  <li class="info-item subject pure-u-1-3">Matemática</li>
                  <li class="info-item delete pure-u-1-3">deletar</li>
                </ul>
              </li>

              <li class="item">
                <ul class="info-list pure-g">
                  <li class="info-item name pure-u-1-3">Thiago Matias</li>
                  <li class="info-item subject pure-u-1-3">Matemática</li>
                  <li class="info-item delete pure-u-1-3">deletar</li>
                </ul>
              </li>
            </ul>
          </div>

      </div>

    </body>

  </html>