<?= $this->extend("layouts/base");?>

<?= $this->section("content");?>
<div class='container'>
    <h1>Employees List</h1>
    <?php if(session()->getTempdata('success')):?>
            <div class="alert alert-success">
                <?= session()->getTempdata('success');?>
            </div>
    <?php endif;?>
    <div class='row'>    
        <?php if(count($employees)>0):?>
        <table class='table'>
            <tr>
                <th>Id</th>
                <th>Name</th>
                <th>Salary</th>
                <th>City</th>
                <th>Designation</th>
                <th>Email</th>
                <th>Created</th>
                <th>Action</th>
            </tr>
        
            <?php foreach($employees as $emp): ?>
            <tr>
                <td><?= $emp['id']; ?></td>
                <td><?= $emp['name']; ?></td>
                <td><?= $emp['salary']; ?></td>
                <td><?= $emp['city']; ?></td>
                <td><?= $emp['designation']; ?></td>
                <td><?= $emp['email']; ?></td>
                <td><?= $emp['created_at']; ?></td>
                <td>
                    <a href='<?= base_url(); ?>/employee/editemp/<?= $emp['id']?>'>Edit</a>
                    <a href='<?= base_url(); ?>/employee/deleteemp/<?= $emp['id']?>'>Delete</a>
                </td>
            </tr>
            <?php endforeach;?>
        </table>
        <?php endif;?>
    </div>
</div>
<?= $this->endSection();?>

