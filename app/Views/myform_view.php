<h1>Throttler - Sign In Form</h1>

<?php if(isset($validation)):?>
<?= $validation->listErrors();?>
<?php endif;?>

<?php if(isset($error)): ?>
    <?= $error;?>
<?php endif; ?>

<?php if(session()->getFlashdata('error')):?>
<?= session()->getFlashdata('error');?>
<?php endif?>

<?= form_open();?>
<table>
    <tr>
        <td>Username</td>
        <td><input type="text" name='uname'></td>
    </tr>
     <tr>
        <td>Password</td>
        <td><input type="password" name='pwd'></td>
    </tr>
     <tr>
        <td></td>
        <td><input type="submit" value='Login'></td>
    </tr>
</table>
<?= form_close();?>