
<?php
  // Getting the user type from session stored on the login/register
  $user_type = session('type');
  // Actual Route Name
  $route_name = Route::currentRouteName();
 ?>

<div id="side-menu" class="animated fadeInLeft">
  <!-- TODO: Trocar por imagem -->
  <h1 class="logo">Pareto</h1>
  <!-- /////////////////////// -->
  <ul class="list">
<?php switch($user_type): ?>
<?php case "student": ?>
    <li class="item test "><a class="<?php if($route_name == 'test') { echo 'item-selected'; } ?>" href="/app/test/">Testes</a></li>
    <li class="item map"><a class="<?php if($route_name == 'student_map') { echo 'item-selected'; } ?>" href="/app/map/student/<?php echo session('id'); ?>">Mapa</a></li>
    <li class="item perfil"><a class="<?php if($route_name == 'perfil') { echo 'item-selected'; } ?>" href="/app/perfil">Perfil</a></li>
    <li class="item bottom logout"><a href="/logout">Logout</a></li>
<?php break; ?>
<?php case "teacher": ?>
    <li class="item student"><a class="<?php if($route_name == 'students') { echo 'item-selected'; } ?>" href="/app/students">Alunos</a></li>
    <li class="item class"><a class="<?php if($route_name == 'classes') { echo 'item-selected'; } ?>" href="/app/classes">Salas</a></li>
    <li class="item perfil"><a class="<?php if($route_name == 'perfil') { echo 'item-selected'; } ?>" href="/app/perfil">Perfil</a></li>
    <li class="item bottom logout"><a href="/logout">Logout</a></li>
<?php break; ?>
<?php case "school": ?>
    <li class="item student"><a class="<?php if($route_name == 'students') { echo 'item-selected'; } ?>" href="/app/students">Alunos</a></li>
    <li class="item class"><a class="<?php if($route_name == 'classes') { echo 'item-selected'; } ?>" href="/app/classes">Salas</a></li>
    <li class="item teacher"><a class="<?php if($route_name == 'teachers') { echo 'item-selected'; } ?>" href="/app/teachers">Professores</a></li>
    <li class="item perfil"><a class="<?php if($route_name == 'perfil') { echo 'item-selected'; } ?>" href="/app/perfil">Perfil</a></li>
    <li class="item bottom logout"><a href="/logout">Logout</a></li>
<?php endswitch; ?>
  </ul>
</div>
