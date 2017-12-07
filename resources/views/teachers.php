
<!DOCTYPE html>
  <html>

    <?php
      use App\Http\Controllers\Teacher;
    ?>

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
            <?php if(!empty($teacher_name)) : ?>
              <!-- Get the searched teacher by name -->
              <?php $teachers = Teacher::show($teacher_name, 'name'); ?>
            <?php else : ?>
              <!-- Getting all the teachers -->
              <?php $teachers = Teacher::show(); ?>
            <?php endif; ?>

            <!-- Case students array IS NOT empty -->
            <?php if(!empty($teachers)) : ?>

              <ul id="info-holder" class="animated fadeInUp">
                <li class="item">
                  <ul class="info-list pure-g">
                    <li class="info-title pure-u-1-3">Nome</li>
                    <li class="info-title pure-u-1-3">Disciplina</li>
                    <li class="info-title pure-u-1-3">Deletar Professor</li>
                  </ul>
                </li>

                 <?php foreach($teachers as $teacher) : ?>
                   <li class="item">
                     <ul class="info-list pure-g">
                       <li class="info-item name pure-u-1-3"><?php echo $teacher->nome; ?></li>
                       <li class="info-item subject pure-u-1-3"><?php echo $teacher->disciplina; ?></li>
                       <li class="info-item delete pure-u-1-3"><a href="#deleteModal<?php echo $teacher->id; ?>">deletar</a></li>
                     </ul>
                   </li>

                   <?php if(session('type') == 'school') : ?>
                     <div class="modal" id="deleteModal<?php echo $teacher->id; ?>">
                       <div class="modal-container">
                         <p class="modal-text">
                           Tem certeza que deseja deletar o professor <?php echo $teacher->nome; ?>?
                         </p>

                         <div id="button-holder">
                           <a href="#"><p class="option-button nope">Cancelar</p></a>
                           <a href="/app/teachers/delete/<?php echo $teacher->id; ?>"><p class="option-button okay">Deletar</p></a>
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
                <?php if(!empty($teacher_name)) : ?>
                  <p class="empty-info-text">
                    Não existe nenhum professor registrado com esse nome
                    ou um nome semelhante na sua escola.
                  </p>
                <?php else : ?>
                  <p class="empty-info-text">
                    Ainda não há nenhum professor registrado na plataforma,
                    professores registrados aparecerão aqui.
                  </p>
                <?php endif; ?>
              </div>
            <?php endif; ?>

          </div>
      </div>

      <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

      <!-- Script for the search request -->
      <script>
        $('#search-icon').on('click', function() {
          // Getting the name from the input
          let search_name = $('.search').val().toLowerCase();
          // Checking if the value is not empty
          if(search_name.length > 0) {
            // Redirecting to the students page with a teacher name
            window.location.href = "/app/teachers/" + search_name;
          }
        });
      </script>

    </body>

  </html>
