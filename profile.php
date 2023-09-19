<?php

include('inc/header.php');
include('./core/function.php');
if (!isset($_SESSION['auth'])) {
    redirect('./home.php');
    die;
}
include('inc/navbar.php');
?>
<div class="container row col-8 mx-auto">
    <h2 class="bg-danger my-5 px-3 py-5">
        name:  <?php
        echo $_SESSION['auth'][0];
        ?>
    </h2>
    <h2 class="bg-warning my-5 px-3 py-5">
        email:  <?php
        echo $_SESSION['auth'][1];
        ?>
    </h2>
</div>
<?php
include('inc/footer.php');
