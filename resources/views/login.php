
  <?php
    if(session()->has('auth_status')) {
      $message = session('auth_status');
      echo $message;
    }
  ?>

  <!DOCTYPE html>
    <html>
      <head>
        <meta charset="utf-8">
        <!-- Token for csrf protection -->
        <meta name="csrf-token" content="<?php echo csrf_token(); ?>">
        <title>Pareto - Faça seu login</title>
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
           <form action="/login" method="post">
             <?php echo csrf_field(); ?>

             <div class="holder holder-r pure-g">
               <label class="label pure-u-1-3">
                 <input type="radio" name="user_type">
                 <span class="label-text">Aluno</span>
               </label>

               <label class="label pure-u-1-3">
                 <input type="radio" name="user_type">
                 <span class="label-text">Professor</span>
               </label>

               <label class="label pure-u-1-3">
                 <input type="radio" name="user_type">
                 <span class="label-text">Escola</span>
               </label>
             </div>


             <input type="text" name="email" placeholder="seu email...">
             <input type="password" name="password" placeholder="sua senha...">

             <div class="holder">
               <p class="linker">Esqueceu a senha? <a href="#">clique aqui</a></p>
             </div>

             <div class="holder">
               <p class="pre-input-text">
                 O identificador da escola será utilizado para que
                 alunos e professores possam se registrar na escola
                 devida.
               </p>
             </div>

             <input type="text" name="school_id" placeholder="identificador da escola">
             <input type="submit" value="login!">

             <div class="holder">
               <p class="linker">Não possui um registro? <a href="/register">Registre-se</a></p>
             </div>
           </form>
        </div>
      </body>

    </html>
