
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
        <title>Login</title>
      </head>

      <body>
         <form action="/login" method="post">
           <?php echo csrf_field(); ?>
           <input type="text" name="email" placeholder="seu email...">
           <input type="password" name="password" placeholder="sua senha...">
           <input type="submit" value="login!">
         </form>
      </body>

    </html>
