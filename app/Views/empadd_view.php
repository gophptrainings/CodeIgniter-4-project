<?= $this->extend('layouts/base'); ?>

<?= $this->section('content'); ?>
<div class="container">
    <div class='row'>
        <div class='col-md-12'>
            <h1>Add Employee</h1>
            
            <?php if (!empty($errors)) : ?>
                <div class="alert alert-danger">
                    <?php foreach ($errors as $field => $error) : ?>
                        <p><?= $error ?></p>
                    <?php endforeach ?>
                </div>
            <?php endif ?>
            
            <?php if(session()->getTempdata('success')):?>
            <div class="alert alert-success">
                <?= session()->getTempdata('success');?>
            </div>
            <?php endif;?>
            
            <?= form_open(); ?>
            <div class="form-group">
                <label>Name</label>
                <input type='text' name='name' class='form-control' />
            </div>
            <div class="form-group">
                <label>Email</label>
                <input type='text' name='email' class='form-control' />
            </div>
            <div class="form-group">
                <label>Salary</label>
                <input type='text' name='salary' class='form-control' />
            </div>
            
            <div class="form-group">
                <label>City</label>
                <input type='text' name='city' class='form-control' />
            </div>
            
            <div class="form-group">
                <label>Designation</label>
                <input type='text' name='designation' class='form-control' />
            </div>
            <div class="form-group">
                <label>Mobile</label>
                <input type='text' name='mobile' class='form-control' />
            </div>
            
            <div class="form-group">
                <input type='submit' value="Submit" class='btn btn-primary' />
            </div>
            
            <?= form_close(); ?>
        </div>
    </div>
</div>
<?= $this->endSection(); ?>