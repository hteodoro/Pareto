

<!DOCTYPE html>
  <html>

    <?php
      use App\Http\Controllers\SchoolClass;
    ?>

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

            <input id="addClass" type="text" name="add-name" placeholder="Nome para sala...">

            <div id="button-holder">
              <a href="#"><p class="option-button nope">Cancelar</p></a>
              <p class="option-button okay" id="addConfirm">Adicionar</p>
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
            <?php if(!empty($class_name)) : ?>
              <!-- Get the searched class by name -->
              <?php $classes = SchoolClass::show($class_name, 'name'); ?>
            <?php else : ?>
              <!-- Getting all the classes -->
              <?php $classes = SchoolClass::show(); ?>
            <?php endif; ?>

            <!-- Case students array IS NOT empty -->
            <?php if(!empty($classes)) : ?>

              <ul id="info-holder" class="animated fadeInUp">
                <li class="item">
                  <ul class="info-list pure-g">
                    <li class="info-title <?php if(session('type') == 'school') {echo 'pure-u-1-4';} else {echo 'pure-u-1-2';}?>">Sala</li>
                    <li class="info-title <?php if(session('type') == 'school') {echo 'pure-u-1-4';} else {echo 'pure-u-1-2';}?>">Mapa de Desempenho</li>
                    <?php if(session('type') == 'school') : ?>
                      <li class="info-title pure-u-1-4">Atualizar Aluno</li>
                      <li class="info-title pure-u-1-4">Deletar Aluno</li>
                    <?php endif; ?>
                  </ul>
                </li>

                 <?php foreach($classes as $class) : ?>
                   <li class="item">
                     <ul class="info-list pure-g">
                       <li class="info-item name <?php if(session('type') == 'school') {echo 'pure-u-1-4';} else {echo 'pure-u-1-2';}?>"><?php echo $class->nome; ?></li>
                       <li class="info-item map <?php if(session('type') == 'school') {echo 'pure-u-1-4';} else {echo 'pure-u-1-3';}?>"><a href="/app/map/class/<?php echo $class->id; ?>">Mapa</a></li>
                       <?php if(session('type') == 'school') : ?>
                         <li class="info-item update pure-u-1-4"><a href="#updateModal<?php echo $class->id; ?>">Atualizar</a></li>
                         <li class="info-item delete pure-u-1-4"><a href="#deleteModal<?php echo $class->id; ?>">Deletar</a></li>
                       <?php endif; ?>
                     </ul>
                   </li>

                   <?php if(session('type') == 'school') : ?>
                     <!-- DELETE MODAL -->
                     <div class="modal" id="deleteModal<?php echo $class->id; ?>">
                       <div class="modal-container">
                         <p class="modal-text">
                           Quando uma sala é deletada, todos alunos cadastrados nela
                           também são automáticamente deletados, tem certeza que deseja
                           deletar a sala do 3A?
                         </p>

                         <div id="button-holder">
                           <a href="#"><p class="option-button nope">Cancelar</p></a>
                           <a href="/app/classes/delete/<?php echo $class->id; ?>"><p class="option-button okay">Deletar</p></a>
                         </div>

                         <a class="close" href="#"></a>
                       </div>
                     </div>

                     <!-- UPDATE MODAL -->
                     <div class="modal" id="updateModal<?php echo $class->id; ?>">
                       <div class="modal-container">
                         <p class="modal-text">
                           Insira o novo nome que deseja definir para a sala <?php echo $class->nome; ?>
                         </p>

                         <input id="updateClass" type="text" name="update_name" placeholder="Novo nome para sala...">
                         <input id="classId" type="hidden" name="class_id" value="<?php echo $class->id; ?>">

                         <div id="button-holder">
                           <a href="#"><p class="option-button nope">Cancelar</p></a>
                           <p class="option-button okay" id="updateConfirm">Atualizar</p>
                         </div>

                         <a class="close" href="#"></a>
                       </div>
                     </div>

                   <?php endif; ?>
                 <?php endforeach; ?>
              </ul>

            <!-- Case students array IS empty -->
            <?php else: ?>
              <div id="empty-info" class="animated fadeInUp">
                <?php if(!empty($class_name)) : ?>
                  <p class="empty-info-text">
                    Não existe nenhuma sala adicionada com esse nome
                    ou uma sala adicionada com nome semelhante na sua escola.
                  </p>
                <?php else : ?>
                  <p class="empty-info-text">
                    Ainda não há nenhuma sala adicionada na plataforma,
                    salas adicionadas aparecerão aqui.
                  </p>
                <?php endif; ?>
              </div>
            <?php endif; ?>

          </div>

          <?php if(session('type') == 'school') : ?>
            <span href="#addModal" id="add-class"></span>
          <?php endif; ?>
      </div>

      <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

      <!-- Script for the search request -->
      <script>
        $('#search-icon').on('click', function() {
          // Getting the name from the input
          let search_name = $('.search').val().toLowerCase();
          // Checking if the value is not empty
          if(search_name.length > 0) {
            // Redirecting to the students page with a class name
            window.location.href = "/app/classes/" + search_name;
          }
        });

        // Load the add modal by click
        $('#add-class').on('click', function() {
          window.location.href = "/app/classes/#addModal";
        });

        // Adding a new class
        $('#addConfirm').on('click', function() {
          let className = $('#addClass').val();
          window.location.href = "/app/classes/add/" + className;
        });

        // Updating a new class
        $('#updateConfirm').on('click', function() {
          let updateName = $('#updateClass').val();
          let classId = $('#classId').val();
          window.location.href = "/app/classes/update/" + classId + "/" + updateName;
        });

      </script>

    </body>

  </html>
