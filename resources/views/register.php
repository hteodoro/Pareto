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
        <link rel="stylesheet" href="https://unpkg.com/purecss@1.0.0/build/pure-min.css" integrity="sha384-nn4HPE8lTHyVtfCBi5yW9d20FjT8BJwUXyWZT9InLYax14RDjBj46LmSztkmNP9w" crossorigin="anonymous">
        <link rel="stylesheet" href="<?php echo asset('css/auth.min.css');?>">
      </head>

      <body>
          <a href="/"><img id="back-link" title="Página Inicial" src="<?php echo asset('images/left-arrow.svg');?>"></a>

          <div class="container animated fadeInDown">
          <img class="animated rotateIn" src="<?php echo asset('images/ParetoLight.svg');?>">
           <form action="/register" method="post" >
             <?php echo csrf_field(); ?>

             <div class="holder holder-r pure-g">
               <label class="label pure-u-1-3">
                 <input type="radio" name="user_type" value="student">
                 <span class="label-text">Aluno</span>
               </label>

               <label class="label pure-u-1-3">
                 <input type="radio" name="user_type" value="teacher">
                 <span class="label-text">Professor</span>
               </label>

               <label class="label pure-u-1-3">
                 <input type="radio" name="user_type" value="school">
                 <span class="label-text">Escola</span>
               </label>
             </div>

             <!-- Caso aconteça algum erro de autenticação -->

             <?php if(session()->has('auth_status')) : ?>
               <div class="holder">
                 <p class="pre-input-text error">
                   <?php echo session('auth_status'); ?>
                 </p>
               </div>
             <?php endif; ?>

             <input type="text" name="email" placeholder="email para registro...">
             <input type="password" name="password" placeholder="sua senha...">
             <input type="password" name="repeat_password" placeholder="repita sua senha...">

             <div class="holder">
               <p class="pre-input-text">
                 O identificador da escola será utilizado para que
                 alunos e professores possam se registrar na escola
                 devida.
               </p>
             </div>

             <input type="text" name="school_id" placeholder="identificador da escola">
             <input type="submit" value="registrar!">

             <div class="holder">
               <p class="linker">Já possui um registro? <a href="/login">login</a></p>
             </div>
           </form>
        </div>
      </body>

    </html>
