
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
          <a href="/register"><img id="back-link" title="Página Registro" src="<?php echo asset('images/left-arrow.svg');?>"></a>

          <div class="container animated fadeInDown">
          <img class="animated rotateIn" src="<?php echo asset('images/ParetoLight.svg');?>">
           <form action="/register/conclude" method="post" >
             <?php echo csrf_field(); ?>

             <div class="holder">
               <p class="pre-input-text">
                 É necessário que você preencha essas informações
                 para que seu registro seja concluido.
               </p>
             </div>

             <?php if($user->getUserType() == 'student') : ?>
               <input type="text" name="email" placeholder="Seu nome aluno...">
             <?php endif ?>;

             <?php if($user->getUserType() == 'teacher') : ?>
               <input type="text" name="email" placeholder="Seu nome professor...">
             <?php endif ?>;

             <?php if($user->getUserType() == 'school') : ?>
               <input type="text" name="email" placeholder="Seu nome professor...">
             <?php endif ?>;

             <input type="submit" value="concluir!">
           </form>
        </div>
      </body>

    </html>
