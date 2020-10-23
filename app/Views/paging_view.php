<?= $this->extend('layouts/base.php');?>
<?= $this->section('content');?>
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <h1>Pagination</h1>
            <?php if(count($users) > 0):?>
            <table class="table">
                <tr>
                    <th>Id</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Salary</th>
                    <th>City</th>
                    <th>Designation</th>
                </tr>
               <?php foreach($users as $user):?>
                <tr>
                    <td><?= $user['id'];?></td>
                    <td><?= $user['name'];?></td>
                    <td><?= $user['email'];?></td>
                    <td><?= $user['salary'];?></td>
                    <td><?= $user['city'];?></td>
                    <td><?= $user['designation'];?></td>
                </tr>
               <?php endforeach;?>
            </table>
            <?php else:?>
                <p class="alert alert-info">No Records Found</p>
            <?php endif;?>
           
            <?= $pager->makeLinks($page, $perpage, $total,'custom_pagination',3,'group');?>
        </div>
    </div>
</div>
<?= $this->endSection();?>