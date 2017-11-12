
<!DOCTYPE html>
  <html>
    <head>
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <title>Pareto - Entre em contato conosco</title>
      <link rel="icon" href="<?php echo asset('images/pareto.png');?>" type="image/x-icon">
      <link href="https://fonts.googleapis.com/css?family=Montserrat|Source+Sans+Pro" rel="stylesheet">
      <link rel="stylesheet" href="<?php echo asset('css/normalize.css');?>">
      <link rel="stylesheet" href="<?php echo asset('css/animate.min.css')?>">
      <link rel="stylesheet" href="https://unpkg.com/purecss@1.0.0/build/pure-min.css" integrity="sha384-nn4HPE8lTHyVtfCBi5yW9d20FjT8BJwUXyWZT9InLYax14RDjBj46LmSztkmNP9w" crossorigin="anonymous">
      <link rel="stylesheet" href="<?php echo asset('css/contact.min.css');?>">
    </head>

    <body>

      <?php include_once __DIR__ . '/../templates/header.php';?>

      <div id="wrapper">

        <div class="section">
          <div class="container">
            <img src="<?php echo asset('images/ParetoLight.svg')?>" class="animated rotateIn">
            <h1 class="heading animated fadeInUp">Entre em contato conosco!</h1>
            <p class="text animated fadeInUp">
              Entre em contato com nossa equipe para poder sanar todas as
              dúvidas possíveis sobre o funcionamento do nosso produto e entender
              melhor nossas soluções e como elas podem ajudar a sua escola, professores
              e alunos!
            </p>
          </div>
        </div>

        <div class="section">
          <div class="container pure-g">
            <div class="pure-u-1-2 animated fadeIn">
              <h1 class="heading">Contato de vendas</h1>
              <p class="text">
                Converse com nossa equipe de vendas para entender melhor
                sobre o processo de venda e implementação da plataforma em
                sua escola.
              </p>
              <p class="email">vendas@pareto.com</p>
            </div>

            <div class="pure-u-1-2 animated fadeIn">
              <h1 class="heading">Contato de suporte</h1>
              <p class="text">
                Converse com nossa equipe de suporte caso necessite resolver
                qualquer problema ou questão que envolva o funcionamento de nosso
                produto.
              </p>
              <p class="email">suporte@pareto.com</p>
            </div>

          </div>
        </div>

      </div>

    </body>
  </html>
