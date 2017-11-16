
<?php

  $user_type = session('type');

 ?>

<div id="side-menu">
  <!-- TODO: Trocar por imagem -->
  <h1 class="logo">Pareto</h1>
  <!-- /////////////////////// -->
  <ul class="list">
<?php switch($user_type): ?>
<?php case "student": ?>
    <li class="item test"><a href="/app/test/">Testes</a></li>
    <li class="item map"><a href="#">Mapa</a></li>
    <li class="item perfil"><a href="#">Perfil</a></li>
    <li class="item bottom logout"><a href="/logout">Logout</a></li>
<?php break; ?>
<?php case "teacher": ?>
    <li class="item student"><a href="/app/students">Alunos</a></li>
    <li class="item class"><a href="/app/classes">Salas</a></li>
    <li class="item perfil"><a href="#">Perfil</a></li>
    <li class="item bottom logout"><a href="/logout">Logout</a></li>
<?php break; ?>
<?php case "school": ?>
    <li class="item student"><a href="/app/students">Alunos</a></li>
    <li class="item class"><a href="/app/classes">Salas</a></li>
    <li class="item teacher"><a href="/app/teachers">Professores</a></li>
    <li class="item perfil"><a href="#">Perfil</a></li>
    <li class="item bottom logout"><a href="/logout">Logout</a></li>
<?php endswitch; ?>
  </ul>
</div>
