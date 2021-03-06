  <!DOCTYPE html>
    <html>
      <head>
        <meta charset="utf-8">
        <!-- Token for csrf protection -->
        <meta name="csrf-token" content="<?php echo csrf_token(); ?>">
        <title>Pareto - Faça seu registro</title>
        <link rel="icon" href="<?php echo asset('images/pareto.png');?>" type="image/x-icon">
        <link href="https://fonts.googleapis.com/css?family=Montserrat|Source+Sans+Pro" rel="stylesheet">
        <link rel="stylesheet" href="<?php echo asset('css/normalize.css');?>">
        <link rel="stylesheet" href="<?php echo asset('css/animate.min.css')?>">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css">
        <link rel="stylesheet" href="<?php echo asset('css/auth.min.css');?>">
      </head>

      <body>
          <a href="/register"><img id="back-link" title="Página Registro" src="<?php echo asset('images/left-arrow.svg');?>"></a>

          <div class="container animated fadeInDown">
          <img class="animated rotateIn" src="<?php echo asset('images/ParetoLight.svg');?>">
           <form action="/register/conclude" method="post" >
             <?php echo csrf_field(); ?>

             <!-- Hidden inputs, data from /register POST request -->
             <!-- TODO: Change this to JWT encoded session -->
             <input type="hidden" name="user_type" value="<?php echo $user->getType(); ?>">
             <input type="hidden" name="email" value="<?php echo $user->getEmail(); ?>">
             <input type="hidden" name="password" value="<?php echo $user->getPassword() ?>">
             <input type="hidden" name="school_id" value="<?php echo $user->getSchoolId() ?>">

             <!-- Caso aconteça algum erro de autenticação -->
             <?php if(session()->has('auth_status')) : ?>
               <div class="holder">
                 <p class="pre-input-text error">
                   <?php echo session('auth_status'); ?>
                 </p>
               </div>
             <?php endif; ?>

             <?php if($user->getType() == 'student') : ?>
               <div class="holder">
                 <p class="pre-input-text">
                   É necessário que você preencha essas informações
                   para que seu registro como aluno seja concluido.
                 </p>
               </div>

               <input type="text" name="name" placeholder="Insira seu nome...">
               <!-- Class selection -->
               <select name="class">
                 <?php foreach($classes as $class) : ?>
                   <!-- loop through all the classes registered in the same school -->
                   <option value="<?php echo $class->id; ?>"><?php echo $class->nome; ?></option>
                 <?php endforeach; ?>
               </select>
             <?php endif; ?>

             <?php if($user->getType() == 'teacher') : ?>
               <div class="holder">
                 <p class="pre-input-text">
                   É necessário que você preencha essas informações
                   para que seu registro como professor seja concluido.
                 </p>
               </div>

               <input type="text" name="name" placeholder="Insira seu nome...">
             <?php endif; ?>

             <?php if($user->getType() == 'school') : ?>
               <div class="holder">
                 <p class="pre-input-text">
                   É necessário que você preencha essas informações
                   para que seu registro como escola seja concluido.
                 </p>
               </div>

               <input type="text" name="name" placeholder="Insira o nome da sua instituição...">

               <div class="holder">
                 <p class="pre-input-text">
                   Crie uma sala para que seus alunos e professores possam
                   se registrar com o identificador de sua escola. Outras salas
                   poderão ser criadas e alteradas depois.
                 </p>
               </div>

               <input type="text" name="first_class" placeholder="Insira um sala...">
             <?php endif; ?>

             <input type="submit" value="concluir!">
           </form>
        </div>
      </body>

    </html>
