
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
        <title>Register</title>
      </head>

      <body>
         <form action="/register" method="post">
           <?php echo csrf_field(); ?>
           <input type="text" name="username" placeholder="username...">
           <input type="password" name="password" placeholder="password...">
           <input type="password" name="repeat_password" placeholder="repeat password...">
           <input type="submit" value="register!">
         </form>
      </body>

    </html>
