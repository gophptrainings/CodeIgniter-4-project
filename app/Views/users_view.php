

<?= $this->extend('layouts/base');?>



<?= $this->section('content');?>


<h1><?= session()->get('userdata')?></h1>


<?= $this->endSection();?>