<?php

include('inc/header.php');
include('./core/function.php');
if (isset($_SESSION['auth'])) {
  redirect('./home.php');
  die;
}
include('inc/navbar.php');
?>
<?php 
if (isset($_SESSION['errors'])):
foreach ($_SESSION['errors'] as $error):?>
<div class="alert alert-danger text-center">
  <?php
  echo $error;
  ?>
</div>
<?php endforeach;
unset($_SESSION['errors']);
endif;
?>
<form class="container mt-5" action="handelers/handelRegister.php" method="post">
  <div class="mb-3 ">
    <label for="exampleInputUsername" class="form-label">Username</label>
    <input type="text" class="form-control" id="exampleInputUsername" name="name">
    
  </div>
  <div class="mb-3 ">
    <label for="exampleInputEmail1" class="form-label">Email address</label>
    <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="email">
    <div id="emailHelp" class="form-text">Enter valid email address</div>
  </div>
  <div class="mb-3">
    <label for="exampleInputPassword1" class="form-label">Password</label>
    <input type="password" class="form-control" id="exampleInputPassword1" name="password">
  </div>
  
  <button type="submit" class="btn btn-primary">Register</button>
</form>
<?php
include('inc/footer.php');
