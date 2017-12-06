

<!DOCTYPE html>
  <html>
    <?php
      use App\Http\Controllers\Performance;
      use App\Http\Controllers\Student;
    ?>
    <head>
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <title>Pareto - Mapa de Desempenho</title>
      <link rel="icon" href="<?php echo asset('images/pareto.png');?>" type="image/x-icon">
      <link href="https://fonts.googleapis.com/css?family=Montserrat|Source+Sans+Pro" rel="stylesheet">
      <link rel="stylesheet" href="<?php echo asset('css/normalize.css');?>">
      <link rel="stylesheet" href="<?php echo asset('css/animate.min.css')?>">
      <link rel="stylesheet" href="http://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
      <link rel="stylesheet" href="https://unpkg.com/purecss@1.0.0/build/pure-min.css" integrity="sha384-nn4HPE8lTHyVtfCBi5yW9d20FjT8BJwUXyWZT9InLYax14RDjBj46LmSztkmNP9w" crossorigin="anonymous">
      <link rel="stylesheet" href="<?php echo asset('css/map.min.css');?>">
    </head>

    <body>

      <?php include_once __DIR__ . '/../templates/sidemenu.php'; ?>

      <div id="wrapper">
          <div class="section" id="presentation">
            <div class="container animated fadeInDown">
              <h1 id="heading">Mapa de Desempenho</h1>
              <?php $result = Student::show($student_id, 'id');?>
              <?php foreach($result as $student) : ?>
                <h3 id="sub-heading">Alunos - <?php echo $student->nome; ?></h3>
              <?php endforeach; ?>
            </div>
          </div>

          <div class="section" id="info-section">
            <ul id="info-holder" class="animated fadeInUp">

              <li class="item">
                <ul class="info-list pure-g">
                  <li class="info-title pure-u-1-3">Matérias</li>
                  <li class="info-title pure-u-1-3">Nível de Desempenho</li>
                  <li class="info-title pure-u-1-3">Teste de Definição</li>
                </ul>
              </li>

              <?php foreach(Performance::show($student_id, 'student') as $subject): ?>
                <li class="item">
                  <ul class="info-list pure-g">
                    <li class="info-item name pure-u-1-3"><?php echo $subject->name; ?></li>

                    <?php if($subject->performanceLevel == 'Muita Facilidade' || $subject->performanceLevel == 'Facilidade') : ?>
                      <li class="info-item good pure-u-1-3"><?php echo $subject->performanceLevel; ?></li>
                    <?php elseif($subject->performanceLevel == 'Mediano') : ?>
                      <li class="info-item mid pure-u-1-3"><?php echo $subject->performanceLevel; ?></li>
                    <?php elseif($subject->performanceLevel == 'Muita Dificuldade' || $subject->performanceLevel == 'Dificuldade') : ?>
                      <li class="info-item bad pure-u-1-3"><?php echo $subject->performanceLevel; ?></li>
                    <?php endif; ?>

                    <li class="info-item test pure-u-1-3">Teste 80 / 20</li>
                  </ul>
                </li>
              <?php endforeach; ?>

            </ul>
          </div>

      </div>

    </body>

  </html>
