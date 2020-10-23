<?php 
$page_session = \CodeIgniter\Config\Services::session();
?>
<?php if(isset($login_button)):?>
<?php 
$userData = $page_session->get('userdata');
?>

<p><?= $userData['first_name'];?></p>
<p><?= $userData['last_name'];?></p>
<p><?= $userData['email'];?></p>

<?php 
else:
    ?>
<h1><?= $login_button;?></h1>
<?php
endif;?>