
<!DOCTYPE html>
  <html>

    <?php
      use App\Http\Controllers\Student;
      use App\Http\Controllers\Teacher;
      use App\Http\Controllers\School;
    ?>

    <head>
      <meta charset="utf-8">
      <!-- Token for csrf protection -->
      <meta name="csrf-token" content="<?php echo csrf_token(); ?>">
      <title>Pareto - Perfil de usuário</title>
      <link rel="icon" href="<?php echo asset('images/pareto.png');?>" type="image/x-icon">
      <link href="https://fonts.googleapis.com/css?family=Montserrat|Source+Sans+Pro" rel="stylesheet">
      <link rel="stylesheet" href="<?php echo asset('css/normalize.css');?>">
      <link rel="stylesheet" href="<?php echo asset('css/animate.min.css')?>">
      <link rel="stylesheet" href="http://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
      <link rel="stylesheet" href="https://unpkg.com/purecss@1.0.0/build/pure-min.css" integrity="sha384-nn4HPE8lTHyVtfCBi5yW9d20FjT8BJwUXyWZT9InLYax14RDjBj46LmSztkmNP9w" crossorigin="anonymous">
      <link rel="stylesheet" href="<?php echo asset('css/perfil.min.css');?>">
    </head>

    <body>
      <div id="wrapper">

        <?php include_once __DIR__ . '/../templates/sidemenu.php' ?>

        <div class="modal" id="deleteModal">
          <div class="modal-container">
            <p class="modal-text">
              Tem certeza que deseja deletar o seu registro ?
            </p>

            <div id="button-holder">
              <a href="#"><p class="option-button nope">Cancelar</p></a>
              <a href="/app/school/delete/<?php echo session('id'); ?>"><p class="option-button okay">Deletar</p></a>
            </div>

            <a class="close" href="#"></a>
          </div>
        </div>

        <?php
          // Variables of info definition
          $user_name = '';
          $user_email = '';
          $school_identifier;

          switch(session('type')) {
            case 'student':
              $result = Student::show(session('id'), 'id');
              foreach($result as $student) {
                $user_name = $student->nome;
                $user_email = $student->email;
              }
              break;
            case 'teacher':
              $result = Teacher::show(session('id'), 'id');
              foreach($result as $teacher) {
                $user_name = $teacher->nome;
                $user_email = $teacher->email;
              }
              break;
            case 'school':
              $result = School::show(session('id'), 'id');
              foreach($result as $school) {
                $user_name = $school->nome;
                $user_email = $school->email;
                $school_identifier = $school->identificador;
              }
          }

        ?>

        <div class="section animated fadeIn" id="updatePassword">
          <form action="" action="put">
            <h1 class="form-title">Atualize sua senha</h1>

            <?php if(session()->has('update_status')) : ?>
              <div class="holder">
                <p class="pre-input-text error">
                  <?php echo session('update_status'); ?>
                </p>
              </div>
            <?php endif; ?>

            <input type="password" name="actual_password" placeholder="Digite sua senha atual...">
            <input type="password" name="update_password" placeholder="Digite uma nova senha...">
            <input type="password" name="update_password_confirm" placeholder="Confirme a nova senha...">
            <input type="submit" value="Atualizar Senha">
          </form>
        </div>

        <div class="section animated fadeIn" id="updateEmail">
          <form action="" action="put">
            <h1 class="form-title">Atualize seu email</h1>
            <h1 class="form-text">Email: <?php echo $user_email; ?></h1>
            <input type="text" name="update_email" placeholder="Digite um novo email...">
            <input type="submit" value="Atualizar Email">
          </form>
        </div>

        <div class="section animated fadeIn" id="updateName">
          <form action="" action="put">
            <?php if(session('type') == 'school') : ?>
              <h1 class="form-title">Atualize o nome da Instituição</h1>
              <h1 class="form-text">Nome da Escola: <?php echo $user_name; ?></h1>
            <?php else : ?>
              <h1 class="form-title">Atualize seu nome</h1>
              <h1 class="form-text">Nome: <?php echo $user_name; ?></h1>
            <?php endif; ?>
            <input type="text" name="update_name" placeholder="Digite um novo nome...">
            <input type="submit" value="Atualizar Nome">
          </form>
        </div>

        <?php if(session('type') == 'school') : ?>
          <div class="section animated fadeIn" id="updateId">
            <form action="app/school/update/id" action="put">
              <h1 class="form-title">Atualize seu ID de escola</h1>
              <h1 class="form-text">ID: <?php echo $school_identifier; ?></h1>
              <input type="text" name="update_school_id" placeholder="Digite um novo ID...">
              <input type="submit" value="Atualizar ID">
            </form>
          </div>

          <div class="section animated fadeIn" id="deleteAccount">
            <div class="holder">
              <p class="pre-input-text">
                Quando deletado, o registro de uma escola
                não pode ser recuperado e todos alunos e professores
                registrados na plataforma com o ID de sua escola também
                são deletados junto com suas informações.
              </p>
            </div>

            <a class="animated fadeIn" href="#deleteModal"><p id="deleteButton">Deletar Registro</p></a>

          </div>
        <?php endif; ?>

      </div>

    </body>
  </html>
