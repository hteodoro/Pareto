
<!DOCTYPE html>
  <html>

    <?php
      use App\Http\Controllers\Student;
    ?>

    <head>
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <title>Pareto - Estudantes</title>
      <link rel="icon" href="<?php echo asset('images/pareto.png');?>" type="image/x-icon">
      <link href="https://fonts.googleapis.com/css?family=Montserrat|Source+Sans+Pro" rel="stylesheet">
      <link rel="stylesheet" href="<?php echo asset('css/normalize.css');?>">
      <link rel="stylesheet" href="<?php echo asset('css/animate.min.css')?>">
      <link rel="stylesheet" href="http://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
      <link rel="stylesheet" href="https://unpkg.com/purecss@1.0.0/build/pure-min.css" integrity="sha384-nn4HPE8lTHyVtfCBi5yW9d20FjT8BJwUXyWZT9InLYax14RDjBj46LmSztkmNP9w" crossorigin="anonymous">
      <link rel="stylesheet" href="<?php echo asset('css/students.min.css');?>">
    </head>

    <body>

      <?php include_once __DIR__ . '/../templates/sidemenu.php'; ?>

      <div id="wrapper">
          <div class="section" id="upper-options">
            <ul id="selectors" class="animated fadeInDown">
              <li class="item">
                <input type="text" name="search" placeholder="Busque um aluno..." class="search">
              </li>
              <li class="item">
                <span class="icon" id="search-icon"></span>
              </li>
            </ul>
          </div>

          <div class="section" id="info-section">
            <?php if(!empty($student_name)) : ?>
              <!-- Get the searched student by name -->
              <?php $students = Student::show($student_name, 'name'); ?>
            <?php else : ?>
              <!-- Getting all the students -->
              <?php $students = Student::show(); ?>
            <?php endif; ?>

            <!-- Case students array IS NOT empty -->
            <?php if(!empty($students)) : ?>

              <ul id="info-holder" class="animated fadeInUp">
                <li class="item">
                  <ul class="info-list pure-g">
                    <li class="info-title <?php if(session('type') == 'school') {echo 'pure-u-1-4';} else {echo 'pure-u-1-3';}?>">Nome</li>
                    <li class="info-title <?php if(session('type') == 'school') {echo 'pure-u-1-4';} else {echo 'pure-u-1-3';}?>">Sala</li>
                    <li class="info-title <?php if(session('type') == 'school') {echo 'pure-u-1-4';} else {echo 'pure-u-1-3';}?>">Mapa de Desempenho</li>
                    <?php if(session('type') == 'school') : ?>
                      <li class="info-title pure-u-1-4">Deletar Aluno</li>
                    <?php endif; ?>
                  </ul>
                </li>

                 <?php foreach($students as $student) : ?>
                   <li class="item">
                     <ul class="info-list pure-g">
                       <li class="info-item name <?php if(session('type') == 'school') {echo 'pure-u-1-4';} else {echo 'pure-u-1-3';}?>"><?php echo $student->nome; ?></li>
                       <li class="info-item class <?php if(session('type') == 'school') {echo 'pure-u-1-4';} else {echo 'pure-u-1-3';}?>"><?php echo $student->sala; ?></li>
                       <li class="info-item map <?php if(session('type') == 'school') {echo 'pure-u-1-4';} else {echo 'pure-u-1-3';}?>"><a href="/app/map/student/<?php echo $student->id; ?>">Mapa</a></li>
                       <?php if(session('type') == 'school') : ?>
                         <li class="info-item delete pure-u-1-4"><a href="#deleteModal<?php echo $student->id; ?>">deletar</a></li>
                       <?php endif; ?>
                     </ul>
                   </li>

                   <?php if(session('type') == 'school') : ?>
                     <div class="modal" id="deleteModal<?php echo $student->id; ?>">
                       <div class="modal-container">
                         <p class="modal-text">
                           Tem certeza que deseja deletar o aluno <?php echo $student->nome; ?>?
                         </p>

                         <div id="button-holder">
                           <a href="#"><p class="option-button nope">Cancelar</p></a>
                           <a href="/app/students/delete/<?php echo $student->id; ?>"><p class="option-button okay">Deletar</p></a>
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
                <?php if(!empty($student_name)) : ?>
                  <p class="empty-info-text">
                    Não existe nenhum aluno registrado com esse nome
                    ou um nome semelhante na sua escola.
                  </p>
                <?php else : ?>
                  <p class="empty-info-text">
                    Ainda não há nenhum aluno registrado na plataforma,
                    alunos registrados aparecerão aqui.
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
            // Redirecting to the students page with a student name
            window.location.href = "/app/students/" + search_name;
          }
        });
      </script>

    </body>

  </html>
