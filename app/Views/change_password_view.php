<?= $this->extend("layouts/base.php");?>

<?= $this->section('page_title');?>
<span>Welcome to <?= ucfirst($userdata->username);?></span>
<?= $this->endsection();?>

<?= $this->Section('content');?>
<div class='container'>
    <div class='row'>
        <div class='col-md-12'>
            <h1>Change Password</h1>
            <?php if(isset($validation)):?>
            <div class='alert alert-danger'><?= $validation->listErrors(); ?></div>
            <?php endif;?>
            
            <?php if(session()->getTempdata('success')): ?>
                <div class='alert alert-success'><?= session()->getTempdata('success') ;?></div>
            <?php endif; ?>
                
            <?php if(session()->getTempdata('error')): ?>
               <div class='alert alert-danger'><?= session()->getTempdata('error') ;?></div>
            <?php endif; ?>
            
            <?= form_open();?>
            <div class='form-group'>
                <label>Enter Old Password</label>
                <input type='password' name='opwd' class='form-control'>
            </div>
            <div class='form-group'>
                <label>New Password</label>
                <input type='password' name='npwd' class='form-control'>
            </div>
            <div class='form-group'>
                <label>COnfirm New Password</label>
                <input type='password' name='cnpwd' class='form-control'>
            </div>
            <div class='form-group'>
                <input type='submit' name='update' value='Update' class='btn btn-primary'>
            </div>
            <?= form_close();?>
        </div>
    </div>
</div>
<?= $this->endSection();?>
