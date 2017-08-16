
  <!DOCTYPE html>
    <html>
      <head>
        <meta charset="utf-8">
        <title>Login</title>

        <style>
          .test {
            color: red;
          }
        </style>
      </head>

      <body>
        <?php
          echo Form::open(['url' => '/login', 'method' => 'post']);
            echo Form::text('username', null, ['class' => 'test']);
            echo Form::text('password', null, ['class' => 'test']);
            echo Form::submit('Login!');
          echo Form::close();
         ?>
      </body>

    </html>
