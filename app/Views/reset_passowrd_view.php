<?= $this->extend("layouts/base"); ?>

<?= $this->section("content");?>
<div class="container">
    <div class="row justify-content-center align-items-center">
        <div class="col col-sm-6 col-md-6 col-lg-4 col-xl-6" style="height:520px;">
            <h1>Reset Password</h1>
            
             <?php 
            if(isset($validation)): ?>
            <div class="alert alert-danger">
            <?= $validation->listErrors()?>
            </div>
            <?php endif;?>
            
            
        <?php if(session()->getTempdata('error')):?>
	<div class='alert alert-danger'><?= session()->getTempdata('error');?></div>
	<?php endif;?>
            
            <?php if(isset($error)):?>
            <div class='alert alert-danger'><?= $error;?></div>
                <?php else: ?>
            <?= form_open();?>
            <div class='form-group'>
                <label>Enter new password:</label>
                <input type="password" name="pwd" class='form-control'>
            </div>
            <div class='form-group'>
                <label>Confirm new password:</label>
                <input type="password" name="cpwd" class='form-control'>
            </div>
            <div class='form-group'>
                <input type="submit" value='Update' class='btn btn-primary'>
            </div>
            <?= form_close();?>
            <?php endif ?>
            
            
        </div>
    </div>
</div>
<?= $this->endSection();?>