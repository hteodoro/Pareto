

<!DOCTYPE html>
  <html>
    <head>
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <title>Pareto - Salas</title>
      <link rel="icon" href="<?php echo asset('images/pareto.png');?>" type="image/x-icon">
      <link href="https://fonts.googleapis.com/css?family=Montserrat|Source+Sans+Pro" rel="stylesheet">
      <link rel="stylesheet" href="<?php echo asset('css/normalize.css');?>">
      <link rel="stylesheet" href="<?php echo asset('css/animate.min.css')?>">
      <link rel="stylesheet" href="http://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
      <link rel="stylesheet" href="https://unpkg.com/purecss@1.0.0/build/pure-min.css" integrity="sha384-nn4HPE8lTHyVtfCBi5yW9d20FjT8BJwUXyWZT9InLYax14RDjBj46LmSztkmNP9w" crossorigin="anonymous">
      <link rel="stylesheet" href="<?php echo asset('css/classes.min.css');?>">
    </head>

    <body>

      <?php include_once __DIR__ . '/../templates/sidemenu.php'; ?>

      <div id="wrapper">

        <div class="modal" id="addModal">
          <div class="modal-container">
            <p class="modal-text">
              Insira um nome para a sala
            </p>

            <input type="text" name="updateName" placeholder="Nome para sala...">

            <div id="button-holder">
              <a href="#"><p class="option-button nope">Cancelar</p></a>
              <a href="/app/classes/"><p class="option-button okay">Adicionar</p></a>
            </div>

            <a class="close" href="#"></a>
          </div>
        </div>

        <div class="modal" id="deleteModal">
          <div class="modal-container">
            <p class="modal-text">
              Quando uma sala é deletada, todos alunos cadastrados nela
              também são automáticamente deletados, tem certeza que deseja
              deletar a sala do 3A?
            </p>

            <div id="button-holder">
              <a href="#"><p class="option-button nope">Cancelar</p></a>
              <a href="/app/classes/"><p class="option-button okay">Deletar</p></a>
            </div>

            <a class="close" href="#"></a>
          </div>
        </div>

        <div class="modal" id="updateModal">
          <div class="modal-container">
            <p class="modal-text">
              Insira o novo nome que deseja definir para a sala do 3A
            </p>

            <input type="text" name="updateName" placeholder="Novo nome para sala...">

            <div id="button-holder">
              <a href="#"><p class="option-button nope">Cancelar</p></a>
              <a href="/app/classes/"><p class="option-button okay">Atualizar</p></a>
            </div>

            <a class="close" href="#"></a>
          </div>
        </div>

          <div class="section" id="upper-options">
            <ul id="selectors" class="animated fadeInDown">
              <li class="item">
                <input type="text" name="search" placeholder="Busque uma Sala..." class="search">
              </li>
              <li class="item">
                <span class="icon" id="search-icon"></span>
              </li>
            </ul>
          </div>

          <div class="section" id="info-section">
            <ul id="info-holder" class="animated fadeInUp">

              <li class="item">
                <ul class="info-list pure-g">
                  <li class="info-title pure-u-1-4">Sala</li>
                  <li class="info-title pure-u-1-4">Mapa de Desempenho</li>
                  <li class="info-title pure-u-1-4">Atualizar Sala</li>
                  <li class="info-title pure-u-1-4">Deletar Sala</li>
                </ul>
              </li>

              <li class="item">
                <ul class="info-list pure-g">
                  <li class="info-item class pure-u-1-4">3A</li>
                  <li class="info-item map pure-u-1-4">Mapa</li>
                  <li class="info-item update pure-u-1-4">atualizar</li>
                  <li class="info-item delete pure-u-1-4">deletar</li>
                </ul>
              </li>

              <li class="item">
                <ul class="info-list pure-g">
                  <li class="info-item class pure-u-1-4">3B</li>
                  <li class="info-item map pure-u-1-4">Mapa</li>
                  <li class="info-item update pure-u-1-4">atualizar</li>
                  <li class="info-item delete pure-u-1-4">deletar</li>
                </ul>
              </li>

              <li class="item">
                <ul class="info-list pure-g">
                  <li class="info-item class pure-u-1-4">2A</li>
                  <li class="info-item map pure-u-1-4">Mapa</li>
                  <li class="info-item update pure-u-1-4">atualizar</li>
                  <li class="info-item delete pure-u-1-4">deletar</li>
                </ul>
              </li>

              <li class="item">
                <ul class="info-list pure-g">
                  <li class="info-item class pure-u-1-4">2B</li>
                  <li class="info-item map pure-u-1-4">Mapa</li>
                  <li class="info-item update pure-u-1-4">atualizar</li>
                  <li class="info-item delete pure-u-1-4">deletar</li>
                </ul>
              </li>
            </ul>
          </div>

          <span id="add-class"></span>
      </div>

    </body>

  </html>
