
<!DOCTYPE html>
  <html>

    <head>
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <title>Pareto - Entenda melhor seus alunos</title>
      <link rel="icon" href="<?php echo asset('images/pareto.png');?>" type="image/x-icon">
      <link href="https://fonts.googleapis.com/css?family=Montserrat|Source+Sans+Pro" rel="stylesheet">
      <link rel="stylesheet" href="<?php echo asset('css/normalize.css');?>">
      <link rel="stylesheet" href="<?php echo asset('css/animate.min.css')?>">
      <link rel="stylesheet" href="https://unpkg.com/purecss@1.0.0/build/pure-min.css" integrity="sha384-nn4HPE8lTHyVtfCBi5yW9d20FjT8BJwUXyWZT9InLYax14RDjBj46LmSztkmNP9w" crossorigin="anonymous">
      <link rel="stylesheet" href="<?php echo asset('css/landing.min.css');?>">
    </head>

    <body>
      <div id="header">

        <div id="header-container">

          <div id="logo-space">
            <h1 id="logo">Pareto</h1>
          </div>

          <div id="nav">
            <ul id="nav-list">
              <!-- <li class="nav-list-item"><a href="#">soluções</a></li> -->
              <li class="nav-list-item"><a href="#">contato</a></li>
              <li class="nav-list-item"><a href="/login">login</a></li>
              <li class="nav-list-item"><a href="/register"><span>registrar</span></a></li>
            </ul>
          </div>

        </div>

      </div>

      <div id="presentation">
        <div id="presentation-itens" class="animated fadeIn">
          <img class="presentation-img animated rotateIn" src="<?php echo asset('images/ParetoDark.svg');?>">
          <p class="presentation-text animated fadeInUp">
            Entenda com clareza seus alunos e enxergue onde estão seus verdadeiros pontos de dificuldade.
          </p>
        </div>
      </div>

      <div id="wrapper">
        <div class="section animated fadeIn">
          <div class="container">

            <h1 class="heading">Como o Pareto pode ajudar sua escola,
              seus professores e seus alunos a focar no que realmente é importante.
            </h1>

            <p class="text">
              O pareto tem como objetivo identificar os verdadeiros pontos de dificuldades de cada aluno
              e a partir desses dados, disponibilizar para as escolas e professores de uma forma interativa
              toda informação que se demonstrar necessária para a verdadeira compreensão de cada aluno em específico
              ou de cada sala ou grupo em geral. Com o pareto você será capaz de orientar
              seus alunos de maneira mais efetiva e trabalhar em cima daquilo que realmente representa um problema.
            </p>

          </div>
        </div>

        <div class="section" id="research">
          <div class="container pure-g">
              <div id="heading-holder" class="pure-u-1-2">
                <h1 class="heading">80/20</h1>
              </div>

              <div id="text-holder" class="pure-u-1-2">
                <p class="text">
                  Com a ideia de que aproximadamente 80% dos efeitos vêm de 20%
                  das causas, a partir de testes realizados pelos alunos em
                  conhecimentos considerados base, Pareto é capaz de pré determinar
                  as matérias nas quais os alunos irão possuir dificuldades e adversidades.
                </p>
              </div>

          </div>
        </div>

        <div class="section" id="caller">
          <div class="container">
            <h1 class="heading">Junte-se ao pareto!</h1>
            <p class="text">
              Seja você um aluno, professor ou escola, o Pareto possui as soluções necessárias
              para lhe auxiliar no seu aprendizado ou na efetividade de seu trabalho. Entenda
              as verdadeiras dificuldades de seus alunos e foque naquilo que realmente dará resultados
              de desempenho.
            </p>

            <a href="/register"><p id="caller-button">Registrar!</p></a>
          </div>
        </div>

      </div>

      <div id="footer">
        <p id="copyright"> Pareto © 2017</p>
      </div>

    </body>

  </html>
